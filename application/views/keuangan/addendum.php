<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Addendum</h1>
            </div>
        </div>
    </div>
</div>
<form>
<form method="POST" action="<?= base_url('Keuangan/tambahjournal') ?>">
    <div class="form-group col-6">
        <label for="exampleFormControlInput1">Nama Pemohon</label>
        <input type="text" class="form-control" id="nama_pemohon_addendum" name="nama_pemohon_addendum" placeholder="Masukan Nama Pemohon">
    </div>
    <div class="form-group col-6">
        <label for="exampleFormControlInput1">Nomor KTP</label>
        <input type="text" class="form-control" id="no_ktp_addendum" name="no_ktp_addendum" placeholder="nomor KTP" readonly>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Pilih Addendum</label>
        <select class="custom-select my-1 mr-sm-2" id="jenis_addendum" name="jenis_addendum" onchange="loadAddendum()">
            <option value="kosong" selected>Pilih Addendum</option>
            <option value="rubah_angsuran">Rubah Angsuran</option>
            <option value="rubah_injek">Rubah Injek</option>
            <option value="rubah_unit">Rubah Unit</option>
            <option value="rubah_project">Rubah Project</option>
        </select>
    </div>
    <h4 class="text-center" id="titlenya" style="display: none">PERUBAHAN DATA</h4>
    <br>
    <!-- Form Rubah Angsuran -->
    <div id="form_rubah_angsuran" style="display: none">
        <div class="form-group col-4">
            <label for="exampleFormControlInput1">Sisa Angsuran sebelumnya</label>
            <!-- <input type="text" class="form-control" id="sisa_angsuran_sebelumnya_addendum" name="sisa_angsuran_sebelumnya_addendum" readonly> -->
            <div id="sisa_angsuran"></div>
        </div>
        <div class="form-group col-4">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Lama Angsuran </label>
            <select class="custom-select my-1 mr-sm-2" id="lama_angsuran_bulanan_addendum" name="lama_angsuran_bulanan_addendum">
                <option selected>Pilih lama</option>
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
            <label for="exampleFormControlInput1">Angsuran Baru</label>
            <input type="text" class="form-control" id="angsuran_baru_addendum" name="angsuran_baru_addendum" placeholder="" readonly>
        </div>
    </div>
    <!-- Akhir Form Rubah Angsuran -->
    <!-- Form Rubah Injek -->
    <div id="form_rubah_injek" style="display: none">
        <!-- <div class="form-group col-3">
            <label for="exampleFormControlInput1">Sisa Angsuran Injek</label>
            <input type="text" class="form-control" id="sisa_angsuran_injek_addendum" name="sisa_angsuran_injek_addendum" placeholder="total" readonly>
        </div>
        <div class="form-group col-3">
            <label for="exampleFormControlInput1">Sisa Angsuran Pokok</label>
            <input type="text" class="form-control" id="sisa_angsuran_pokok_addendum" name="sisa_angsuran_injek_addendum" placeholder="total" readonly>
        </div> -->
        <div id="sisa_injek"></div>
        <div class="form-group col-3">
            <label for="exampleFormControlInput1">Nominal Injek Baru</label>
            <input type="text" class="form-control" id="injek_baru_addendum" name="injek_baru_addendum" placeholder="Masukan Nominal injek">
        </div>
        <div class="form-group col-3">
            <label for="exampleFormControlInput1">Lama Injek</label>
            <input type="text" class="form-control" id="lama_injek_baru_addendum" name="lama_injek_baru_addendum" placeholder="">
        </div>
    </div>
    <!-- Akhir Form Rubah Injek -->
    <!-- Form Rubah Unit -->
    <div id="form_rubah_unit" style="display: none">
        <div class="form-group col-6">
            <label for="exampleFormControlInput1">Unit Sebelumnya</label>
            <!-- <input type="text" class="form-control" id="unit_sebelumnya_addendum" name="unit_sebelumnya_addendum" placeholder="Nomor Unit" readonly> -->
            <div id="unit_sebelumnya"></div>
        </div>
        <div class="form-group col-6">
            <label for="exampleFormControlInput1">Unit Baru</label>
            <div id="pilih_unit"></div>
        </div>
    </div>
    <!-- Akhir Form Rubah Unit -->
    <!-- Form Rubah project -->
    <div id="form_rubah_project" style="display: none">
        <div class="form-group col-4">
            <label for="exampleFormControlInput1">Project sebelumnya</label>
            <!-- <input type="text" class="form-control" id="project_sebelumnya_addendum" name="project_sebelumnya_addendum" placeholder="Nama Project" readonly> -->
            <div id="project_sebelumnya"></div>
        </div>
        <div class="form-group col-4">
            <label for="exampleFormControlInput1">Project baru</label>
            <select class="custom-select my-1 mr-sm-2" id="project_baru_addendum" name="project_baru_addendum">
                <option selected>Pilih Project</option>
                <?php foreach ($query1 as $key) : ?>
                <option value="<?= $key->ID_project; ?>"><?= $key->nama; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-4">
            <label for="exampleFormControlInput1">Pilih Unit</label>
            <select class="custom-select my-1 mr-sm-2" id="unit_baru_project_addendum" name="unit_baru_project_addendum">
                <option selected>Pilih Unit</option>
            </select>
        </div>
    </div>
    <!-- Akhir Form Rubah project -->
    <button type="submit" class="btn btn-success col-md-12">Input</button>
</form>
