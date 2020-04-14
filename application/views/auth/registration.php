<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <?php $this->load->view('layout/css'); ?>


</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="<?php base_url() ?>assets/images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="<?= base_url('Auth/registration'); ?>" method="post">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
                        <div class="form-group">
                            <label>Nomor KTP</label>
                            <input type="text" id="ktp" name="ktp" class="form-control" placeholder="No KTP">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" id="no_tlp" name="no_tlp" class="form-control" placeholder="No Telepon">
                        </div>
                        <div class="form-group">
                            <label> Jabatan // can jalan</label>
                            <select class="form-control" name="jabatan" id="jabatan">
                                <option value="Select">Select</option>
                                <option value="akun_marketing" id="akun_marketing" name="akun_marketing">Marketing</option>
                                <option value="akun_project_manager" id="akun_project_manager" name="akun_project_manager">Project manager</option>
                                <option value="akun_purchasing" id="akun_purchasing" name="akun_purchasing">Purchasing</option>
                                <option value="akun_keuangan" id="akun_keuangan" name="akun_keuangan">Keuangan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Re-Password</label>
                            <input type="password" id="password2" name="password2" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign up</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="<?= base_url('Auth/back_login'); ?>"> Sign in Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('layout/js'); ?>


</body>

</html>