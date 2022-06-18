<div class="page-header">
    <h1>Konsultasi</h1>
</div>
<form method="post">    
    <div class="panel panel-primary">
        <div class="panel-heading">        
            <h3 class="panel-title">Isi Identitas &amp; Pilih Gejala</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $success = false;
                    if($_POST){
                        $nama = $_POST['nama'];
                        $jk = $_POST['jk'];
                        $umur = $_POST['umur'];
                        $alamat = $_POST['alamat'];

                        $selected = (array) $_POST['gejala'];

                        $success = true;

                        if($nama=='' || $jk=='' || $umur=='' || $alamat==''){
                            $success = false;
                            print_msg('Isikan nama, jenis kelamin, umur dan alamat!');
                        } else if(!$selected){
                            $success = false;
                            print_msg('Belum ada gejala yang dipilih!');
                        }
                    }

                    $_SESSION['data'] = $_POST;

                    ?>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="<?=set_value('nama')?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control" name="jk">
                            <option value="">&nbsp;</option>
                            <?=get_jk_option(set_value('jk'))?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Umur <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="umur" value="<?=set_value('umur')?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamat" value="<?=set_value('alamat')?>">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th><input type="checkbox" id="checkAll" /></th>
                <th>No</th>
                <th>Nama Gejala</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_gejala 
        WHERE kode_gejala LIKE '%$q%' OR nama_gejala LIKE '%$q%'
        ORDER BY kode_gejala");
        $no=1;
        foreach($rows as $row):?>
        <tr>
            <td><input type="checkbox" name="gejala[]" value="<?=$row->kode_gejala?>" /></td>
            <td><?=$no++?></td>
            <td><?=$row->nama_gejala?></td>
        </tr>
        <?php endforeach;?>
        </table>
        <div class="panel-footer">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit Diagnosa</button>
        </div>
    </div>
</form>
<script>
$(function(){
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});
</script>
<?php if($success) include 'konsultasi_hasil.php';?>