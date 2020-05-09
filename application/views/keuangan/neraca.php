<div class="form-group">
    <label for="formGroupExampleInput">Pilih Project</label>
    <select class="form-control" id="project_LR" name="project_LR" onchange="loadlr()">
        <option selected>Pilih Project</option>
        <?php foreach ($query as $key) : ?>
            <option value="<?= $key->nama_gl; ?>"><?= $key->ID_project; ?> / <?= $key->nama; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="col-12">
    <h5 style="text-align: center" class="col-12">Aktiva</h5>
    <br>
</div>
<br>
<div>
    <h6 class="col-12">Aktiva Lancar</h6>
</div>
<br>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Kas Kecil</label>
    <input type="text" class="form-control" id="penjualan_LR" name="penjualan_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Bank</label>
    <input type="text" class="form-control" id="harga_pokok_LR" name="harga_pokok_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Piutang usaha</label>
    <input type="text" class="form-control" id="B1_LR" name="B1_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Piutang Usaha Kredit Rumah</label>
    <input type="text" class="form-control" id="B2_LR" name="B2_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Piutang Karyawan</label>
    <input type="text" class="form-control" id="B3_LR" name="B3_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Uang Muka</label>
    <input type="text" class="form-control" id="B4_LR" name="B4_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="col-12">
    <h6>Persediaan</h6>
    <br>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Barang Jadi</label>
    <input type="text" class="form-control" id="B5_LR" name="B5_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Pekerjaan dalam progress</label>
    <input type="text" class="form-control" id="B6_LR" name="B6_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total Aktiva Lancar</label>
    <input type="text" class="form-control" id="B7_LR" name="B7_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="col-12">
    <br>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Aktiva Tidak Lancar</label>
    <input type="text" class="form-control" id="B8_LR" name="B8_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Tanah dan Bangunan</label>
    <input type="text" class="form-control" id="B9_LR" name="B9_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Peralatan kantor</label>
    <input type="text" class="form-control" id="B10_LR" name="B10_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total Aktiva Tidak Lancar</label>
    <input type="text" class="form-control" id="B11_LR" name="B11_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="col-12">
    <br>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total Aktiva</label>
    <input type="text" class="form-control" id="B11_LR" name="B11_LR" placeholder="Otomatis Terisi" readonly>
</div>