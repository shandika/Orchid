<form method="POST" action="<?= base_url('Keuangan/tambahangsuran_injek') ?>">
    <div class="form-group col-6">
        <label for="formGroupExampleInput">Nama</label>
        <input type="text" class="form-control" id="nama_angsuran_injek" name="nama_angsuran_injek" placeholder="Masukan nama">
    </div>
    <div class="form-group col-6">
        <label for="formGroupExampleInput">Nomor KTP</label>
        <input type="text" class="form-control" id="no_ktp_angsuran_injek" name="no_ktp_angsuran_injek" placeholder="Otomatis Terisi" readonly>
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">ID Invoice</label>
        <input type="text" class="form-control" id="id_invoice_injek" name="id_invoice_injek" placeholder="ID Invoice" readonly>
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">ID Angsuran</label>
        <input type="text" class="form-control" id="id_angsuran_injek" name="id_angsuran_injek" placeholder="ID Angsuran" readonly>
    </div>
    <div class="form-group col-3 ">
        <label for="formGroupExampleInput2">Nominal Pembayaran</label>
        <input type="text" class="form-control" id="nominal_pembayaran_injek" name="nominal_pembayaran_injek" placeholder="Nominal" readonly>
    </div>
    <div class="form-group col-3 " style="visibility: hidden">
        <label for="formGroupExampleInput2">Tanggal Pembayaran</label>
        <input type="text" value="<?php echo date('d-m-Y'); ?>" class="form-control" id="tanggal_bayar_injek" name="tanggal_bayar_injek" placeholder="Otomatis Terisi dengan fungsi get date">
    </div>
    <div class="form-group col-2">
        <label for="formGroupExampleInput2">Type Pembayaran</label>
        <select class="custom-select" name="type_bayar_angsuran_injek" id="type_bayar_angsuran_injek">
            <option value="cash" selected>Cash</option>
            <option value="debit">Debit</option>
            <option value="kredit">Kredit</option>
        </select>
    </div>
    <div class="form-group col-5">
        <label for="formGroupExampleInput2">Nama Bank</label>
        <input type="text" class="form-control" id="nama_bank_angsuran_injek" name="nama_bank_angsuran_injek" placeholder="Akan readonly otomatis bila type CASH" readonly>
    </div>
    <div class="form-group col-5">
        <label for="formGroupExampleInput2">Nomor Bank</label>
        <input type="text" class="form-control" id="nomor_bank_angsuran_injek" name="nomor_bank_angsuran_injek" placeholder="Akan readonly otomatis bila type CASH" readonly>
    </div>
    <button type="submit" class="btn btn-success col-md-12">Simpan</button>
</form>