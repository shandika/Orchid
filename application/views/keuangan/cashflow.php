<form action="<?= base_url('Keuangan/tampil_cashflow') ?>" method="POST">
    <div class="form-group col-9">
        <label for="formGroupExampleInput">Pilih Project</label>
        <select class="form-control" id="project_CF" name="project_CF">
            <option selected>Pilih Project</option>
            <?php foreach ($query as $key) : ?>
                <option value="<?= $key->nama_gl; ?>"><?= $key->ID_project; ?> / <?= $key->nama; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-3">
        <label for="">Tekan Untuk melihat Data</label>
        <button type="submit" class="btn btn-success form-control">Tampil</button>
    </div>
</form>
<div class="col-12">
    <h5 style="text-align: center" class="col-12">Dari Operasional</h5>
    <br>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Pembayaran Supplier</label>
    <input type="text" class="form-control" id="CF1" name="CF1" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Pembayaran Kepada Karyawan</label>
    <input type="text" class="form-control" id="CF2" name="CF2" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Pembayaran Pajak</label>
    <input type="text" class="form-control" id="CF3" name="CF3" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Penerimaan dari Pelanggaran</label>
    <input type="text" class="form-control" id="CF4" name="CF4" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-4">
    <label for="formGroupExampleInput">Setoran pemegang Saham</label>
    <input type="text" class="form-control" id="CF5" name="CF5" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total Operasional CashFlow</label>
    <input type="text" class="form-control" id="CF6" name="CF6" placeholder="Otomatis Terisi" readonly>
    <br>
</div>

<div class="col-12">
    <h5 style="text-align: center" class="col-12">Dari Investasi</h5>
    <br>
</div>

<br>
<div class="form-group col-6">
    <label for="formGroupExampleInput">Pembelian Aset Tetap</label>
    <input type="text" class="form-control" id="CF7" name="CF7" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-6">
    <label for="formGroupExampleInput">Penjualan Aset Tetap</label>
    <input type="text" class="form-control" id="CF8" name="CF8" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total Investasi CashFlow</label>
    <input type="text" class="form-control" id="CF9" name="CF9" placeholder="Otomatis Terisi" readonly>
    <br>
</div>
<div class="col-12">
    <h5 style="text-align: center" class="col-12">Financing</h5>
    <br>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Pembayaran Bank</label>
    <input type="text" class="form-control" id="CF10" name="CF10" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Pembayaran Pemegang Saham</label>
    <input type="text" class="form-control" id="CF11" name="CF11" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Pinjaman Bank</label>
    <input type="text" class="form-control" id="CF12" name="CF12" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-3">
    <label for="formGroupExampleInput">Pinjaman Pemegang Saham</label>
    <input type="text" class="form-control" id="CF13" name="CF13" placeholder="Otomatis Terisi" readonly>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total Financing CashFlow</label>
    <input type="text" class="form-control" id="CF14" name="CF14" placeholder="Otomatis Terisi" readonly>
</div>
<div class="col-12">
    <br>
</div>
<div class="form-group col-12">
    <label for="formGroupExampleInput">Total CashFlow</label>
    <input type="text" class="form-control" id="CF15" name="CF15" placeholder="Otomatis Terisi" readonly>
</div>