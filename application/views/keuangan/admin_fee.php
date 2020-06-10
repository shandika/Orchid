<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Marketing Fee Belum Dibayar</strong>
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
                                            <button class="btn btn-success tambahFee" data-toggle="modal" data-target="#tambahModal" data-harga="<?= $baris->total_harga; ?>" data-id="<?= $baris->ID_unit_dipesan ?>"><i class="fa fa-plus"></i></button>
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
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Marketing Fee</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Marketing Fee</strong>
                    </div>
                    <div class="card-body">
                        <table id="tabelpelanggan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama Marketing</th>
                                    <th>Tanggal Akad</th>
                                    <th>Type</th>
                                    <th>Kavling</th>
                                    <th>Harga Acuan</th>
                                    <th>DP 30%</th>
                                    <th>Agen</th>
                                    <th>Inhouse</th>
                                    <th>Marketing Fee %</th>
                                    <th>Marketing Fee</th>
                                    <th>Closing Fee</th>
                                    <th>Direktur Fee</th>
                                    <th>Total Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query2->result() as $baris) :
                                    $harga_barang                 = $baris->nama;
                                    $jumlah             = $baris->tanggal_akad;
                                    $nama_supplier                  = $baris->type;
                                    $jenis_pembayaran               = $baris->nomor;
                                    $lama_pembayaran        = number_format($baris->total_harga, 0, ',', '.');
                                    $dp        = number_format($baris->DP, 0, ',', '.');
                                    $dp1        = $baris->agen;
                                    $dp2        = $baris->inhouse;
                                    $dp3       = $baris->persenan . "%";
                                    $dp4        = number_format($baris->nominal_marketing_fee, 0, ',', '.');
                                    $dp5        = number_format($baris->nominal_closing_fee, 0, ',', '.');
                                    $dp6        = number_format($baris->direktur_fee, 0, ',', '.');
                                    $dp7        = number_format($baris->total_fee, 0, ',', '.');

                                ?>
                                    <tr>
                                        <td><?php echo $harga_barang; ?></td>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $nama_supplier; ?></td>
                                        <td><?php echo $jenis_pembayaran; ?></td>
                                        <td><?php echo $lama_pembayaran; ?></td>
                                        <td><?php echo $dp; ?></td>
                                        <td><?php echo $dp1; ?></td>
                                        <td><?php echo $dp2; ?></td>
                                        <td><?php echo $dp3; ?></td>
                                        <td><?php echo $dp4; ?></td>
                                        <td><?php echo $dp5; ?></td>
                                        <td><?php echo $dp6; ?></td>
                                        <td><?php echo $dp7; ?></td>
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

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-10" role="dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Keuangan/tambahMF'); ?>" class="mx-6" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class=" form-group">
                                <label for="id">ID Marketing</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?= $id; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="idUnit">ID unit</label>
                                <input type="text" class="form-control" name="idUnit" id="idUnit" readonly>
                                <input type="hidden" class="form-control" name="harga" id="harga" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="agen">Agen</label>
                                <input type="text" class="form-control" name="agen" id="agen" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inhouse">Inhouse</label>
                                <input type="text" class="form-control" name="inhouse" id="inhouse" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="persenan">Persenan</label>
                                <input type="number" step="0.01" class="form-control" name="persenan" id="persenan" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="closingFee">Nominal Closing Fee</label>
                                <input type="number" class="form-control" name="closingFee" id="closingFee" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="direkturFee">Nominal Direkur Fee</label>
                                <input type="number" class="form-control" name="direkturFee" id="direkturFee" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class=" btn btn-primary" name="tambah" value="Simpan"></input>
                </div>
                <!-- </form> -->
                <?= form_close(); ?>
        </div>
    </div>
</div>