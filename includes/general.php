<?php
/**
 * Menampilkan value dari variabel POST atau GET
 * @param string $key nama field atau variabel
 * @param string $default data asli jika null
 * @return string Isi variabel POST atau get
 */
function set_value($key = null, $default = null){
    global $_POST;
    if(isset($_POST[$key]))
        return $_POST[$key];

    if(isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}
function get_words($str, $length, $suffix = '...'){
    $str = strip_tags($str);
    $arr_str = explode(' ', $str, $length + 1);
    if(count($arr_str) > $length) {
        array_pop($arr_str);
        return implode(' ', $arr_str) . $suffix;
    } else {
        return $str;
    }
}
    
function esc_field($str){
    if (!get_magic_quotes_gpc())
        return addslashes($str);
    else
        return $str;
}

function get_option($option_name){
    global $db;
    return $db->get_var("SELECT option_value FROM tb_options WHERE option_name='$option_name'");
}

function update_option($option_name, $option_value){
    global $db;
    return $db->query("UPDATE tb_options SET option_value='$option_value' WHERE option_name='$option_name'");
}

function redirect_js($url){
    echo '<script type="text/javascript">window.location.replace("'.$url.'");</script>';
}

function alert($url){
    echo '<script type="text/javascript">alert("'.$url.'");</script>';
}

function print_msg($msg, $type = 'danger'){
    echo('<div class="alert alert-'.$type. ' alert-dismissible" role="alert">
   <a href=""><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>&emsp;'.$msg.'</div>');
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function ses_id(){
    return session_id();
}

function get_jk_radio($selected){
    $array = array('Laki-laki', 'Perempuan');
    foreach($array as $arr){
        if($arr==$selected)
            $a.="<label class='radio-inline'>
                  <input type='radio' name='jk' value='$arr' checked> $arr
                </label>";
        else
            $a.="<label class='radio-inline'>
                  <input type='radio' name='jk' value='$arr'> $arr
                </label>";    
    }
    return '<div class="radio">'.$a.'</div>';
} 

function print_error($msg){
    die('<!DOCTYPE html>
    <html>
        <head><title>Error</title>
        <link href="../assets/css/united-bootstrap.min.css" rel="stylesheet"/>
        <body>
            <div class="container" style="margin:20px auto; width:400px">
                <p class="alert alert-warning">'.$msg.' <a href="javascript:history.back(-1)">Kembali</a></p>                
            </div>
        </body>
    </html>');
}

function tgl_indo($date){
    $tanggal = split('-', $date);
    
    $array_bulan = array( 1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $bulan = $array_bulan[$tanggal[1]*1];
    
    return $tanggal[2] .' '. $bulan .' '. $tanggal[0];
}

function terbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . "belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
}