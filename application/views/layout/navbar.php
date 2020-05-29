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
                        <a href="<?= base_url('Purchasing') ?>"> <i class="menu-icon fa fa-newspaper-o"></i>Preorder Barang</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 1) { ?>
                    <li class="">
                        <a href="<?= base_url('Purchasing/status') ?>"> <i class="menu-icon fa fa-list-ol"></i>Status Preorder Barang</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 2) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Home/pm'); ?>"> <i class="menu-icon fa fa-home"></i>Project</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 2) { ?>
                    <li class="">
                        <a href="<?php echo base_url('pm/pr'); ?>"> <i class="menu-icon fa fa-credit-card"></i>Purchasing Request </a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 2) { ?>
                    <li class="">
                        <a href="<?php echo base_url('pm/terima_barang'); ?>"> <i class="menu-icon fa fa-archive"></i>Status barang</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 3) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Marketing'); ?>"> <i class="menu-icon fa fa-user-plus"></i>Data Pembeli</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 3) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Marketing/akad'); ?>"> <i class="menu-icon fa fa-handshake-o"></i>Akad</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 3) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Marketing/voucher'); ?>"> <i class="menu-icon fa fa-ticket"></i>Voucher</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Keuangan/journal'); ?>"> <i class="menu-icon fa fa-pencil"></i>Journal</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href=" <?php echo base_url('Keuangan/index'); ?>"> <i class="menu-icon fa fa-book"></i>General Ledger</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href=" <?php echo base_url('Keuangan/angsuran'); ?>"> <i class="menu-icon fa fa-shopping-cart"></i>Bayar Angsuran</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Keuangan/addendum'); ?>"> <i class="menu-icon fa fa-calendar-plus-o"></i>Addendum</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Keuangan/bayar_po'); ?>"> <i class="menu-icon fa fa-shopping-cart"></i>Bayar PO</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="">
                        <a href="<?php echo base_url('Keuangan/admin_fee'); ?>"> <i class="menu-icon fa fa-money"></i>Marketing Fee</a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text"></i>Laporan Keuangan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-money"></i><a href="<?php echo base_url('Keuangan/laporan_laba_rugi'); ?>">Laba & Rugi</a></li>
                            <li><i class="menu-icon fa fa-balance-scale"></i><a href="<?php echo base_url('Keuangan/laporan_neraca'); ?>">Neraca</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="<?php echo base_url('Keuangan/laporan_pasiva'); ?>">Pasiva</a></li>
                            <li><i class="menu-icon fa fa-bar-chart"></i><a href="<?php echo base_url('Keuangan/laporan_cashflow'); ?>">Cash Flow</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse --><br><br><br>
        <?php if ($this->session->userdata('level') == 2) { ?>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        <small><span class="badge badge-success float-right mt-1">Notification</span></small></strong>
                </div>
                <div class="notif_content"></div>
            </div>
        <?php } ?>

        <?php if ($this->session->userdata('level') == 4) { ?>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        <small><span class="badge badge-success float-right mt-1">Notification</span></small></strong>
                </div>
                <div class="notif_angsuran"></div>
            </div>
        <?php } ?>
    </nav>
</aside><!-- /#left-panel -->
