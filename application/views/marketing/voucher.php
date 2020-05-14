<form name="form-akad" action="<?= base_url('Marketing/tambahvoucher') ?>" method="post">
    <div class="form-group d-none">
        <label for="inputAddress">ID</label>
        <input type="text" class="form-control col-1" id="id_voucher" name="id_voucher" value="<?php echo sprintf("%04s", $idvoucher) ?>" readonly>
    </div>
    <div class="form-group d-none">
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
        <input type='date' class="form-control" id='expired' name="expired" />
    </div>
    <div class="form-group col-6">
        <label for="inputAddress">Penggunaan maksimal</label>
        <input class="form-control" type="text" name="max_used" id="max_used">
    </div>
    <button type="submit" class="btn btn-success btn-lg btn-block">SIMPAN</button>
</form>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Voucher</strong>
                    </div>
                    <div class="card-body">
                        <table id="tabelpelanggan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID_voucher</th>
                                    <th>Nama Voucher</th>
                                    <th>Nominal Voucher ( % )</th>
                                    <th>Tanggal Expired</th>
                                    <th>Penggunaan maksimal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query2->result() as $baris) :
                                    $id_voucher                  = $baris->ID_voucher;
                                    $nama                 = $baris->nama;
                                    $nominal            = $baris->nominal;
                                    $expired                  = $baris->expired;
                                    $max_used               = $baris->max_used;

                                ?>
                                    <tr>
                                        <td><?php echo $id_voucher; ?></td>
                                        <td><?php echo $nama; ?></td>
                                        <td><?php echo $nominal; ?></td>
                                        <td><?php echo $expired; ?></td>
                                        <td><?php echo $max_used; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

</div>