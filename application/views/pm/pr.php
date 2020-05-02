<div class="breadcrumbs mb-3">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Purchasing Request</h1>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="<?= base_url('Pm/tambahpr') ?>">
    <div class="form-group col-2">
        <label for="exampleFormControlInput1">ID PR</label>
        <input type="text" class="form-control" id="ID_pr" name="ID_pr" placeholder="PR001" value="<?= $idpr ?>" readonly>
    </div>
    <div class="form-group col-md-10">
        <label for="inputState">Data Unit pemesan</label>
        <select id="ID_unit_dipesan_pr" name="ID_unit_dipesan_pr" class="form-control">
            <option selected>Pilih Unit yang akan dibuatkan PR</option>
            <?php foreach ($query1 as $key) : ?>
                <option value="<?= $key->ID_unit_dipesan; ?>"><?= $key->ID_unit_dipesan; ?> / <?= $key->ID_unit; ?> / <?= $key->namanya; ?> / <?= $key->nama; ?> / <?= $key->alamat; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group col-6">
        <label for="exampleFormControlInput1">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang_pr" name="nama_barang_pr" placeholder="">
    </div>
    <div class="form-group col-3">
        <label for="exampleFormControlInput1">Harga Barang</label>
        <input type="text" class="form-control" id="harga_barang_pr" name="harga_barang_pr" placeholder="">
    </div>
    <div class="form-group col-3">
        <label for="exampleFormControlInput1">Jumlah Barang</label>
        <input type="text" class="form-control" id="jumlah_barang_pr" name="jumlah_barang_pr" placeholder="">
    </div>
    <div class="form-group col-3">
        <label for="exampleFormControlInput1">Nama Supplier</label>
        <input type="text" class="form-control" id="nama_supplier_pr" name="nama_supplier_pr" placeholder="">
    </div>
    <div class="form-group col-2">
        <label for="exampleFormControlInput1">Jenis Bayar</label>
        <select id="jenis_bayar_pr" name="jenis_bayar_pr" class="form-control">
            <option value="cash" selected>Cash</option>
            <option value="cicil">Cicil</option>
        </select>
    </div>
    <div class="form-group col-3">
        <label for="exampleFormControlInput1">Lama Bayar</label>
        <select id="lama_bayar_pr" name="lama_bayar_pr" class="form-control" disabled>
            <option selected value="0">Pilih Jumlah Bulan</option>
            <option value="3">3</option>
            <option value="6">6</option>
            <option value="9">9</option>
            <option value="12">12</option>
        </select>
    </div>
    <div class="form-group col-2">
        <label for="exampleFormControlInput1">Waktu tunggu</label>
        <input type="text" class="form-control" id="waktu_tunggu_pr" name="waktu_tunggu_pr" placeholder="">
    </div>
    <div class="form-group col-2">
        <label for="exampleFormControlInput1">Satuan</label>
        <select id="satuan_waktu_tunggu_pr" name="satuan_waktu_tunggu_pr" class="form-control">
            <option value="hari" selected>Hari</option>
            <option value="bulan">Bulan</option>
            <option value="tahun">Tahun</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success form-control">Simpan</button>
    </div>
</form>