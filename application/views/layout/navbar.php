<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav"
                <?php if($this->session->userdata('level') == 1) { ?>
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>PROJECT </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('level') == 1) { ?>
                <li class="">
                    <a href="index.html"> <i class="menu-icon fa fa-id-badge"></i>DATA PEMBELI </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('level') == 1) { ?>
                <li class="">
                    <a href="index.html"> <i class="menu-icon fa fa-id-badge"></i>JOURNAL </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('level') == 1) { ?>
                <li class="">
                    <a href="index.html"> <i class="menu-icon fa fa-id-badge"></i>GENERAL LEDGER </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('level') == 1) { ?>
                <li class="">
                    <a href="index.html"> <i class="menu-icon fa fa-id-badge"></i>LAPORAN </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('level') == 3) { ?>
                <li class="">
                    <a href="<?php echo base_url('Marketing');?>"> <i class="menu-icon fa fa-id-badge"></i>DATA PELANGGAN </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('level') == 3) { ?>
                <li class="">
                    <a href="<?php echo base_url('Marketing/upload');?>"> <i class="menu-icon fa fa-id-badge"></i>LAPORAN </a>
                </li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
