<?php include "functions.php"; ?>
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
  <title>Dashboard</title>
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
              <i class="mdi mdi-home"></i>
            </span> Dashboard
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
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
              <div class="card-body">
                <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-1">Data Diagnosa <i class="mdi mdi-account-search-outline mdi-24px float-right"></i>
                </h4>
                <a href="diagnosa.php"><button class="btn btn-block btn-lg btn-gradient-primary mt-2">View</button></a>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
              <div class="card-body">
                <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-1">Data Gejala <i class="mdi mdi-alert-circle-outline mdi-24px float-right"></i>
                </h4>
                <a href="gejala.php"><button class="btn btn-block btn-lg btn-gradient-primary mt-2">View</button></a>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
              <div class="card-body">
                <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-1">Data Relasi <i class="mdi mdi-ray-start-end mdi-24px float-right"></i>
                </h4>
                <a href="relasi.php"><button class="btn btn-block btn-lg btn-gradient-primary mt-2">View</button></a>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-warning card-img-holder text-white">
              <div class="card-body">
                <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-1">Konsultasi <i class="mdi mdi-comment-text mdi-24px float-right"></i>
                </h4>
                <a href="konsultasi.php"><button class="btn btn-block btn-lg btn-gradient-primary mt-2">View</button></a>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-warning card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-2">95,5741</h2>
                    <a href="../landing_page/index.html"><button class="btn btn-block btn-lg btn-gradient-primary mt-4">View</button></a>
                  </div>
                </div>
              </div> -->
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