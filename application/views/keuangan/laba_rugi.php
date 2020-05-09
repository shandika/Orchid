<div class="form-group">
    <label for="formGroupExampleInput">Pilih Project</label>
    <select class="form-control" id="project_LR" name="project_LR" onchange="loadlr()">
        <option selected>Pilih Project</option>
        <?php foreach ($query as $key) : ?>
            <option value="<?= $key->nama_gl; ?>"><?= $key->ID_project; ?> / <?= $key->nama; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Penjualan</label>
    <input type="text" class="form-control" id="penjualan_LR" name="penjualan_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Harga Pokok Penjualan</label>
    <input type="text" class="form-control" id="harga_pokok_LR" name="harga_pokok_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Laba Bruto</label>
    <input type="text" class="form-control" id="laba_bruto_LR" name="no_ktp_angsuran" placeholder="Otomatis Terisi" readonly>
    <br>
</div>

<div class="col-12">
    <h5 style="text-align: center" class="col-12">Biaya Operasional</h5>
    <br>
</div>

<br>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Operasional kantor</label>
    <input type="text" class="form-control" id="B1_LR" name="B1_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Promosi & Marketing</label>
    <input type="text" class="form-control" id="B2_LR" name="B2_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Sewa Kantor</label>
    <input type="text" class="form-control" id="B3_LR" name="B3_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Marketing Fee</label>
    <input type="text" class="form-control" id="B4_LR" name="B4_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Kurir</label>
    <input type="text" class="form-control" id="B5_LR" name="B5_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Listrik</label>
    <input type="text" class="form-control" id="B6_LR" name="B6_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Gaji Karyawan</label>
    <input type="text" class="form-control" id="B7_LR" name="B7_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Perijinan</label>
    <input type="text" class="form-control" id="B8_LR" name="B8_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Tukang</label>
    <input type="text" class="form-control" id="B9_LR" name="B9_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Sewa Mobil</label>
    <input type="text" class="form-control" id="B10_LR" name="B10_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Bensin, Toll dan Parkir</label>
    <input type="text" class="form-control" id="B11_LR" name="B11_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Admin Bank</label>
    <input type="text" class="form-control" id="B12_LR" name="B12_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Pendapatan Bunga </label>
    <input type="text" class="form-control" id="B13_LR" name="B13_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Entertaiment</label>
    <input type="text" class="form-control" id="B14_LR" name="B14_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Donasi & Sumbangan</label>
    <input type="text" class="form-control" id="B15_LR" name="B15_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Pematangan Lahan & Pembangunan</label>
    <input type="text" class="form-control" id="B16_LR" name="B16_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Biaya Pembebanan Per unit</label>
    <input type="text" class="form-control" id="B17_LR" name="B17_LR" placeholder="Otomatis Terisi" readonly>
    <br>
</div>
<div class="col-12">
    <br>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Laba Kotor Sebelum Pajak </label>
    <input type="text" class="form-control" id="laba_kotor_LR" name="laba_kotor_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Pajak Penghasilan </label>
    <input type="text" class="form-control" id="pajak_penghasilan_LR" name="pajak_penghasilan_LR" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Laba Setelah Pajak </label>
    <input type="text" class="form-control" id="laba_setelah_pajak_LR" name="laba_setelah_pajak_LR" placeholder="Otomatis Terisi" readonly>
</div>