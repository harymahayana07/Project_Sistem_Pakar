<div class="page-header mt-5">
    <h4 class="font-weight-medium text-dark mt-5 mt-lg-0">HASIL DIAGNOSA</h4>
</div>
<?php
$gejala = (array) $_POST['gejala'];

$rows = $db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala IN ('" . implode("','", $gejala) . "')");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="text-dark mt-5 mt-lg-0">Gejala Terpilih</h5>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gejala</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($rows as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->nama_gejala ?></td>
            </tr>
        <?php endforeach;
        ?>
    </table>
</div>
<?php
$rows = $db->get_results("SELECT * 
    FROM tb_relasi r INNER JOIN tb_diagnosa d ON d.kode_diagnosa = r.kode_diagnosa      
    WHERE r.kode_gejala IN ('" . implode("','", $gejala) . "') ORDER BY r.kode_diagnosa, r.kode_gejala");

foreach ($rows as $row) {
    $diagnosa[$row->kode_diagnosa]['mb'] = $diagnosa[$row->kode_diagnosa]['mb'] + $row->mb * (1 - $diagnosa[$row->kode_diagnosa]['mb']);
    $diagnosa[$row->kode_diagnosa]['md'] = $diagnosa[$row->kode_diagnosa]['md'] + $row->md * (1 - $diagnosa[$row->kode_diagnosa]['md']);



    $diagnosa[$row->kode_diagnosa]['cf'] = $diagnosa[$row->kode_diagnosa]['mb'] -  $diagnosa[$row->kode_diagnosa]['md'];

    //echo $row->nama_diagnosa .':'. $diagnosa[$row->kode_diagnosa]['mb'].':'.$diagnosa[$row->kode_diagnosa]['md'].':'.$diagnosa[$row->kode_diagnosa]['cf']. '<br />';

    $diagnosa[$row->kode_diagnosa]['nama_diagnosa'] = $row->nama_diagnosa;
    $diagnosa[$row->kode_diagnosa]['solusi'] = $row->keterangan;
}
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="text-dark mt-5 mt-lg-0">Hasil Analisa</h5>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Diagnosa</th>
                <th>Kepercayaan</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        function ranking($array)
        {
            $new_arr = array();
            foreach ($array as $key => $value) {
                $new_arr[$key] = $value['cf'];
            }
            arsort($new_arr);

            $result = array();
            foreach ($new_arr as $key => $value) {
                $result[$key] = ++$no;
            }
            return $result;
        }

        $rank = ranking((array)$diagnosa);

        foreach ($rank as $key => $value) : ?>
            <tr class="<?= ($value == 1) ? 'text-primary' : '' ?>">
                <td><?= $no++ ?></td>
                <td><?= $diagnosa[$key]['nama_diagnosa'] ?></td>
                <td><?= $diagnosa[$key]['cf'] ?></td>
            </tr>
        <?php endforeach;
        reset($rank);
        $_SESSION['gejala'] = $gejala;
        ?>
    </table>
    <div class="panel-body">
        <h5 class="text-dark mt-5 mt-lg-0">Diagnosa : <?= $diagnosa[key($rank)]['nama_diagnosa'] ?></h5>
        <div>
            <?= $diagnosa[key($rank)]['solusi'] ?>
        </div>
        <br />
        <div class="form-group">
            <a class="btn btn-primary" href="?m=konsultasi"><span class="glyphicon glyphicon-refresh"></span> Ulang</a>
            <a class="btn btn-secondary" href="cetak.php?m=konsultasi" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
        </div>
    </div>
</div>