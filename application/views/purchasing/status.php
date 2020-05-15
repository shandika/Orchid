    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Pelanggan</strong>
                        </div>
                        <div class="card-body">
                            <table id="tabelgl" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th>Status Keuangan</th>
                                            <th>Nama barang</th>
                                            <th>Harga barang</th>
                                            <th>jumlah barang</th>
                                            <th>Nama supplier</th>
                                            <th>jenis pembayaran</th>
                                            <th>lama pembayaran</th>
                                            <th>waktu tunggu</th>
                                            <th>Bukti Bayar</th>
                                            <th>Status Barang</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                    foreach ($query->result() as $baris) :
                                        $statut = $baris->dibayar;
                                        $bukti = $baris->bukti_bayar;
                                        $keuangan = $baris->status_barang;
                                        $nama_barang                  = $baris->nama_barang;
                                        $harga_barang                 = $baris->harga_barang;
                                        $jumlah            = $baris->jumlah;
                                        $nama_supplier                  = $baris->nama_supplier;
                                        $jenis_pembayaran               = $baris->jenis_pembayaran;
                                        $lama_pembayaran        = $baris->lama_cicilan;
                                        $waktu_tunggu               = $baris->waktu_tunggu;

                                    ?>

                                        <tr>
                                            <td><?php echo $statut; ?></td>
                                            <td><?php echo $nama_barang; ?></td>
                                            <td><?php echo $harga_barang; ?></td>
                                            <td><?php echo $jumlah; ?></td>
                                            <td><?php echo $nama_supplier; ?></td>
                                            <td><?php echo $jenis_pembayaran; ?></td>
                                            <td><?php echo $lama_pembayaran; ?></td>
                                            <td><?php echo $waktu_tunggu; ?></td>
                                            <td class="test-popup-link" href="<?= base_url('assets/images/bukti_pembayaran/') . $bukti; ?>" valign="middle" align="center">
                                                <img src="<?= base_url('assets/images/bukti_pembayaran/') . $bukti; ?>" height="60" alt="BELUM DIBAYAR">
                                            </td>
                                            <td><?php echo $keuangan; ?></td>
                                            <!-- <td>
                                                <form action="<?= base_url('Purchasing/terima_barang') ?>" method="POST">
                                                    <input type="hidden" name="ID_po" value="<?= $baris->ID_po; ?>">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-get-pocket"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="<?= base_url('Purchasing/return_barang') ?>" method="POST">
                                                    <input type="hidden" name="ID_po" value="<?= $baris->ID_po; ?>">
                                                    <button onclick="return confirm ('Anda yakin ingin hapus data ini ?')" class="btn btn-danger"><i class="fa fa-undo"></i></button>
                                                </form>
                                            </td> -->
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