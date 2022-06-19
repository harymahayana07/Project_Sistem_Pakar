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
    <title>Gejala | Admin</title>
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
                        </span> Gejala
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
                                        <form class="form-inline">
                                            <div class="form-group" style="float:right;">
                                                <a class="btn btn-primary" href="gejala_tambah.php"><span class="mdi mdi-library-plus"></span> Tambah</a>
                                            </div>
                                            <input type="hidden" name="m" value="gejala" />
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Pencarian" name="q" value="<?= $_GET['q'] ?>" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Kode Gejala</th>
                                                    <th>Nama Gejala</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $q = esc_field($_GET['q']);
                                            $rows = $db->get_results("SELECT * FROM tb_gejala 
        WHERE kode_gejala LIKE '%$q%' OR nama_gejala LIKE '%$q%'  
        ORDER BY kode_gejala");
                                            foreach ($rows as $row) : ?>
                                                <tr>
                                                    <td><?= $row->kode_gejala ?></td>
                                                    <td><?= $row->nama_gejala ?></td>
                                                    <td class="nw">
                                                        <a class="btn btn-xs btn-warning" href="gejala_ubah.php?ID=<?= $row->kode_gejala ?>"><span class="mdi mdi-table-edit"></span></a>
                                                        <a class="btn btn-xs btn-danger" href="aksi.php?act=gejala_hapus&ID=<?= $row->kode_gejala ?>" onclick="return confirm('Hapus data?')"><span class="mdi mdi-delete"></span></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
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