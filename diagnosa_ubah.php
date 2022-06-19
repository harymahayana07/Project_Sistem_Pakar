<?php include "functions.php" ?>
<?php
if (!isset($_SESSION['login'])) {
    header("location:login.php");
}
?>
<?php
$row = $db->get_row("SELECT * FROM tb_diagnosa WHERE kode_diagnosa='$_GET[ID]'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diagnosa_ubah | Admin</title>
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
                        </span> Ubah Diagnosa
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
                                                <?php
                                                if (isset($_POST['diagnosa_ubah'])) {
                                                    $kode = $_POST['kode'];
                                                    $nama = $_POST['nama'];
                                                    $keterangan = $_POST['keterangan'];
                                                    if ($kode == '' || $nama == '')
                                                        print_msg("Field yang bertanda * tidak boleh kosong!");
                                                    else {
                                                        $db->query("UPDATE tb_diagnosa SET nama_diagnosa='$nama', keterangan='$keterangan' WHERE kode_diagnosa='$_GET[ID]'");
                                                        redirect_js("diagnosa.php");
                                                    }
                                                }
                                                ?>
                                                <form method="post">
                                                    <div class="form-group">
                                                        <label>Kode <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="kode" readonly="readonly" value="<?= $row->kode_diagnosa ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Alternatif <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="nama" value="<?= $row->nama_diagnosa ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control mce" name="keterangan"><?= $row->keterangan ?></textarea>
                                                    </div>
                                                    <div class="page-header">
                                                        <input type="submit" name="diagnosa_ubah" class="btn btn-primary btn-sm" value="Update">
                                                        <a class="btn btn-sm btn-danger d-inline" href="diagnosa.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
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