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
                                        <th>Status Acc Keuangan</th>
                                        <th>Status Acc BOD</th>
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
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Update Data Diri</strong>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-row">
                                    <!-- Awal Baris-->
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">KTP</label>
                                        <input type="text" class="form-control" id="ktp" placeholder="" name="ktp">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nama</label>
                                        <input type="text" class="form-control" id="nama" placeholder="" name="nama">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Pekerjaan Sesuai KTP</label>
                                        <input type="text" class="form-control" id="psk" placeholder="" name="psk">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Tempat, Tanggal lahir</label>
                                        <input type="text" class="form-control" id="ktp" placeholder="Bandung, 25 oktober 1997" name="ktp">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="Lajang">Lajang</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Duda/Janda">Duda/Janda</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Jumlah Tanggungan</label>
                                        <input type="number" class="form-control" id="tanggungan" placeholder="2" name="tanggungan">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Alamat Rumah Lengkap</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="" name="alamat">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="notelp" placeholder="" name="notelp">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Email</label>
                                        <input type="number" class="form-control" id="email" placeholder="" name="email">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Status Rumah</label>
                                        <input type="text" class="form-control" id="statusrumah" placeholder="" name="statusrumah">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">Lama Menetap</label>
                                        <input type="text" class="form-control" id="lama_menetap" placeholder="" name="lama_menetap">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" placeholder="" name="pekerjaan">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">Lama Bekerja</label>
                                        <input type="text" class="form-control" id="lama_bekerja" placeholder="" name="lama_bekerja">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nama Tempat Bekerja</label>
                                        <input type="text" class="form-control" id="namatemker" placeholder="" name="namatemker">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputAddress">Alamat Tempat Kerja</label>
                                        <input type="text" class="form-control" id="alamattemker" placeholder="" name="alamattemker">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Income / bulan</label>
                                        <input type="text" class="form-control" id="incomebulan" placeholder="" name="incomebulan">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Income Pasangan / bulan</label>
                                        <input type="text" class="form-control" id="incomepasangan" placeholder="" name="incomepasangan">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Total pengeluaran</label>
                                        <input type="text" class="form-control" id="totalpengeluaran" placeholder="" name="totalpengeluaran">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">No.Rekening Bank</label>
                                        <input type="text" class="form-control" id="norek" placeholder="" name="norek">
                                    </div>
                                </div> <!-- Akhir baris -->
                                <!-- Awal Baris-->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nama Kontak Darurat</label>
                                        <input type="text" class="form-control" id="namakondar" placeholder="" name="incomebulan">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Alamat Kontak Darurat</label>
                                        <input type="text" class="form-control" id="alamatkondar" placeholder="" name="incomepasangan">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Nomor Telepon Kontak Darurat</label>
                                        <input type="text" class="form-control" id="teleponkondar" placeholder="" name="norek">
                                    </div>
                                </div> <!-- Akhir baris -->
                            </form>
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
                                <strong class="card-title">Update Data Dokumen Pelengkap</strong>
                            </div>
                            <div class="card-body">
                                <div id="form-step-1" role="form" data-toggle="validator" class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Foto Copy KTP:</label>
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
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input form-control" name="userfile[]" multiple="multiple" required="">
                                            <label class="custom-file-label" for="foto"></label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>