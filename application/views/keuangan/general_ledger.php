<form class="col-sm-8" action="<?= base_url('Keuangan/tambahgl'); ?>" method="post">
    <br>
    <div class="form-group">
        <label for="formGroupExampleInput">Pilih Project</label>
        <select class="custom-select my-1 mr-sm-2" id="project_GL" name="project_GL" onchange="loadgl()">
            <option selected>Pilih Project</option>
            <option value="general_ledger">General Ledger</option>
            <?php foreach ($query2 as $key) : ?>
                <option value="<?= $key->nama_gl; ?>"><?= $key->ID_project; ?> / <?= $key->nama; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>