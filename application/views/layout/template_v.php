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
    <title><?= $title; ?></title>
    <meta name="description" content="Royal Orchid Syariah - Software Akuntansi">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->load->view('layout/css'); ?>
</head>

<body>


    <!-- Left Panel -->

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php $this->load->view('layout/header'); ?>
        <!-- Header-->

        <div class="content mt-3">

            <?php echo $contents ?>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php $this->load->view('layout/js'); ?>

</body>

</html>