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
    <title>Relasi | Admin</title>
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
                        </span> Relasi
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
                                                <a class="btn btn-primary" href="relasi_tambah.php"><span class="mdi mdi-library-plus"></span> Tambah</a>
                                            </div>
                                            <input type="hidden" name="m" value="relasi" />
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Pencarian" name="q" value="<?= $_GET['q'] ?>" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr class="nw">
                                                    <th>No</th>
                                                    <th>Diagnosa</th>
                                                    <th>Gejala</th>
                                                    <th>MB</th>
                                                    <th>MD</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $q = esc_field($_GET['q']);
                                            $rows = $db->get_results("SELECT r.ID, r.kode_gejala, d.kode_diagnosa, r.mb, r.md, g.nama_gejala, d.nama_diagnosa 
                                            FROM tb_relasi r INNER JOIN tb_diagnosa d ON d.`kode_diagnosa`=r.`kode_diagnosa` INNER JOIN tb_gejala g ON g.`kode_gejala`=r.`kode_gejala`
                                            WHERE r.kode_gejala LIKE '%$q%'
                                            OR r.kode_diagnosa LIKE '%$q%'
                                            OR g.nama_gejala LIKE '%$q%'
                                            OR d.nama_diagnosa LIKE '%$q%' 
                                            ORDER BY r.kode_diagnosa, r.kode_gejala");
                                            $no = 0;

                                            foreach ($rows as $row) : ?>
                                                <tr>
                                                    <td><?= ++$no ?></td>
                                                    <td>[<?= $row->kode_diagnosa . '] ' . $row->nama_diagnosa ?></td>
                                                    <td>[<?= $row->kode_gejala . '] ' . $row->nama_gejala ?></td>
                                                    <td><?= $row->mb ?></td>
                                                    <td><?= $row->md ?></td>
                                                    <td class="nw">
                                                        <a class="btn btn-xs btn-warning" href="relasi_ubah.php?ID=<?= $row->ID ?>"><span class="mdi mdi-table-edit"></span></a>
                                                        <a class="btn btn-xs btn-danger" href="aksi.php?act=relasi_hapus&ID=<?= $row->ID ?>" onclick="return confirm('Hapus data?')"><span class="mdi mdi-delete"></span></a>
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