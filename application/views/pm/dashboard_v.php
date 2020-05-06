<div class="breadcrumbs mb-3">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Project</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="navbar-form float-right mb-1">
        <div class="col-sm">
            <button class=" btn btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-fw fa-plus"></i>Tambah Project</button>
        </div>
    </div>
    <div class="navbar-form">

        <?= form_open('Pm/search'); ?>
        <div>
            <div class="col-sm-4 ">
                <input class="form-control" name="key" type="text" placeholder="Search" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-success mb-1">Cari</button>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<div class="row mt-5">
    <?php foreach ($project as $data) : ?>
        <div class="col-sm-12 col-lg-4 col-md-6">
            <div class="card" style="width: 20rem;">
                <div class="text-center mx-auto" style="width: 18rem;">
                    <img src=" <?= base_url('assets/images/project/') . $data->foto; ?>" class="card-img pt-3 px-2">
                </div>

                <div class="card-body">
                    <h4 class="card-text mb-3 text-center"><strong><?= $data->nama; ?></strong></h4>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <p class="card-text mb-0">Jumlah unit : <strong><?= $data->jumlah_unit; ?></strong> </p>
                            <p class="card-text mb-0">Unit isi : <strong><?= $data->unit_isi; ?></strong> </p>
                        </div>
                        <div class="row float-right">
                            <div class="col-sm-12">
                                <p class="card-text mb-0">Unit kosong : <strong><?= $data->unit_kosong; ?></strong> </p>
                            </div>
                        </div>
                        <div class="col-sm mt-2">
                            <p class="card-text">Alamat : <?= $data->alamat; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <button id="detailProject" class="btn btn-sm btn-info float-left detail" data-toggle="modal" data-target="#projectModal" data-id="<?= $data->ID_project; ?>" data-foto="<?= $data->foto; ?>" data-nama="<?= $data->nama; ?>" data-jmlunit="<?= $data->jumlah_unit; ?>" data-unitIsi="<?= $data->unit_isi; ?>" data-unitKosong="<?= $data->unit_kosong; ?>" data-alamat="<?= $data->alamat; ?>" data-deskripsi="<?= $data->deskripsi; ?>"><i class="fa fa-eye pr-2"></i>Lihat details</button>
                        </div>
                        <div class="col-sm-6 float-right  ">
                            <form action="<?= base_url('Pm/delete') ?>" method="POST">
                                <input type="hidden" name="ID_project" value="<?= $data->ID_project ?>">
                                <button onclick="return confirm ('Anda yakin ingin hapus data ini ?')" class="btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <?= anchor('Pm/edit/' . $data->ID_project, '<button class="btn btn-sm btn-warning float-right mr-1"><i class="fa fa-edit pr-1"></i>Edit</button>') ?>
                        </div>
                        <div class="col-sm-12 mt-1">
                            <?= anchor('Pm/tambahUnitView/' . $data->ID_project, '<button id="tambahUnit" class="btn btn-sm btn-success float-right"><i class="fa fa-plus pr-1"></i>Tambah Unit</button>') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>

</div>

<!-- Modal Detail-->
<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Detail Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 my-3 ">
                        <img src="" id="foto" height="600px" class="img-fluid my-auto">
                    </div>
                    <div class="col-md-8 border-0">
                        <li class="list-group-item ">Nama : <strong><span id="nama"></span></strong></li>
                        <li class="list-group-item">Jumlah unit : <strong><span id="jmlUnit"></span></strong></li>
                        <li class="list-group-item">Unit isi : <strong><span id="unitIsi"></span></strong></li>
                        <li class="list-group-item">Unit kosong : <strong><span id="unitKosong"></span></strong></li>
                        <li class="list-group-item">Alamat : <strong><span id="alamat"></span></strong></li>
                        <li class="list-group-item">Deskripsi : <strong><span id="deskripsi"></span></strong></li>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close detail</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-10" role="dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Tambah Data Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Pm/tambahDataProject'); ?>" class="mx-4" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class=" form-group mt-2">
                        <input type="text" class="form-control" id="ID_project" name="ID_project" placeholder="ID project" value="<?= $idP ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama project" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="deskripsi" name="alamat" rows="2" placeholder="Alamat" required=""></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" placeholder="Deskripsi" required=""></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto project :</label>
                        <input type="file" class="form-control" id="foto" name="foto" rows="2" required=""></input>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" placeholder="Jumlah unit " required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="unit_kosong" name="unit_kosong" placeholder="Unit kosong" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="unit_isi" name="unit_isi" placeholder="Unit isi" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <input type="submit" class=" btn btn-primary" name="tambah" value="Simpan"></input>
                </div>
                <!-- </form> -->
                <?= form_close(); ?>
        </div>
    </div>
</div>