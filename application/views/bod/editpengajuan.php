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
                                                <a title="Lihat Detail Dokumen" href="<?php echo base_url() . 'Keuangan/editpengajuan/' . $ktp; ?>" class="btn btn-primary btn-xs">Lihat </a>
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
        $inbulanan            = intval($baris->income_bulanan);
        $inblnpasangan        = intval($baris->income_bulanan_pasangan);
        $norek                = $baris->no_rekening;
        $namakontakdarurat    = $baris->nama_kontak_darurat;
        $alamatkontakdarurat  = $baris->alamat_kontak_darurat;
        $nomorkontakdarurat   = $baris->nomor_kontak_darurat;
        $email = $baris->email;
        $totpeng = intval($baris->total_pengeluaran);
        $saldo = 'Rp. ' . number_format($baris->rata_rata_saldo_akhir_bulanan, 0, ',', '.');
        $cashin = 'Rp. ' . number_format($baris->rata_rata_cashin_bulanan, 0, ',', '.');
        $hasil1 = $baris->hasil_1;
        $hasil2 = $baris->hasil_2;
    ?>
    <?php endforeach; ?>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Verifikasi Board Of Director</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Bod/update_status') ?>" method="POST">
                                <div class="form-row">
                                    <!-- Awal Baris-->
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">KTP</label>
                                        <input type="text" class="form-control" id="ktp_pengajuan" placeholder="" name="ktp_pengajuan" value="<?= $ktp ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Rata-Rata Saldo Akhir Bulanan</label>
                                        <input type="text" class="form-control" id="rata_rata_saldo" placeholder="" name="rata_rata_saldo" value="<?= $saldo ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">Rata-Rata Cashin Bulanan</label>
                                        <input type="text" class="form-control" id="rata_rata_cashin" placeholder="" name="rata_rata_cashin" value="<?= $cashin ?>" readonly>
                                    </div>
                                </div> <!-- Akhir baris -->
                                <div class="form-row">
                                    <!-- Awal Baris-->
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Nilai Kuisioner 1</label>
                                        <input type="text" class="form-control" id="kuis2" placeholder="" name="kuis2" value="<?= $kuis1 ?> / <?= $hasil1 ?> " readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Nilai Kuisioner 2</label>
                                        <input type="text" class="form-control" id="kuis1" placeholder="" name="kuis1" value="<?= $kuis2 ?> / <?= $hasil2 ?> " readonly>
                                    </div>
                                </div> <!-- Akhir baris -->
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">B.O.D Notes:</label>
                                        <textarea class="form-control" rows="3" id="bod_note" name="bod_note"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <button class="btn btn-success btn-block" type="submit">Approve</button>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button class="btn btn-danger btn-block" type="submit">Reject</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>