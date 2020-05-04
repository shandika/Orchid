<?php
$query = $this->db->query("SELECT ID_dp, ID_invoice_dp, nominal_angsuran_dp, angsuran_dp.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_dp ON customer.no_ktp = angsuran_dp.no_ktp WHERE angsuran_dp.status = 1 AND angsuran_dp.sisa_angsuran='0' ORDER BY angsuran_dp.ID_dp DESC LIMIT 1");
$jum_pesan = $query->num_rows();
?>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>assets/images/logo5.png" alt=""></a>
            <a class="navbar-brand hidden" href="#"><img src="<?php echo base_url() ?>assets/images/logo4.png" alt="S"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if ($this->session->userdata('level') == 1) { ?>
                    <li class="">
                        <a href="index.html"> <i class="menu-icon fa fa-id-badge"></i>Preorder Barang</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 1) { ?>
                    <li class="">
                        <a href="<?= base_url('Purchasing') ?>"> <i class="menu-icon fa fa-id-badge"></i>Beauty Contest</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 2) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Home/pm'); ?>"> <i class="menu-icon fa fa-tags"></i>Poject</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 2) { ?>
                    <li class="">
                        <a href="<?php echo base_url('pm/pr'); ?>"> <i class="menu-icon fa fa-money"></i>Purchasing Request </a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 3) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Marketing'); ?>"> <i class="menu-icon fa fa-id-badge"></i>DATA PEMBELI</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 3) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Marketing/akad'); ?>"> <i class="menu-icon fa fa-id-badge"></i>AKAD</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 3) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Marketing/upload'); ?>"> <i class="menu-icon fa fa-id-badge"></i>LAPORAN</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Keuangan/journal'); ?>"> <i class="menu-icon fa fa-id-badge"></i>Journal</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href=" <?php echo base_url('Keuangan/index'); ?>"> <i class="menu-icon fa fa-id-badge"></i>General Ledger</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href=" <?php echo base_url('Keuangan/angsuran'); ?>"> <i class="menu-icon fa fa-id-badge"></i>Bayar Angsuran</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Keuangan/addendum'); ?>"> <i class="menu-icon fa fa-id-badge"></i>Addendum</a>
                    </li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse --><br><br><br><br><br><br><br>
        <?php if ($this->session->userdata('level') == 2) { ?>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        <?php
                        if ($jum_pesan > 0) {
                            echo "Pemberitahuan";
                        } else {
                            echo "Tidak Ada Pemberitahuan</p>";
                        }
                        ?>
                        <small><span class="badge badge-success float-right mt-1">Notif</span></small></strong>
                </div>
                <?php
                $inbox = $this->db->query("SELECT ID_dp, ID_invoice_dp, nominal_angsuran_dp, angsuran_dp.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_dp ON customer.no_ktp = angsuran_dp.no_ktp WHERE angsuran_dp.status = 1 AND angsuran_dp.sisa_angsuran='0' ORDER BY angsuran_dp.ID_dp DESC LIMIT 1");
                foreach ($inbox->result_array() as $in) :
                    $nama = $in['nama'];

                ?>
                    <div class="card-body">
                        <p class="card-text">Unit Atas Nama <?php echo $nama ?> Siap Dibangun</p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php } ?>
    </nav>
</aside><!-- /#left-panel -->