<div class="container">
    <br />
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
                                        <th>Approve Keuangan</th>
                                        <th>Approve BOD</th>
                                        <th>Nilai 1</th>
                                        <th>Nilai 2</th>
                                        <th>Aksi</th>
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
                                        <th>Total Pengeluaran</th>
                                        <th>No Rekening</th>
                                        <th>Email</th>
                                        <th>Pekerjaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($query->result() as $baris) :
                                        $ktp                  = $baris->no_ktp;
                                        $nama                 = $baris->nama;
                                        $pekerjaan            = $baris->pekerjaan_sesuai_ktp;
                                        $status_keuangan   = $baris->acc_keuangan;
                                        $status_bod   = $baris->acc_bod;
                                        $kuis1   = $baris->nilai_verifikasi_1;
                                        $kuis2   = $baris->nilai_verifikasi_2;
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
                                        $inbulanan            = number_format($baris->income_bulanan, 0, ',', '.');
                                        $inblnpasangan        = number_format($baris->income_bulanan_pasangan, 0, ',', '.');
                                        $norek                = $baris->no_rekening;
                                        $namakontakdarurat    = $baris->nama_kontak_darurat;
                                        $alamatkontakdarurat  = $baris->alamat_kontak_darurat;
                                        $nomorkontakdarurat   = $baris->nomor_kontak_darurat;
                                        $email = $baris->email;
                                        $totpeng = number_format($baris->total_pengeluaran, 0, ',', '.');

                                    ?>

                                        <tr>
                                            <td><?php echo $ktp; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $status_keuangan; ?></td>
                                            <td><?php echo $status_bod; ?></td>
                                            <td><?php echo $kuis1; ?></td>
                                            <td><?php echo $kuis2; ?></td>
                                            <td>
                                                <a title="Lihat Detail Dokumen" href="<?php echo base_url() . 'Marketing/editdata/' . $ktp; ?>" class="btn btn-primary btn-xs">Lihat </a>
                                            </td>
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
                                            <td><?php echo 'Rp. ' . $inbulanan; ?></td>
                                            <td><?php echo 'Rp. ' . $inblnpasangan; ?></td>
                                            <td><?php echo 'Rp. ' . $totpeng; ?></td>
                                            <td><?php echo $norek; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $pekerjaan; ?></td>
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
    <?php foreach ($datacust1->result() as $baris) :
        $ktp                  = $baris->no_ktp;
        $nama                 = $baris->nama;
        $pekerjaan            = $baris->pekerjaan_sesuai_ktp;
        $status_keuangan   = $baris->acc_keuangan;
        $status_bod   = $baris->acc_bod;
        $kuis1   = $baris->nilai_verifikasi_1;
        $kuis2   = $baris->nilai_verifikasi_2;
        $ttl                  = $baris->tempat_tanggal_lahir;
        $status               = $baris->status;
        $jmltanggungan        = $baris->jumlah_tanggungan;
        $alamat               = $baris->alamat;
        $notlp                = $baris->no_telepon;
        $stsrumah             = $baris->status_rumah;
        $lmmenetap            = $baris->lama_menetap;
        $pekerjaan1            = $baris->pekerjaan;
        $lmbekerja            = $baris->lama_bekerja;
        $nmtpbekerja          = $baris->nama_tempat_bekerja;
        $altpbekerja          = $baris->alamat_tempat_bekerja;
        $inbulanan            = 'Rp. ' . number_format($baris->income_bulanan, 0, ',', '.');
        $inblnpasangan        = 'Rp. ' . number_format($baris->income_bulanan_pasangan, 0, ',', '.');
        $norek                = $baris->no_rekening;
        $namakontakdarurat    = $baris->nama_kontak_darurat;
        $alamatkontakdarurat  = $baris->alamat_kontak_darurat;
        $nomorkontakdarurat   = $baris->nomor_kontak_darurat;
        $email = $baris->email;
        $totpeng                = 'Rp. ' . number_format($baris->total_pengeluaran, 0, ',', '.');
    ?>
    <?php endforeach; ?>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Update Data Diri</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Marketing/updateDataCustomer') ?>" method="POST">
                                <div class="form-row">
                                    <!-- Awal Baris-->
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">KTP</label>
                                        <input type="text" class="form-control" id="ktp" placeholder="" name="ktp" value="<?= $ktp ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nama</label>
                                        <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= $nama ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Pekerjaan Sesuai KTP</label>
                                        <input type="text" class="form-control" id="psk" placeholder="" name="psk" value="<?= $pekerjaan ?>">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Tempat, Tanggal lahir</label>
                                        <input type="text" class="form-control" id="ttl" placeholder="Bandung, 25 oktober 1997" name="ttl" value="<?= $ttl ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Status</label>
                                        <input type="text" class="form-control" id="status" placeholder="Bandung, 25 oktober 1997" name="status" value="<?= $status ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Jumlah Tanggungan</label>
                                        <input type="number" class="form-control" id="tanggungan" placeholder="2" name="tanggungan" value="<?= $jmltanggungan ?>">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Alamat Rumah Lengkap</label>
                                        <textarea class="form-control" id="alamat" placeholder="" name="alamat" value="" rows="3"><?= $alamat ?></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="notelp" placeholder="" name="notelp" value="<?= $notlp ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="" name="email" value="<?= $email ?>">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Status Rumah</label>
                                        <input type="text" class="form-control" id="statusrumah" placeholder="" name="statusrumah" value="<?= $status ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">Lama Menetap</label>
                                        <input type="text" class="form-control" id="lama_menetap" placeholder="" name="lama_menetap" value="<?= $lmmenetap ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" placeholder="" name="pekerjaan" value="<?= $pekerjaan1 ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">Lama Bekerja</label>
                                        <input type="text" class="form-control" id="lama_bekerja" placeholder="" name="lama_bekerja" value="<?= $lmbekerja ?>">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nama Tempat Bekerja</label>
                                        <input type="text" class="form-control" id="namatemker" placeholder="" name="namatemker" value="<?= $nmtpbekerja ?>">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputAddress">Alamat Tempat Kerja</label>
                                        <textarea type="text" class="form-control" id="alamattemker" placeholder="" name="alamattemker" value="" rows="3"><?= $altpbekerja ?></textarea>
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Income / bulan</label>
                                        <input type="text" class="form-control" id="incomebulannya" placeholder="" name="incomebulannya" value="<?= $inbulanan ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Income Pasangan / bulan</label>
                                        <input type="text" class="form-control" id="incomepasangannya" placeholder="" name="incomepasangannya" value="<?= $inblnpasangan ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Total pengeluaran</label>
                                        <input type="text" class="form-control" id="totalpengeluaran" placeholder="" name="totalpengeluaran" value="<?= $totpeng ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">No.Rekening Bank</label>
                                        <input type="text" class="form-control" id="norek" placeholder="" name="norek" value="<?= $norek ?>">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nama Kontak Darurat</label>
                                        <input type="text" class="form-control" id="namakondar" placeholder="" name="namakondar" value="<?= $namakontakdarurat ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Alamat Kontak Darurat</label>
                                        <textarea type="text" class="form-control" id="alamatkondar" placeholder="" name="alamatkondar" value="" rows="3"><?= $alamatkontakdarurat ?></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nomor Telepon Kontak Darurat</label>
                                        <input type="text" class="form-control" id="teleponkondar" placeholder="" name="teleponkondar" value="<?= $nomorkontakdarurat ?>">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <button class="btn btn-success btn-block" type="submit">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <?php foreach ($gambar->result() as $baris) :
        $fcktp                  = $baris->fc_ktp;
        $fckk = $baris->fc_kk;
        $sg = $baris->slip_gaji;
        $lku = $baris->laporan_keuangan_usaha;
        $lr = $baris->laporan_rekening;
        $spsi = $baris->surat_persetujuan_suami_istri;
        $sppk = $baris->surat_persetujuan_pembayaran_kredit;
        $sr = $baris->surat_rekomendasi;
        $spab = $baris->surat_perjanjian_agunan_barang;
        $sppp = $baris->surat_perjanjian_penjaminan_personal;
        $sgpp = $baris->slip_gaji_penjamin_personal;
    ?>
    <?php endforeach; ?>
    <div class="container">
        <br />
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Update Data Dokumen Pelengkap</strong>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('Marketing/updatedokumen') ?>" enctype="multipart/form-data">
                                    <div class="form-group col-md-4 d-none">
                                        <label for="inputAddress">KTP</label>
                                        <input type="text" class="form-control" id="noktp" placeholder="" name="noktp" value="<?= $ktp ?>">
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Fotocopy KTP</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $fcktp; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $fcktp; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Foto Copy KK:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $fckk; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $fckk; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Slip Gaji:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $sg; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $sg; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Laporan Keuangan Usaha:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $lku; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $lku; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Laporan Rekening:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $lr; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $lr; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Surat Persetujaun Suami Istri:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $spsi; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $spsi; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Surat Persetujaun Pembayaran Kredit:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $sppk; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $sppk; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Surat Rekomendasi:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $sr; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $sr; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Surat Perjanjian Agunan Barang:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $spab; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $spab; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Surat Perjanjian Penjaminan Personal:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $sppp; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $sppp; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Slip Gaji Penjamin Personal:</label>
                                            <br>
                                            <div class="test-popup-link" href="<?= base_url('assets/images/dokumen_pelengkap/') . $sgpp; ?>">
                                                <img width="120px" height="120px" src="<?= base_url('assets/images/dokumen_pelengkap/') . $sgpp; ?>" alt="KOSONG" class="img-thumbnail ">
                                            </div>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                                <label class="custom-file-label" for="foto"></label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" style="text-align: center;">Klik tombol untuk update Dokumen</label>
                                        <div class="custom-file mb-3">
                                            <button class="btn btn-primary form-control" type="submit">Update Dokumen</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="container">
        <br />
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tabel Angsuran Lain Customer</strong>
                            </div>
                            <div class="card-body">
                                <table id="tabelpelanggan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nama Angsuran</th>
                                            <th>Ke</th>
                                            <th>Jumlah Angsuran</th>
                                            <th>Nominal Angsuran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($query1->result() as $baris2) :
                                            $nama = $baris2->nama;
                                            $namaangsuran                  = $baris2->nama_angsuran;
                                            $ke                 = $baris2->angsuranke;
                                            $jumlah            = $baris2->jumlah;
                                            $nominal   = number_format($baris2->nominal_angsuran_lain, 0, ',', '.');

                                        ?>

                                            <tr>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $namaangsuran; ?></td>
                                                <td><?php echo $ke; ?></td>
                                                <td><?php echo $jumlah; ?></td>
                                                <td><?php echo 'Rp. ' . $nominal; ?></td>
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
        <div class="container">
            <br />
            <?php foreach ($dataajuan->result() as $baris) :
                $tanggal_ajuan                  = $baris->tanggal_akad;
                $project_ajuan                  = $baris->nama;
                $kavling                        = $baris->nomor;
                $dp_ajuan                       = 'Rp. ' . number_format($baris->DP, 0, ',', '.');
                $lama_dp_ajuan                  = $baris->lama_angsuran_dp;
                $nominal_dp_ajuan               = 'Rp. ' . number_format($baris->angsuran_bulanan_dp, 0, ',', '.');
                $injek_ajuan                    = 'Rp. ' . number_format($baris->injeksi, 0, ',', '.');
                $lama_injek                     = $baris->lama_injeksi;
                $total_injek                    = 'Rp. ' . number_format($baris->total_injeksi, 0, ',', '.');
                $harga_ajuan                    = 'Rp. ' . number_format($baris->total_harga, 0, ',', '.');
                $lama_angsuran_ajuan            = $baris->lama_angsuran;
                $angsuran_bulanan               = 'Rp. ' . number_format($baris->angsuran_bulanan, 0, ',', '.');
                $marketing                      = $baris->ktp_marketing;
                $id_unit_dipesan                = $baris->ID_unit_dipesan;
            ?>
            <?php endforeach; ?>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Data Pengajuan Unit</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Awal Baris-->
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Tanggal Pengajuan</label>
                                            <input type="text" class="form-control" id="tanggal_ajuan" placeholder="2" name="tanggal_ajuan" value="<?= $tanggal_ajuan ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Project</label>
                                            <input type="text" class="form-control" id="project_ajuan" placeholder="" name="project_ajuan" value="<?= $project_ajuan ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Kavling</label>
                                            <input type="text" class="form-control" id="kavling_ajuan" placeholder="" name="kavling_ajuan" value="<?= $kavling ?>">
                                        </div>
                                    </div> <!-- Akhir baris -->
                                    <!-- Awal Baris-->
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">DP</label>
                                            <input type="text" class="form-control" id="dp_ajuan" placeholder="2" name="dp_ajuan" value="<?= $dp_ajuan ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Lama Cicilan DP</label>
                                            <input type="text" class="form-control" id="lama_cicil_dp_ajuan" placeholder="" name="lama_cicil_dp_ajuan" value="<?= $lama_dp_ajuan ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Nominal Angsuran DP per-bulan</label>
                                            <input type="text" class="form-control" id="angsuran_dp_ajuan" placeholder="" name="angsuran_dp_ajuan" value="<?= $nominal_dp_ajuan ?>">
                                        </div>
                                    </div> <!-- Akhir baris -->
                                    <!-- Awal Baris-->
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Injeksi</label>
                                            <input type="text" class="form-control" id="injeksi" placeholder="2" name="injeksi" value="<?= $injek_ajuan ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Lama injek</label>
                                            <input type="text" class="form-control" id="lama_injeksi" placeholder="" name="lama_injeksi" value="<?= $lama_injek ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Total injeksi</label>
                                            <input type="text" class="form-control" id="total_injeksi" placeholder="" name="total_injeksi" value="<?= $total_injek ?>">
                                        </div>
                                    </div> <!-- Akhir baris -->
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Harga Pokok</label>
                                            <input type="text" class="form-control" id="harga_ajuan" placeholder="2" name="harga_ajuan" value="<?= $harga_ajuan ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Lama cicilan</label>
                                            <input type="text" class="form-control" id="lama_cicilan_ajuan" placeholder="" name="lama_cicilan_ajuan" value="<?= $lama_angsuran_ajuan ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Angsuran per-bulan</label>
                                            <input type="text" class="form-control" id="angsuran_bulanan_ajuan" placeholder="" name="angsuran_bulanan_ajuan" value="<?= $angsuran_bulanan ?>">
                                        </div>
                                    </div> <!-- Akhir baris -->
                                    <!-- Awal Baris-->
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Marketing</label>
                                            <input type="text" class="form-control" id="marketing_approver" placeholder="2" name="marketing_approver" value="<?= $marketing ?>">
                                        </div>
                                        <div class="form-group col-md-4 d-none">
                                            <label for="inputAddress">ID unit dipesan</label>
                                            <input type="text" class="form-control" id="id_unit_dipesan" placeholder="2" name="id_unit_dipesan" value="<?= $id_unit_dipesan ?>">
                                        </div>
                                    </div> <!-- Akhir baris -->
                                    <!-- Awal Baris-->
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">APPROVE</button>
                                        </div>
                                    </div> <!-- Akhir baris -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
        </div>