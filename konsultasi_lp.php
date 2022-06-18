<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ThreeDoctor</title>
    <link rel="stylesheet" href="landing_page/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="landing_page/vendors/owl.carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="landing_page/vendors/owl.carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="landing_page/vendors/aos/css/aos.css">
    <link rel="stylesheet" href="landing_page/vendors/jquery-flipster/css/jquery.flipster.css">
    <link rel="stylesheet" href="landing_page/css/style.css">
    <link rel="shortcut icon" href="landing_page/images/favicon.png" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="mobile-menu-overlay"></div>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="landing_page/images/threedoc_logo.png" alt="Marshmallow"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
                    <img src="landing_page/images/threedoc_logo.png" class="logo-mobile-menu" alt="logo">
                    <a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
                </div>
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#penting">Penting</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="konsultasi_lp.php">Konsultasi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-success" href="login.php">Login Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page-body-wrapper mt-4">
        <section class="contactus" id="konsultasi">
            <div class="container">
                <div class="row mb-5 pb-5">
                    <div class="col-sm-3" data-aos="fade-up" data-aos-offset="-500">
                        <img src="landing_page/images/contact.jpg" alt="contact" class="img-fluid">
                    </div>

                    <div class="col-sm-9" data-aos="fade-up" data-aos-offset="-500">
                        <h3 class="font-weight-medium text-dark mt-5 mt-lg-0">Konsultasi</h3>
                        <h5 class="text-dark mb-5">Isi Biodata dibawah ini untuk Mendiagnosa Penyakitmu:</h5>
                        <!--  -->
                        <form method="POST">
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select class="form-control" name="jk">
                                            <option value="">&nbsp;</option>
                                            <?= get_jk_option(set_value('jk')) ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Umur <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="umur" value="<?= set_value('umur') ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
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
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-secondary"><span class="glyphicon glyphicon-ok"></span> Submit Diagnosa</button>
                            </div>
                        </form>
                        <script>
                            $(function() {
                                $("#checkAll").click(function() {
                                    $('input:checkbox').not(this).prop('checked', this.checked);
                                });
                            });
                        </script>
                        <div class="col-sm-12">
                            <?php if ($success) include 'konsultasi_hasil.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="landing_page/images/threedoc_logo.png" alt="logo" class="mr-3">
                        <p class="mb-0 text-small pt-1">© 2021-2022 <a href="#" class="text-white" target="_blank">Threedoc</a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="landing_page/vendors/base/vendor.bundle.base.js"></script>
    <script src="landing_page/vendors/owl.carousel/js/owl.carousel.js"></script>
    <script src="landing_page/vendors/aos/js/aos.js"></script>
    <script src="landing_page/vendors/jquery-flipster/js/jquery.flipster.min.js"></script>
    <script src="landing_page/js/template.js"></script>
</body>

</html>