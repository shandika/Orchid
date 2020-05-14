<form action="<?= base_url('Keuangan/cetak_laba') ?>" method="POST">
    <div class="form-group">
        <label for="formGroupExampleInput">Pilih Project</label>
        <select class="form-control" id="project_LR" name="project_LR" onchange="loadlr()">
            <option selected>Pilih Project</option>
            <?php foreach ($query as $key) : ?>
                <option value="<?= $key->nama_gl; ?>"><?= $key->ID_project; ?> / <?= $key->nama; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div id="lr"></div>
    <button type="submit" class="btn btn-warning col-12 mb-5"><i class="menu-icon fa fa-file-pdf-o"></i> Export to PDF</button>
</form>