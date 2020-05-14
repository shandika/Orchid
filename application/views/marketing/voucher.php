<form name="form-akad" action="<?= base_url('Marketing/tambahakad') ?>" method="post">
    <div class="form-group ">
        <label for="inputAddress">ID</label>
        <input type="text" class="form-control col-1" id="id_voucher" name="id_voucher" value="<?php echo sprintf("%04s", $idvoucher) ?>" readonly>
    </div>
    <div class="form-group ">
        <label for="inputAddress">ktp Admin</label>
        <input type="text" class="form-control col-1" id="ktp_marketing" name="ktp_marketing" value="<?= $this->session->userdata('ktp'); ?>" readonly>
    </div>
    <div class="form-group col-6">
        <label for="inputAddress">Nama</label>
        <input type="text" class="form-control" id="nama_voucher" name="nama_voucher" placeholder="Nama Voucher">
    </div>
    <div class="form-group col-6">
        <label for="inputAddress">Nominal ( Dalam % )</label>
        <input class="form-control" type="text" placeholder="tuliskan 10, berarti 10%" name="nominal" id="nominal">
    </div>
    <div class="form-group col-6">
        <label for="inputAddress">Berlaku Sampai</label>
        <input type='text' class="form-control" id='datetimepicker1' />
    </div>
    <div class="form-group col-6">
        <label for="inputAddress">Penggunaan maksimal</label>
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control" />
            <h3 class="input-group-addon">Orang</h3>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-lg btn-block">SIMPAN</button>
</form>