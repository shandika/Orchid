<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
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
</div>
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