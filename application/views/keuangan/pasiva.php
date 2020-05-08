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
    <h5 style="text-align: center" class="col-12">Hutang Lancar</h5>
    <br>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Hutang usaha</label>
    <input type="text" class="form-control" id="penjualan_LR" name="penjualan_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Hutang Konsiyasi</label>
    <input type="text" class="form-control" id="harga_pokok_LR" name="harga_pokok_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Hutang Leverensir</label>
    <input type="text" class="form-control" id="laba_bruto_LR" name="no_ktp_angsuran" placeholder="Otomatis Terisi" readonly>

</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Uang Muka Penjualan</label>
    <input type="text" class="form-control" id="laba_bruto_LR" name="no_ktp_angsuran" placeholder="Otomatis Terisi" readonly>

</div>
<div class="form-group col-6">
    <label for="formGroupExampleInput">Total Hutang Lancar</label>
    <input type="text" class="form-control" id="laba_bruto_LR" name="no_ktp_angsuran" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-6">
    <label for="formGroupExampleInput">Hutang Pemegang Saham</label>
    <input type="text" class="form-control" id="laba_bruto_LR" name="no_ktp_angsuran" placeholder="Otomatis Terisi" readonly>
    <br>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total hutang</label>
    <input type="text" class="form-control" id="laba_bruto_LR" name="no_ktp_angsuran" placeholder="Otomatis Terisi" readonly>
    <br>
</div>
<div class="col-12">
    <h5 style="text-align: center" class="col-12">Modal</h5>
    <br>
</div>

<br>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Modal Disetor</label>
    <input type="text" class="form-control" id="B1_LR" name="B1_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Modal Adi</label>
    <input type="text" class="form-control" id="B2_LR" name="B2_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Mohamad arief</label>
    <input type="text" class="form-control" id="B3_LR" name="B3_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Samsunar</label>
    <input type="text" class="form-control" id="B4_LR" name="B4_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Adi Dharma</label>
    <input type="text" class="form-control" id="B5_LR" name="B5_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-9">
    <label for="formGroupExampleInput">Saldo Laba Ditahan</label>
    <input type="text" class="form-control" id="B6_LR" name="B6_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total Modal</label>
    <input type="text" class="form-control" id="B7_LR" name="B7_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="col-12">
    <br>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total Pasiva</label>
    <input type="text" class="form-control" id="B8_LR" name="B8_LR" placeholder="Otomatis Terisi" readonly>
</div>