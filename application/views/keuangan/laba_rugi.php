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