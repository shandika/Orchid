<div class="breadcrumbs mb-3">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Purchasing Request</h1>
            </div>
        </div>
    </div>
</div>

<form>
    <div class="form-group col-2">
        <label for="exampleFormControlInput1">ID PR</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="PR001">
    </div>
    <div class="form-group col-md-10">
        <label for="inputState">Data Unit pemesan</label>
        <select id="inputState" class="form-control">
            <option selected>Pilih Unit yang akan dibuatkan PR</option>
            <?php foreach ($query1 as $key) : ?>
                <option value="<?= $key->ID_unit_dipesan; ?>"><?= $key->ID_unit_dipesan; ?> / <?= $key->ID_unit; ?> / <?= $key->namanya; ?> / <?= $key->nama; ?> / <?= $key->alamat; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group col-6">
        <label for="exampleFormControlInput1">Nama Barang</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="PR001">
    </div>
    <div class="form-group col-3">
        <label for="exampleFormControlInput1">Harga Barang</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="PR001">
    </div>
    <div class="form-group col-3">
        <label for="exampleFormControlInput1">Jumlah Barang</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="PR001">
    </div>
    <div class="form-group col-4">
        <label for="exampleFormControlInput1">Nama Supplier</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="PR001">
    </div>
    <div class="form-group col-2">
        <label for="exampleFormControlInput1">Jenis Bayar</label>
        <select id="inputState" class="form-control">
            <option value="cash" selected>Cash</option>
            <option value="cicil">Cicil</option>
        </select>
    </div>
    <div class="form-group col-3">
        <label for="exampleFormControlInput1">Lama Bayar</label>
        <select id="inputState" class="form-control">
            <option selected>Pilih Jumlah Bulan</option>
            <option value="1">3</option>
            <option value="6">6</option>
            <option value="9">9</option>
            <option value="12">12</option>
        </select>
    </div>
    <div class="form-group col-3">
        <label for="exampleFormControlInput1">Waktu Tunggu</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Bulanan">
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-success form-control">Simpan</button>
    </div>
</form>