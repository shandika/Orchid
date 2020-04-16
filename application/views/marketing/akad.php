<div class="breadcrumbs">
    <div class="col-sm-6">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div>
    <h3 class="text-center">Formulir Akad</h3>
    <br>
    <br>

    <form action="<?= base_url('Marketing/tambahakad') ?>"" method=" POST">

        <div class="form-group">
            <label for="inputAddress">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Otomatis reference tabel customer">
        </div>
        <div class="form-group">
            <label for="inputAddress">Nomor KTP</label>
            <input class="form-control" type="text" placeholder="no ktp muncul otomatis setelah input nama" readonly id="no_ktp" name="no_ktp">
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="inputAddress">DP</label>
                <input type="text" class="form-control" id="dp" placeholder="Nominal DP" name="dp">
            </div>
            <div class="form-group col-6">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Lama Angsuran DP</label>
                <select class="custom-select my-1 mr-sm-2" id="lama_angsuran_dp" name="lama_angsuran_dp">
                    <option selected>Choose...</option>
                    <option value="1">Cash</option>
                    <option value="3">3 bulan</option>
                    <option value="6">6 bulan</option>
                    <option value="10">10 bulan</option>
                    <option value="12">12 bulan</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="inputAddress">Angsuran perbulan yang harus dibayar</label>
                <input type="text" class="form-control" id="angsuran_bulanan" placeholder="Nominal angsuran per bulan">
            </div>
            <div class="form-group col-6">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Lama Angsuran </label>
                <select class="custom-select my-1 mr-sm-2" id="lama_angsuran_bulanan" name="lama_angsuran_bulanan">
                    <option selected>Choose...</option>
                    <option value="1">Cash</option>
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
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="inputAddress">Unit Yang Dipilih : </label>
                <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target=".bd-example-modal-lg">Pilih Project</button>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">SIMPAN</button>
    </form>
</div>
<!-- Bootstap modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">List Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <center><img src="<?php echo base_url() . 'assets/images/admin.jpg'; ?>" width="200px"></center>
                                        </div>
                                        <div class="card-title">
                                            <h3 class="text-center">Project 1</h3>
                                        </div>
                                        <hr>
                                        <div class="table-responsive">
                                            <table border="0">
                                                <tr>
                                                    <td>
                                                        <h6>DEBIT</h6>
                                                    </td>
                                                    <td>
                                                        <h6>:</h6>
                                                    </td>
                                                    <td>
                                                        <h6>300.000.000</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:70px">
                                                        <h6 id="nip">KREDIT</h6>
                                                    </td>
                                                    <td style="width:20px">
                                                        <h6>:</h6>
                                                    </td>
                                                    <td>
                                                        <h6>300.000.000</h6>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <hr>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">DETAIL</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <center><img src="<?php echo base_url() . 'assets/images/admin.jpg'; ?>" width="200px"></center>
                                        </div>
                                        <div class="card-title">
                                            <h3 class="text-center">Project 2</h3>
                                        </div>
                                        <hr>
                                        <div class="table-responsive">
                                            <table border="0">
                                                <tr>
                                                    <td>
                                                        <h6>DEBIT</h6>
                                                    </td>
                                                    <td>
                                                        <h6>:</h6>
                                                    </td>
                                                    <td>
                                                        <h6>250.000.000</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:70px">
                                                        <h6 id="nip">KREDIT</h6>
                                                    </td>
                                                    <td style="width:20px">
                                                        <h6>:</h6>
                                                    </td>
                                                    <td>
                                                        <h6>300.000.000</h6>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <hr>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">DETAIL</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <center><img src="<?php echo base_url() . 'assets/images/admin.jpg'; ?>" width="200px"></center>
                                        </div>
                                        <div class="card-title">
                                            <h3 class="text-center">Project 3</h3>
                                        </div>
                                        <hr>
                                        <div class="table-responsive">
                                            <table border="0">
                                                <tr>
                                                    <td>
                                                        <h6>DEBIT</h6>
                                                    </td>
                                                    <td>
                                                        <h6>:</h6>
                                                    </td>
                                                    <td>
                                                        <h6>350.000.000</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:70px">
                                                        <h6 id="nip">KREDIT</h6>
                                                    </td>
                                                    <td style="width:20px">
                                                        <h6>:</h6>
                                                    </td>
                                                    <td>
                                                        <h6>350.000.000</h6>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <hr>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">DETAIL</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>