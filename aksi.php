<?php
require_once 'functions.php';
/** LOGIN */
if (isset($_POST['login'])){
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
    if($row){
        $_SESSION['login'] = $row->user;
        redirect_js("admin/index.php");
    } else{
        print_msg("Salah kombinasi username dan password.");
    }          
}else if ($mod=='password'){
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");        
    
    if($pass1=='' || $pass2=='' || $pass3=='')
        print_msg('Field bertanda * harus diisi.');
    elseif(!$row)
        print_msg('Password lama salah.');
    elseif( $pass2 != $pass3 )
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else{        
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif($act=='logout'){
    unset($_SESSION['login']);
    header("location:index.php?m=login");
}

/** DIAGNOSA */
elseif($mod=='diagnosa_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_diagnosa WHERE kode_diagnosa='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_diagnosa (kode_diagnosa, nama_diagnosa, keterangan) VALUES ('$kode', '$nama', '$keterangan')");                       
        redirect_js("index.php?m=diagnosa");
    }
} else if($mod=='diagnosa_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_diagnosa SET nama_diagnosa='$nama', keterangan='$keterangan' WHERE kode_diagnosa='$_GET[ID]'");
        redirect_js("index.php?m=diagnosa");
    }
} else if ($act=='diagnosa_hapus'){
    $db->query("DELETE FROM tb_diagnosa WHERE kode_diagnosa='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_diagnosa='$_GET[ID]'");
    header("location:index.php?m=diagnosa");
} 

/** GEJALA */    
if($mod=='gejala_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    
    if($kode=='' || $nama=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_gejala (kode_gejala, nama_gejala) VALUES ('$kode', '$nama')");
        $id = $db->insert_id;                           
        redirect_js("index.php?m=gejala");
    }                    
} else if($mod=='gejala_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    
    if($kode=='' || $nama=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_gejala SET nama_gejala='$nama' WHERE kode_gejala='$_GET[ID]'");
        redirect_js("index.php?m=gejala");
    }    
} else if ($act=='gejala_hapus'){
    $db->query("DELETE FROM tb_gejala WHERE kode_gejala='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_gejala='$_GET[ID]'");
    header("location:index.php?m=gejala");
} 
    
/** RELASI TAMBAH */ 
else if ($mod=='relasi_tambah'){
    $kode_diagnosa = $_POST[kode_diagnosa];
    $kode_gejala = $_POST[kode_gejala];
    $mb = $_POST[mb];
    $md = $_POST[md];
    
    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasi WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejala='$kode_gejala'");
    
    if($kode_diagnosa=='' || $kode_gejala=='' || $mb=='' || $md=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else{
        $db->query("INSERT INTO tb_relasi (kode_diagnosa, kode_gejala, mb, md) VALUES ('$kode_diagnosa', '$kode_gejala', '$mb', '$md')");
        redirect_js("index.php?m=relasi");
    }   
}else if ($mod=='relasi_ubah'){
    $kode_diagnosa = $_POST[kode_diagnosa];
    $kode_gejala = $_POST[kode_gejala];
    $mb = $_POST[mb];
    $md = $_POST[md];
    
    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasi WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejala='$kode_gejala' AND ID<>'$_GET[ID]'");
    
    if($kode_diagnosa=='' || $kode_gejala=='' || $mb=='' || $md=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else{
        $db->query("UPDATE tb_relasi SET kode_diagnosa='$kode_diagnosa', kode_gejala='$kode_gejala', mb='$mb', md='$md' WHERE ID='$_GET[ID]'");
        redirect_js("index.php?m=relasi");
    }  
    header("location:index.php?m=relasi");
} else if ($act=='relasi_hapus'){
    $db->query("DELETE FROM tb_relasi WHERE ID='$_GET[ID]'");
    header("location:index.php?m=gejala");
}     
?>
