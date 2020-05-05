<div class="breadcrumbs mb-2">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Project</h1>
            </div>
        </div>
    </div>
</div>
<div class="row mx-4">
    <div class="col-sm-8">
        <?php foreach ($project as $data) : ?>
            <form action="<?= base_url('Pm/update'); ?>" class="mx-4" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
                <div class="content ">
                    <div class="form-group mt-2">
                        <input type="hidden" class="form-control" id="ID_project" name="ID_project" value="<?= $data->ID_project; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama project" value="<?= $data->nama; ?>" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Alamat" required=""><?= $data->alamat; ?></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" placeholder="Deskripsi" required=""><?= $data->deskripsi; ?> </textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="foto_lama" value="<?= $data->foto ?>" />
                        <div class="col-sm-2">Gambar project</div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="<?= base_url('assets/images/project/') . $data->foto ?>" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <label for="foto"></label>
                                    <input type="file" class="form-control" id="foto" name="foto" rows="2"></input>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_unit">Jumlah unit :</label>
                        <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" placeholder="Jumlah unit" value="<?= $data->jumlah_unit; ?>" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="unit_kosong">Unit kosong :</label>
                        <input type="number" class="form-control" id="unit_kosong" name="unit_kosong" placeholder="Unit kosong" value="<?= $data->unit_kosong; ?>" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="unit_isi">Unit isi :</label>
                        <input type="number" class="form-control" id="unit_isi" name="unit_isi" placeholder="Unit isi" value="<?= $data->unit_isi; ?>" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="modal-footer mb-5">
                    <div>
                        <a href="<?= base_url('pm/backPm') ?>" class=" btn btn-danger" name="edit">Batal</a>
                    </div>
                    <div>
                        <button type="submit" class=" btn btn-primary" name="edit">Simpan</button>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>