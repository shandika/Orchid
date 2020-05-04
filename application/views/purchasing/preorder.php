<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Purchasing request</strong>
                    </div>
                    <div class="card-body">
                        <table id="tabelgl" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama barang</th>
                                    <th>Harga barang</th>
                                    <th>jumlah barang</th>
                                    <th>Nama supplier</th>
                                    <th>jenis pembayaran</th>
                                    <th>lama pembayaran</th>
                                    <th>waktu tunggu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query->result() as $baris) :
                                    $nama_barang                  = $baris->nama_barang;
                                    $harga_barang                 = $baris->harga_barang;
                                    $jumlah            = $baris->jumlah;
                                    $nama_supplier                  = $baris->nama_supplier;
                                    $jenis_pembayaran               = $baris->jenis_pembayaran;
                                    $lama_pembayaran        = $baris->lama_cicilan;
                                    $waktu_tunggu               = $baris->waktu_tunggu;

                                ?>

                                    <tr>
                                        <td><?php echo $nama_barang; ?></td>
                                        <td><?php echo $harga_barang; ?></td>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $nama_supplier; ?></td>
                                        <td><?php echo $jenis_pembayaran; ?></td>
                                        <td><?php echo $lama_pembayaran; ?></td>
                                        <td><?php echo $waktu_tunggu; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" id="accept_pr" name="accept_pr"><i class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-danger" id="decline_pr" name="decline_pr"><i class="fa fa-times"></i></button>
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