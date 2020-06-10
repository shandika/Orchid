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
                                                <a title="Lihat Detail Dokumen" href="<?php echo base_url() . 'Bod/editpengajuan/' . $ktp; ?>" class="btn btn-primary btn-xs">Lihat </a>
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
</div>