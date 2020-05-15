<div class="breadcrumbs mb-2">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Unit</h1>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <?php foreach ($project as $data) : ?>
        <div class="col-sm-8 mt-4 ml-3">
            <button id="btn-tambah-formUnit" class="btn btn-success " data-id="<?= $data->ID_project; ?>"><i class="fa fa-plus"></i> Tambah Form</button>
            <button type="reset" id="btn-reset-formUnit" class="btn btn-danger "><i class="fa fa-minus"></i> Reset Form</button>
        </div>
        <form action="<?= base_url('Pm/simpanDataUnit'); ?>" method="POST">
            <div class="col-sm-12 ml-4 my-3">
                <b>Data ke 1 :</b>
            </div>
            <input type="hidden" class="form-control" id="idProject" name="idProject" value="<?= $data->ID_project; ?>">
            <div class="col-sm-2 ml-4">
                <div class="form-group">
                    <label for="nomor">Nomor Unit</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="A" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-sm-2 ml-4">
                <div class="form-group">
                    <label for="nomor">Jumlah Unit</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="10" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-sm-2 ml-4">
                <div class="form-group">
                    <label for="type">Type Unit</label>
                    <input type="number" class="form-control" id="type" name="type" placeholder="Type Unit" required>
                </div>
            </div>
            <div class="col-sm-2 ml-4">
                <div class="form-group">
                    <label for="luasBangunan">Luas Bangunan</label>
                    <input type="number" class="form-control" id="luasBangunan" name="luasBangunan" placeholder="Luas Bangunan" required>
                </div>
            </div>
            <div class="col-sm-2 ml-4">
                <div class="form-group">
                    <label for="luasTanah">Luas Tanah</label>
                    <input type="number" class="form-control" id="luasTanah" name="luasTanah" placeholder="Luas Tanah" required>
                </div>
            </div>
            <div id="insert-formUnit">
                <input type="hidden" id="jumlah-formUnit" value="1">
            </div>
</div>
<div class="col-sm-12">
    <div class="col-sm-8 "></div>
    <div class="col-sm-1 ">
        <a href="<?= base_url('pm/backPm') ?>" class="btn btn-secondary mb-5 ml-4"><i class="fa fa-close pr-1"></i>Batal</a>
    </div>
    <div class="col-sm-1 ml-3">
        <button class="btn btn-primary mb-5" type="submit"><i class="fa fa-save pr-1"></i>Simpan Unit</button>
    </div>
</div>
</form>
<!-- <?php endforeach; ?> -->
</div>