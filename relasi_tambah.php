<?php include "functions.php" ?>
<?php
if (!isset($_SESSION['login'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Relasi_tambah | Admin</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
</head>

<body>
    <?php require "partials/navbar.php"; ?>
    <div class="container-fluid page-body-wrapper">
        <?php require "partials/sidebar.php"; ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-account-search-outline"></i>
                        </span> Tambah Relasi
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <?php require_once "functions.php";
                                                if (isset($_POST['relasi_tambah'])) {
                                                    $id = $_POST['id'];
                                                    $kode_diagnosa = $_POST['kode_diagnosa'];
                                                    $kode_gejala = $_POST['kode_gejala'];
                                                    $mb = $_POST['mb'];
                                                    $md = $_POST['md'];

                                                    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasi WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejala='$kode_gejala'");

                                                    if ($kode_diagnosa == '' || $kode_gejala == '' || $mb == '' || $md == '')
                                                        print_msg("Field bertanda * tidak boleh kosong!");
                                                    elseif ($kombinasi_ada)
                                                        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
                                                    else {
                                                        $db->query("INSERT INTO tb_relasi (id,kode_diagnosa, kode_gejala, mb, md) VALUES ('$id','$kode_diagnosa', '$kode_gejala', '$mb', '$md')");
                                                        redirect_js("relasi.php");
                                                    }
                                                }
                                                ?>
                                                <form method="post">
                                                    <div class="form-group">
                                                        <label>ID <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="id" value="<?= $_POST['id'] ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Diagnosa <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="kode_diagnosa">
                                                            <option value=""></option>
                                                            <?= get_diagnosa_option($_POST['kode_diagnosa']) ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gejala <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="kode_gejala">
                                                            <option value=""></option>
                                                            <?= get_gejala_option($_POST['kode_gejala']) ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>MB <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="mb" value="<?= $_POST['mb'] ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>MD <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="md" value="<?= $_POST['md'] ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="relasi_tambah" class="btn btn-primary btn-sm" value="Simpan">
                                                        <a class="btn btn-sm btn-danger d-inline" href="relasi.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/dashboard.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
</body>

</html>