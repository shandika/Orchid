<!-- <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Keuagnan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div> -->
<form class="col-sm-8" action="<?= base_url('Keuangan/tambahgl'); ?>" method="post">
    <br>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="formGroupExampleInput">Nomor</label>
            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="nomor gl">
        </div>
        <br>
        <div class="form-group col-md-4">
            <label for="formGroupExampleInput2">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama gl">
        </div>
        <div class="form-group col-md-4">
            <label for="formGroupExampleInput2">Nominal</label>
            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="nominal">
        </div>
        <div class="form-group col-md-2">
            <label for="formGroupExampleInput2">Tambah</label>
            <br>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Tambah</button>
        </div>
    </div>
</form>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">General Ledger</strong>
                    </div>
                    <div class="card-body">
                        <table id="tabelgl" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nomor GL</th>
                                    <th>Nama GL</th>
                                    <th>Nominal</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query->result() as $baris) :
                                    $ktp            = $baris->nomor;
                                    $nama           = $baris->nama;
                                    $pekerjaan      = $baris->nominal;
                                ?>
                                    <tr>
                                        <td><?php echo $ktp; ?></td>
                                        <td><?php echo $nama; ?></td>
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
</div>