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
    <title>Konsultasi | Admin</title>
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
                        </span> Konsultasi
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
                        <h5 class="panel-title mb-3">&emsp; Isi Biodata Dan Pilih Gejala yang dirasakan :</h5>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="panel-heading">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php
                                                    $success = false;
                                                    if ($_POST) {
                                                        $nama = $_POST['nama'];
                                                        $jk = $_POST['jk'];
                                                        $umur = $_POST['umur'];
                                                        $alamat = $_POST['alamat'];

                                                        $selected = (array) $_POST['gejala'];
                                                        $success = true;

                                                        if ($nama == '' || $jk == '' || $umur == '' || $alamat == '') {
                                                            $success = false;
                                                            print_msg('Isikan nama, jenis kelamin, umur dan alamat!');
                                                        } else if (!$selected) {
                                                            $success = false;
                                                            print_msg('Belum ada gejala yang dipilih!');
                                                        }
                                                    }
                                                    $_SESSION['data'] = $_POST;
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Nama <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="jk">
                                                            <option value="">&nbsp;</option>
                                                            <?= get_jk_option(set_value('jk')) ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Umur <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="umur" value="<?= set_value('umur') ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat') ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="checkAll" /></th>
                                                        <th>No</th>
                                                        <th>Nama Gejala</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $q = esc_field($_GET['q']);
                                                $rows = $db->get_results("SELECT * FROM tb_gejala 
                                                  WHERE kode_gejala LIKE '%$q%' OR nama_gejala LIKE '%$q%'
                                                  ORDER BY kode_gejala");
                                                $no = 1;
                                                foreach ($rows as $row) : ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="gejala[]" value="<?= $row->kode_gejala ?>" /></td>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row->nama_gejala ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                            <div class="panel-footer mt-4">
                                                <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit Diagnosa</button>
                                            </div>
                                        </div>
                                    </form>
                                    <script>
                                        $(function() {
                                            $("#checkAll").click(function() {
                                                $('input:checkbox').not(this).prop('checked', this.checked);
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <?php if ($success) include 'konsultasi_hasil.php'; ?>
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