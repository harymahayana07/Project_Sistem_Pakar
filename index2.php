<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="assets/unnamed.png"/>

    <title>Sistem Pakar Penyakit Menular</title>
    <link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>   
    <script src="assets/tinymce/tinymce.min.js"></script>    
    <script>
        tinymce.init({
        selector: "textarea.mce",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            menubar : false,
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>        
  </head>
  <body>
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?">yukdiagnosis!</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">            
            <?php if($_SESSION['login']):?>
            <li><a href="?m=diagnosa"><span class="glyphicon glyphicon-pushpin"></span> Diagnosa</a></li>
            <li><a href="?m=gejala"><span class="glyphicon glyphicon-flash"></span> Gejala</a></li>
            <li><a href="?m=relasi"><span class="glyphicon glyphicon-star"></span> Relasi</a></li>
            <li><a href="?m=konsultasi"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li>    
            <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
            <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php else:?>
            <li><a href="?m=konsultasi"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li> 
            <li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login Admin</a></li>
            <?php endif?>               
          </ul>          
        </div>
      </div>
    </nav>
    <div class="container">
    <?php
        if(file_exists($mod.'.php'))
            if(!$_SESSION['login'] && in_array($mod, array('diagnosa', 'gejala', 'relasi', 'password')))
                redirect_js('index.php?m=login');
            else
                include $mod.'.php';
        else
            include 'home.php';
    ?>
    
    </footer>
</body>
</html>