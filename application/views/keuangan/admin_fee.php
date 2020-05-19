<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Marketing Fee</strong>
                    </div>
                    <div class="card-body">
                        <table id="tabelbayarpo" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="font-size: 13px">Status</th>
                                    <th style="font-size: 13px">Nama Marketing</th>
                                    <th style="font-size: 13px">Tanggal Akad</th>
                                    <th style="font-size: 13px">Type</th>
                                    <th style="font-size: 13px">Kavling</th>
                                    <th style="font-size: 13px">Harga Acuan</th>
                                    <th style="font-size: 13px">DP 30%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query->result() as $baris) :
                                    $nama_barang                  = $baris->status_marketing_fee;
                                    $harga_barang                 = $baris->nama;
                                    $jumlah             = $baris->tanggal_akad;
                                    $nama_supplier                  = $baris->type;
                                    $jenis_pembayaran               = $baris->nomor;
                                    $lama_pembayaran        = $baris->total_harga;
                                    $dp        = $baris->DP;
                                ?>

                                    <tr>
                                        <td><?php echo $nama_barang; ?></td>
                                        <td><?php echo $harga_barang; ?></td>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $nama_supplier; ?></td>
                                        <td><?php echo $jenis_pembayaran; ?></td>
                                        <td><?php echo $lama_pembayaran; ?></td>
                                        <td><?php echo $dp; ?></td>


                                        <td>
                                            <form action="<?= base_url() ?>" method="POST">
                                                <input type="hidden" name="ID_po" value="<?= $baris->ID_unit_dipesan; ?>">
                                                <button class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>

<!-- Modal -->
<div class="modal fade" id="buktiModal" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buktiModalLabel">Konfirmasi Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Keuangan/updatePO') ?>" class="mx-4" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="idPO" id="idPO" value="">
                    <div class="form-group">
                        <label for="bukti_bayar">Upload foto bukti pembayaran :</label>
                        <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" rows="2" required=""></input>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>