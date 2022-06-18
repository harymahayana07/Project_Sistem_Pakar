<div class="page-header">
    <h1>Hasil Diagnosa</h1>
</div>
<?php

$gejala = $_SESSION['gejala'] ;

$rows = $db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala IN ('".implode("','", $gejala)."')");
?>
<h3>Identitas</h3>
<?php
$_POST = $_SESSION['data'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
?>
<table>
    <tr>
        <td>Nama</td>
        <td><?=$nama?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?=$jk?></td>
    </tr>
    <tr>
        <td>Umur</td>
        <td><?=$umur?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?=$alamat?></td>
    </tr>
</table>
<h3>Gejala Terpilih</h3>
<table>
<thead>
    <tr>
        <th>No</th>
        <th>Nama Gejala</th>
    </tr>
</thead>
<?php
$no=1;
foreach($rows as $row):?>
<tr>
    <td><?=$no++?></td>
    <td><?=$row->nama_gejala?></td>
</tr>
<?php endforeach;
?>
</table>
<?php
$rows = $db->get_results("SELECT * 
    FROM tb_relasi r INNER JOIN tb_diagnosa d ON d.kode_diagnosa = r.kode_diagnosa      
    WHERE r.kode_gejala IN ('".implode("','", $gejala)."') ORDER BY r.kode_diagnosa, r.kode_gejala");

foreach($rows as $row){
    $diagnosa[$row->kode_diagnosa]['mb'] = $diagnosa[$row->kode_diagnosa]['mb'] + $row->mb * (1 - $diagnosa[$row->kode_diagnosa]['mb']);
    $diagnosa[$row->kode_diagnosa]['md'] = $diagnosa[$row->kode_diagnosa]['md'] + $row->md * (1 - $diagnosa[$row->kode_diagnosa]['md']);
    $diagnosa[$row->kode_diagnosa]['cf'] = $diagnosa[$row->kode_diagnosa]['mb'] -  $diagnosa[$row->kode_diagnosa]['md']; 
    $diagnosa[$row->kode_diagnosa]['nama_diagnosa'] = $row->nama_diagnosa;
    $diagnosa[$row->kode_diagnosa]['solusi'] = $row->keterangan;
}
?>
<h3>Hasil Analisa</h3>
<table>
<thead>
    <tr>
        <th>No</th>
        <th>Diagnosa</th>
        <th>Kepercayaan</th>
    </tr>
</thead>
<?php
$no=1;
function ranking($array){
    $new_arr = array();
    foreach($array as $key => $value) {
        $new_arr[$key] = $value['cf'];
    }
    arsort($new_arr);
    
    $result = array();    
    foreach($new_arr as $key => $value){
        $result[$key] = ++$no;
    }    
    return $result;
}    

$rank = ranking($diagnosa);

foreach($rank as $key => $value):?>
<tr class="<?=($value==1) ? 'text-primary' : ''?>">
    <td><?=$no++?></td>
    <td><?=$diagnosa[$key]['nama_diagnosa']?></td>
    <td><?=$diagnosa[$key]['cf']?></td>
</tr>
<?php endforeach;
reset($rank);        
?>
</table>

<table>
    <tr>
        <td>Diagnosa</td>
        <td><?=$diagnosa[key($rank)]['nama_diagnosa']?></td>
    </tr>
    <tr>
        <td>Solusi</td>
        <td><?=$diagnosa[key($rank)]['solusi']?></td>
    </tr>
</table>