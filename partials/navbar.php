 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         <a class="navbar-brand brand-logo" href="dashboard.php"><img src="admin/assets/images/threedoc_logo.png" alt="logo" /></a>
         <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="admin/assets/images/threedoc_logo.png" alt="logo" /></a>
     </div>
     <div class="navbar-menu-wrapper d-flex align-items-stretch">
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
             <span class="mdi mdi-menu"></span>
         </button>
         <ul class="navbar-nav navbar-nav-right">
             <li class="nav-item nav-profile dropdown">
                 <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                     <div class="nav-profile-img">
                         <img src="admin/assets/images/user_img.png" alt="image">
                         <span class="availability-status online"></span>
                     </div>
                     <div class="nav-profile-text">
                         <p class="mb-1 text-black"><?= $_SESSION['login'] ?></p>
                     </div>
                 </a>
                 <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                     <a class="dropdown-item text-dark" href="password.php">
                         <i class="mdi mdi-cached me-2 text-success"></i> Password </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item text-dark" href="aksi.php?act=logout">
                         <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                 </div>
             </li>
         </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
             <span class="mdi mdi-menu"></span>
         </button>
     </div>
 </nav>