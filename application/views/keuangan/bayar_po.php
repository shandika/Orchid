<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Pembayaran Pre-Order (PO)</strong>
                    </div>
                    <div class="card-body">
                        <table id="tabelgl" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total Harga</th>
                                    <th>Nama Supplier</th>
                                    <th>Jenis Bayar</th>
                                    <th>Lama Cicilan</th>
                                    <th>Waktu Tunggu</th>
                                    <th>Tanggal PO</th>
                                    <th>ID_purchasing</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query->result() as $baris) :
                                    $nama_barang                  = $baris->nama_barang;
                                    $harga_barang                 = $baris->harga_barang;
                                    $jumlah             = $baris->jumlah;
                                    $total = $baris->total_harga;
                                    $nama_supplier                  = $baris->nama_supplier;
                                    $jenis_pembayaran               = $baris->jenis_pembayaran;
                                    $lama_pembayaran        = $baris->lama_cicilan;
                                    $waktu_tunggu               = $baris->waktu_tunggu;
                                    $id_purchasing = $baris->ID_purchasing;
                                    $tanggal_approve = $baris->tanggal_approve;

                                ?>

                                    <tr>
                                        <td><?php echo $nama_barang; ?></td>
                                        <td><?php echo $harga_barang; ?></td>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $nama_supplier; ?></td>
                                        <td><?php echo $jenis_pembayaran; ?></td>
                                        <td><?php echo $lama_pembayaran; ?></td>
                                        <td><?php echo $waktu_tunggu; ?></td>
                                        <td><?php echo $tanggal_approve; ?></td>
                                        <td><?php echo $id_purchasing; ?></td>

                                        <td>
                                            <button data-toggle="modal" data-target="#buktiModal" data-id="<?= $baris->ID_po ?>" class="buktiBayar btn btn-success"><i class="fa fa-check"></i></button>
                                        </td>
                                        <!-- <td>
                                            <form action="<?= base_url() ?>" method="POST">
                                                <input type="hidden" name="ID_po" value="<?= $baris->ID_po; ?>">
                                                <button onclick="return confirm ('Anda yakin ingin hapus data ini ?')" class="btn btn-info"><i class="fa fa-cloud-upload"></i></button>
                                            </form>
                                        </td> -->
                                        <td>
                                            <form action="<?= base_url() ?>" method="POST">
                                                <input type="hidden" name="ID_po" value="<?= $baris->ID_po; ?>">
                                                <button onclick="return confirm ('Anda yakin ingin hapus data ini ?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
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