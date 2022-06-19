<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="admin/assets/images/user_img.png" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?= $_SESSION['login'] ?></span>
                    <span class="text-secondary text-small"><?= $_SESSION['level'] ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="diagnosa.php">
                <span class="menu-title">Diagnosa</span>
                <i class="mdi mdi-account-search-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="gejala.php">
                <span class="menu-title">Gejala</span>
                <i class="mdi mdi-alert-circle-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="relasi.php">
                <span class="menu-title">Relasi</span>
                <i class="mdi mdi-ray-start-end menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="konsultasi.php">
                <span class="menu-title">Konsultasi</span>
                <i class="mdi mdi-comment-text menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>