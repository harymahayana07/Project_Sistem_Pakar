<?php
error_reporting(~E_NOTICE);
session_start();

include 'config.php';
include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include 'includes/general.php';
    
$mod = $_GET['m'];
$act = $_GET['act'];   

$JK = array(
    'Laki-laki' => 'Laki-laki', 
    'Perempuan' => 'Perempuan',
);

function get_jk_option($selected = ''){
    global $JK;    
    foreach($JK as $key => $val){
        if($key==$selected)
            $a.="<option value='$key' selected>$val</option>";
        else
            $a.="<option value='$key'>$val</option>";
    }
    return $a;
}

function get_diagnosa_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa, nama_diagnosa FROM tb_diagnosa ORDER BY kode_diagnosa");
    foreach($rows as $row){
        if($row->kode_diagnosa==$selected)
            $a.="<option value='$row->kode_diagnosa' selected>[$row->kode_diagnosa] $row->nama_diagnosa</option>";
        else
            $a.="<option value='$row->kode_diagnosa'>[$row->kode_diagnosa] $row->nama_diagnosa</option>";
    }
    return $a;
}

function get_gejala_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala ORDER BY kode_gejala");
    foreach($rows as $row){
        if($row->kode_gejala==$selected)
            $a.="<option value='$row->kode_gejala' selected>[$row->kode_gejala] $row->nama_gejala</option>";
        else
            $a.="<option value='$row->kode_gejala'>[$row->kode_gejala] $row->nama_gejala</option>";
    }
    return $a;
}