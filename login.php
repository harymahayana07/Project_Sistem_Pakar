<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Threedoc Admin</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5" style="border-radius: 10px;">
                            <div class="brand-logo">
                                <img src="admin/assets/images/threedoc_logo.png">
                            </div>
                            <h6 class="font-weight-light">Sign in to continue as Admin.</h6>
                            <?php require_once "functions.php";
                            if (isset($_POST['login'])) {
                                $user = esc_field($_POST['user']);
                                $pass = esc_field($_POST['pass']);

                                $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
                                if ($row) {
                                    $_SESSION['login'] = $row->user;
                                    $_SESSION['level'] = $row->level;
                                    redirect_js("dashboard.php");
                                } else {
                                    print_msg("Username dan Password Salah.");
                                }
                            }
                            ?>
                            <form class="pt-3" method="post" action="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-lg" name="user" placeholder="Username" autofocus />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg" name="pass" placeholder="Password" />
                                </div>
                                <input type="submit" name="login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn mt-3" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
</body>
</html>