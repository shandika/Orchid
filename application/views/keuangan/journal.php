<form method="POST" action="<?= base_url('Keuangan/tambahjournal') ?>">
    <div class="form-group">
        <label for="formGroupExampleInput">Pilih Project</label>
        <select class="custom-select my-1 mr-sm-2" id="project_journal" name="project_journal" onchange="activebutton()">
            <option selected value="0">Pilih Project</option>
            <?php foreach ($query1 as $key) : ?>
                <option value="<?= $key->ID_project; ?>"><?= $key->ID_project; ?> / <?= $key->nama; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group col-4">
        <label for="formGroupExampleInput">Kode GL</label>
        <input type="text" class="form-control" id="nomor_gl" name="nomor_gl" placeholder="Kode GL" readonly>
    </div>
    <div class="form-group col-4">
        <label for="formGroupExampleInput2">Nama GL</label>
        <input type="text" class="form-control" id="nama_gl" name="nama_gl" placeholder="Nama GL">
    </div>
    <div class="form-group col-4">
        <label for="formGroupExampleInput2">Debit</label>
        <input type="text" class="form-control" id="debit_journal" name="debit_journal" placeholder="0">
    </div>
    <div class="form-group col-4">
        <label for="formGroupExampleInput">Kode GL</label>
        <input type="text" class="form-control" id="nomor_gl2" name="nomor_gl2" placeholder="Kode GL" readonly>
    </div>
    <div class="form-group col-4">
        <label for="formGroupExampleInput2">Nama GL</label>
        <input type="text" class="form-control" id="nama_gl2" name="nama_gl2" placeholder="Nama GL">
    </div>
    <div class="form-group col-4">
        <label for="formGroupExampleInput2">Kredit</label>
        <input type="text" class="form-control" id="kredit_journal" name="kredit_journal" placeholder="0">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Keterangan</label>
        <input type="text" class="form-control" id="keterangan_journal" name="keterangan_journal" placeholder="masukan keterangan tambahan">
    </div>
    <button type="submit" class="btn btn-success col-md-12" disabled id="buttonjournal" name="buttonjournal">Input</button>
</form>