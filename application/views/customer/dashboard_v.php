<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="card float-left">
            <div class="page-title">
                <!-- <button type="button" class="btn btn-primary"><i class="fa fa-star"></i>&nbsp; Pemesanan Unit</button> -->
                <a href="<?php echo base_url('Marketing/pesanunit')?>" class="btn btn-primary"><i class="fa fa-star"></i>&nbsp; Pemesanan Unit</a>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card float-right">
            <div class="page-title">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus"></i> Tambah Project</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <center><img src="<?php echo base_url().'assets/images/admin.jpg'; ?>" width="200px"></center>
                        </div>
                        <div class="card-title">
                            <h3 class="text-center">Project 1</h3>
                        </div>
                        <hr>
                        <div class="table-responsive" >
                          <table border="0" >
                            <tr >
                              <td><h6>DEBIT</h6></td>
                              <td><h6>:</h6></td>
                              <td><h6>300.000.000</h6></td>
                            </tr>
                            <tr >
                              <td style="width:70px"> <h6 id="nip">KREDIT</h6></td>
                              <td style="width:20px"><h6 >:</h6></td>
                              <td><h6>300.000.000</h6></td>
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
                            <center><img src="<?php echo base_url().'assets/images/admin.jpg'; ?>" width="200px"></center>
                        </div>
                        <div class="card-title">
                            <h3 class="text-center">Project 2</h3>
                        </div>
                        <hr>
                        <div class="table-responsive" >
                          <table border="0" >
                            <tr >
                              <td><h6>DEBIT</h6></td>
                              <td><h6>:</h6></td>
                              <td><h6>250.000.000</h6></td>
                            </tr>
                            <tr >
                              <td style="width:70px"> <h6 id="nip">KREDIT</h6></td>
                              <td style="width:20px"><h6 >:</h6></td>
                              <td><h6>300.000.000</h6></td>
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
                            <center><img src="<?php echo base_url().'assets/images/admin.jpg'; ?>" width="200px"></center>
                        </div>
                        <div class="card-title">
                            <h3 class="text-center">Project 3</h3>
                        </div>
                        <hr>
                        <div class="table-responsive" >
                          <table border="0" >
                            <tr >
                              <td><h6>DEBIT</h6></td>
                              <td><h6>:</h6></td>
                              <td><h6>350.000.000</h6></td>
                            </tr>
                            <tr >
                              <td style="width:70px"> <h6 id="nip">KREDIT</h6></td>
                              <td style="width:20px"><h6 >:</h6></td>
                              <td><h6>350.000.000</h6></td>
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_add_new" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">FORM TAMBAH PROJECT</h3>
            </div>
            <div class="modal-body form">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">NAMA PROJECT</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                    </div>
                    <!-- <div class="row form-group">
                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email Input</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control"><small class="help-block form-text">Please enter your email</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                        <div class="col-12 col-md-9"><input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control"><small class="help-block form-text">Please enter a complex password</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Disabled Input</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Textarea</label></div>
                        <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                    </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                            <div class="col-12 col-md-9">
                                <select name="select" id="select" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Select Large</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selectLg" id="selectLg" class="form-control-lg form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Select Small</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                    <option value="4">Option #4</option>
                                    <option value="5">Option #5</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">Disabled Select</label></div>
                            <div class="col-12 col-md-9">
                                <select name="disabledSelect" id="disabledSelect" disabled="" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="multiple-select" class=" form-control-label">Multiple select</label></div>
                            <div class="col col-md-9">
                                <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                    <option value="4">Option #4</option>
                                    <option value="5">Option #5</option>
                                    <option value="6">Option #6</option>
                                    <option value="7">Option #7</option>
                                    <option value="8">Option #8</option>
                                    <option value="9">Option #9</option>
                                    <option value="10">Option #10</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Radios</label></div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Option 1
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio2" class="form-check-label ">
                                            <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Option 2
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio3" class="form-check-label ">
                                            <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Option 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Inline Radios</label></div>
                            <div class="col col-md-9">
                                <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label ">
                                        <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">One
                                    </label>
                                    <label for="inline-radio2" class="form-check-label ">
                                        <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input">Two
                                    </label>
                                    <label for="inline-radio3" class="form-check-label ">
                                        <input type="radio" id="inline-radio3" name="inline-radios" value="option3" class="form-check-input">Three
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Checkboxes</label></div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Option 1
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox2" class="form-check-label ">
                                            <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input"> Option 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Option 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Inline Checkboxes</label></div>
                            <div class="col col-md-9">
                                <div class="form-check-inline form-check">
                                    <label for="inline-checkbox1" class="form-check-label ">
                                        <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input">One
                                    </label>
                                    <label for="inline-checkbox2" class="form-check-label ">
                                        <input type="checkbox" id="inline-checkbox2" name="inline-checkbox2" value="option2" class="form-check-input">Two
                                    </label>
                                    <label for="inline-checkbox3" class="form-check-label ">
                                        <input type="checkbox" id="inline-checkbox3" name="inline-checkbox3" value="option3" class="form-check-input">Three
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">GAMBAR</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                        </div>
                        <!-- <div class="row form-group">
                            <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Multiple File input</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file"></div>
                        </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
