<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <br />
    <form action="<?php echo base_url('Marketing/simpanDataPelanggan'); ?>" id="myForm" role="form" data-toggle="validator" method="post" enctype="multipart/form-data">

        <!-- SmartWizard html -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Step 1<br /><small>Data Diri</small></a></li>
                <li><a href="#step-2">Step 2<br /><small>Dokumen Pendukung</small></a></li>
                <li><a href="#step-3">Step 3<br /><small>Angsuran Lain</small></a></li>
            </ul>

            <div>
                <div id="step-1">
                    <br>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="noktp">No KTP:</label>
                            <input type="number" class="form-control" name="noktp" id="noktp" placeholder="Masukan No KTP" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap Sesuai KTP" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan:</label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukan Pekerjaan" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="ttl">Tempat Tanggal Lahir:</label>
                            <input type="text" class="form-control" name="ttl" id="ttl" placeholder="Masukan Tempat Tanggal Lahir" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" name="status" id="status" placeholder="Masukan Status" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="jmltunggangan">Jumlah Tanggungan:</label>
                            <input type="number" class="form-control" name="jmltanggungan" id="jmltanggusngan" placeholder="Masukan Jumlah Tunggangan" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat" required=""></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="notlp">No Telepon:</label>
                            <input type="text" class="form-control" name="notlp" id="notlp" placeholder="Masukan No Telepon" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="stsrumah">Status Rumah:</label>
                            <input type="text" class="form-control" name="stsrumah" id="stsrumah" placeholder="Masukan Status Rumah" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="lmmenetap">Lama Menetap:</label>
                            <input type="number" class="form-control" name="lmmenetap" id="lmmenetap" placeholder="Masukan Lama Menetap" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan:</label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukan Pekerjaan" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="lmbekerja">Lama Bekerja:</label>
                            <input type="number" class="form-control" name="lmbekerja" id="lmbekerja" placeholder="Masukan Lama Bekerja" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="nmtpbekerja">Nama Tempat Bekerja:</label>
                            <input type="text" class="form-control" name="nmtpbekerja" id="nmtpbekerja" placeholder="Masukan Nama Tempat Bekerja" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="altpbekerja">Alamat Tempat Bekerja:</label>
                            <textarea class="form-control" name="altpbekerja" id="altpbekerja" placeholder="Masukan Alamat Tempat Bekerja" required=""></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="inbulanan">Income Bulanan:</label>
                            <input type="number" class="form-control" name="inbulanan" id="inbulanan" placeholder="Masukan Jumlah Income Bulanan" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="inblnpasangan">Income Bulanan Pasangan:</label>
                            <input type="number" class="form-control" name="inblnpasangan" id="inblnpasangan" placeholder="Masukan Jumlah Income Bulanan Pasangan" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="norek">No Rekening:</label>
                            <input type="text" class="form-control" name="norek" id="norek" placeholder="Masukan No Rekening" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="nmktdarurat">Nama Kontak Darurat:</label>
                            <input type="text" class="form-control" name="nmktdarurat" id="nmktdarurat" placeholder="Masukan Nama Kontak Darurat" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="alktdarurat">Alamat Kontak Darurat:</label>
                            <textarea class="form-control" name="alktdarurat" id="alktdarurat" placeholder="Masukan Alamat Kontak Darurat" required=""></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="noktdarurat">No Kontak Darurat:</label>
                            <input type="text" class="form-control" name="noktdarurat" id="noktdarurat" placeholder="Masukan No Kontak Darurat" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div id="step-2">
                    <h2>Dokumen Pelengkap</h2>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Foto Copy KTP:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Foto Copy KK:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Slip Gaji:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Laporan Keuangan Usaha:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Laporan Rekening:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Surat Persetujaun Suami Istri:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Surat Persetujaun Pembayaran Kredit:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Surat Rekomendasi:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Surat Perjanjian Agunan Barang:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Surat Perjanjian Penjaminan Personal:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Slip Gaji Penjamin Personal:</label>
                            <input class="form-control" type="file" name="userfile[]" multiple="multiple" class="form-control" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div id="step-3">
                    <h2>Angsuran Lain</h2>
                    <!-- Buat tombol untuk menabah form data -->
                    <button type="button" class="btn btn-success" id="btn-tambah-form">Tambah Data Angsuran</button>
                    <button type="button" class="btn btn-warning" id="btn-reset-form">Reset Form</button><br><br>
                    <b>Data ke 1 :</b>
                    <div id="form-step-2" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="nama_angsuran">Nama Angsuran</label>
                            <input type="text" class="form-control" name="nama_angsuran[]" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-2" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="angsuranke">Angsuran Ke-</label>
                            <input type="number" class="form-control" name="angsuranke[]" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="form-step-2" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="nominal_angsuran_lain">Nominal Angsuran Lain</label>
                            <input type="text" class="form-control" name="nominal_angsuran_lain[]" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <br>

                    <div id="insert-form"></div>
                    <input type="hidden" id="jumlah-form" value="1">
                </div>
            </div>
        </div>

    </form>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Pelanggan</strong>
                        </div>
                        <div class="card-body">
                            <table id="tabelpelanggan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No KTP</th>
                                        <th>Nama</th>
                                        <th>Pekerjaan</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Status</th>
                                        <th>Jumlah Tanggunan</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Status Rumah</th>
                                        <th>Lama Menetap</th>
                                        <th>Pekerjaan</th>
                                        <th>Lama Bekerja</th>
                                        <th>Nama Tempat Bekerja</th>
                                        <th>Alamat Tempat Bekerja</th>
                                        <th>Income Bulanan</th>
                                        <th>Income Bulanan Pasangan</th>
                                        <th>No Rekening</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($query->result() as $baris) :
                                        $ktp                  = $baris->no_ktp;
                                        $nama                 = $baris->nama;
                                        $pekerjaan            = $baris->pekerjaan_sesuai_ktp;
                                        $ttl                  = $baris->tempat_tanggal_lahir;
                                        $status               = $baris->status;
                                        $jmltanggungan        = $baris->jumlah_tanggungan;
                                        $alamat               = $baris->alamat;
                                        $notlp                = $baris->no_telepon;
                                        $stsrumah             = $baris->status_rumah;
                                        $lmmenetap            = $baris->lama_menetap;
                                        $pekerjaan            = $baris->pekerjaan;
                                        $lmbekerja            = $baris->lama_bekerja;
                                        $nmtpbekerja          = $baris->nama_tempat_bekerja;
                                        $altpbekerja          = $baris->alamat_tempat_bekerja;
                                        $inbulanan            = $baris->income_bulanan;
                                        $inblnpasangan        = $baris->income_bulanan_pasangan;
                                        $norek                = $baris->no_rekening;
                                        $namakontakdarurat    = $baris->nama_kontak_darurat;
                                        $alamatkontakdarurat  = $baris->alamat_kontak_darurat;
                                        $nomorkontakdarurat   = $baris->nomor_kontak_darurat;

                                    ?>

                                        <tr>
                                            <td><?php echo $ktp; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $pekerjaan; ?></td>
                                            <td><?php echo $ttl; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td><?php echo $jmltanggungan; ?></td>
                                            <td><?php echo $alamat; ?></td>
                                            <td><?php echo $notlp; ?></td>
                                            <td><?php echo $stsrumah; ?></td>
                                            <td><?php echo $lmmenetap; ?></td>
                                            <td><?php echo $pekerjaan; ?></td>
                                            <td><?php echo $lmbekerja; ?></td>
                                            <td><?php echo $nmtpbekerja; ?></td>
                                            <td><?php echo $altpbekerja; ?></td>
                                            <td><?php echo $inbulanan; ?></td>
                                            <td><?php echo $inblnpasangan; ?></td>
                                            <td><?php echo $norek; ?></td>
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