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

<form method="POST" action="<?= base_url() ?>">
    <div class="form-group col-3">
        <label for="formGroupExampleInput">Kode GL</label>
        <input type="text" class="form-control" id="nomor_gl" name="nomor_gl" placeholder="Kode GL" readonly>
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">Nama GL</label>
        <input type="text" class="form-control" id="nama_gl" name="nama_gl" placeholder="Nama GL">
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">Debit</label>
        <input type="text" class="form-control" id="debit_journal" name="debit_journal" placeholder="0">
    </div>
    <div class="form-group col-3">
        <label for="formGroupExampleInput2">Kredit</label>
        <input type="text" class="form-control" id="kredit_journal" name="kredit_journal" placeholder="0">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Keterangan</label>
        <input type="text" class="form-control" id="keterangan_journal" name="keterangan_journal" placeholder="masukan keterangan tambahan">
    </div>
    <button type="submit" class="btn btn-success col-md-12">Input</button>
</form>