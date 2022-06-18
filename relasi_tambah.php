<div class="page-header">
    <h1>Tambah Relasi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Diagnosa <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_diagnosa">
                    <option value=""></option>
                    <?=get_diagnosa_option($_POST['kode_diagnosa'])?>
                </select>
            </div>
            <div class="form-group">
                <label>Gejala <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_gejala">
                    <option value=""></option>
                    <?=get_gejala_option($_POST['kode_gejala'])?>
                </select>
            </div>
            <div class="form-group">
                <label>MB <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="mb" value="<?=$_POST['mb']?>" />
            </div>
            <div class="form-group">
                <label>MD <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="md" value="<?=$_POST['md']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=diagnosa"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>