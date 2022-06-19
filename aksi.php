<?php
require_once 'functions.php';
/** LOGIN */
 if($act=='logout'){
    unset($_SESSION['login']);
    header("location:index.php");
}

/** DIAGNOSA */
 else if ($act=='diagnosa_hapus'){
    $db->query("DELETE FROM tb_diagnosa WHERE kode_diagnosa='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_diagnosa='$_GET[ID]'");
    header("location:diagnosa.php");
} 

/** GEJALA */    
  else if ($act=='gejala_hapus'){
    $db->query("DELETE FROM tb_gejala WHERE kode_gejala='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_gejala='$_GET[ID]'");
    header("location:gejala.php");
} 
    
/** RELASI */ 
 else if ($act=='relasi_hapus'){
    $db->query("DELETE FROM tb_relasi WHERE ID='$_GET[ID]'");
    header("location:relasi.php");
}     
?>
