<div class="breadcrumbs">
    <div class="col-sm-6">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Akad</h1>
            </div>
        </div>
    </div>
</div>

<div>
    <h3 class="text-center">Formulir Akad</h3>
    <br>
    <br>

    <form name="form-akad" action="<?= base_url('Marketing/tambahakad') ?>" method="post">

        <div class="form-group d-none">
            <label for="inputAddress">ID</label>
            <input type="text" class="form-control col-1" id="id_unit_dipesan" name="id_unit_dipesan" value="UD<?php echo sprintf("%04s", $idunitdipesan) ?>" readonly>
        </div>
        <div class="form-group d-none">
            <label for="inputAddress">ktp Admin</label>
            <input type="text" class="form-control col-1" id="ktp_marketing" name="ktp_marketing" value="<?= $this->session->userdata('ktp'); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputAddress">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Otomatis reference tabel customer">
        </div>
        <div class="form-group">
            <label for="inputAddress">Nomor KTP</label>
            <input class="form-control" type="text" placeholder="no ktp muncul otomatis setelah input nama" name="no_ktp" id="no_ktp" readonly>
        </div>
        <div class="form-row">
            <div class="form-group col-4">
                <label for="inputAddress">DP</label>
                <input type="number" class="form-control" id="dp" placeholder="Nominal DP" name="dp">
            </div>
            <div class="form-group col-4">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Lama Angsuran DP</label>
                <select class="custom-select my-1 mr-sm-2" id="lama_angsuran_dp" name="lama_angsuran_dp">
                    <option selected>Choose...</option>
                    <option value="0">Cash</option>
                    <option value="3">3 bulan</option>
                    <option value="6">6 bulan</option>
                    <option value="10">10 bulan</option>
                    <option value="12">12 bulan</option>
                </select>
            </div>
            <div class="form-group col-4">
                <label for="inputAddress">Angsuran DP</label>
                <input type="number" class="form-control" id="angsuran_dp" placeholder="Nominal Angsuran DP" name="angsuran_dp">
            </div>
        </div>
        <div class="form-row">


        </div>
        <div class="form-row">
            <div class="form-group col-4">
                <label for="inputAddress">Injeksi</label>
                <input type="number" class="form-control" id="injeksi" placeholder="Nominal Injek" name="injeksi">
            </div>
            <div class="form-group col-4">
                <label for="inputAddress">Lama Injeksi (Tahun)</label>
                <input type="number" class="form-control" id="lama_injeksi" placeholder="5 Tahun" name="lama_injeksi">
            </div>
            <div class="form-group col-4">
                <label for="inputAddress">Total Injeksi</label>
                <input type="number" name="total_injeksi" id="total_injeksi" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-4">
                <label for="inputAddress">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan Harga">
            </div>
            <div class="form-group col-4">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Lama Angsuran </label>
                <select class="custom-select my-1 mr-sm-2" id="lama_angsuran_bulanan" name="lama_angsuran_bulanan">
                    <option selected>Choose...</option>
                    <option value="0">Cash</option>
                    <option value="12">12 bulan / 1 tahun</option>
                    <option value="24">24 bulan / 2 tahun</option>
                    <option value="36">36 bulan / 3 tahun</option>
                    <option value="48">48 bulan / 4 tahun</option>
                    <option value="60">60 bulan / 5 tahun</option>
                    <option value="70">72 bulan / 6 tahun</option>
                    <option value="84">84 bulan / 7 tahun</option>
                    <option value="96">96 bulan / 8 tahun</option>
                    <option value="108">108 bulan / 9 tahun</option>
                    <option value="120">120 bulan / 10 tahun</option>
                </select>
            </div>
            <div class="form-group col-4">
                <label for="inputAddress">Angsuran perbulan</label>
                <input type="number" class="form-control" id="angsuran_bulanan" name="angsuran_bulanan" placeholder="Nominal angsuran per bulan">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Pilih Project</label>
            <div class="col-sm-11">
                <select class="custom-select my-1 mr-sm-2" id="project" name="project">
                    <option selected>Pilih Project</option>
                    <?php foreach ($query1 as $key) : ?>
                        <option value="<?= $key->ID_project; ?>"><?= $key->nama; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Pilih Unit</label>
            <div class="col-sm-11">
                <select class="custom-select my-1 mr-sm-2" id="unit" name="unit">
                    <option selected>Pilh Unit</option>

                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">SIMPAN</button>
    </form>
</div>