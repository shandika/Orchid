<form method="POST">
    <div class="form-group col-6">
        <label for="formGroupExampleInput">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
    </div>
    <div class="form-group col-6">
        <label for="formGroupExampleInput">Nomor KTP</label>
        <input type="text" class="form-control" id="no_ktp_angsuran" name="no_ktp_angsuran" placeholder="Otomatis Terisi">
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">ID Invoice</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Otomatis Terisi Saat memasukan nama">
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">ID Angsuran</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Otomatis Terisi Saat memasukan nama">
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">Nominal Pembayaran</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Otomatis Terisi Saat memasukan nama">
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">Tanggal Pembayaran</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Otomatis Terisi dengan fungsi get date">
    </div>
    <div class="form-group col-2">
        <label for="formGroupExampleInput2">Type Pembayaran</label>
        <select class="custom-select" name="type_bayar_angsuran" id="type_bayar_angsuran">
            <option selected>Type</option>
            <option value="cash">Cash</option>
            <option value="debit">Debit</option>
            <option value="kredit">Kredit</option>
        </select>
    </div>
    <div class="form-group col-5">
        <label for="formGroupExampleInput2">Nama Bank</label>
        <input type="text" class="form-control" id="nama_bank_angsuran" name="nama_bank_angsuran" placeholder="Akan readonly otomatis bila type CASH">
    </div>
    <div class="form-group col-5">
        <label for="formGroupExampleInput2">Nomor Bank</label>
        <input type="text" class="form-control" id="nomor_bank_angsuran" name="nomor_bank_angsuran" placeholder="Akan readonly otomatis bila type CASH"">
    </div>
    <button type=" submit" class="btn btn-success col-md-12">Simpan</button>
</form>