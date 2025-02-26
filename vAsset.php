<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Asset</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->userdata('success')) { ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="<?= base_url('Admin/cAsset/create') ?>" class="btn btn-default mb-3">
                        <i class="fas fa-university"></i> Tambah Data Asset
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Asset</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">No Asset</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Id User</th>
                                        <th class="text-center">Merk</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($asset as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value->no_asset ?></td>
                                            <td><?= $value->nama_barang ?></td>
                                            <td><?= $value->id_user ?></td>
                                            <td><?= $value->merk ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('Admin/cAsset/delete/' . $value->id_asset) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    <a href="<?= base_url('Admin/cAsset/edit/' . $value->id_asset) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                                    <button type="button" data-toggle="modal" data-target="#detail<?= $value->id_asset ?>" class="btn btn-primary"><i class="fas fa-th-list"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">No Asset</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Id User</th>
                                        <th class="text-center">Merk</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal for Asset Detail -->
<?php foreach ($asset as $key => $value) { ?>
    <div class="modal fade" id="detail<?= $value->id_asset ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Informasi Asset</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No Asset</th>
                                <td><strong><?= $value->no_asset ?></strong></td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <td><?= $value->nama_barang ?></td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td><?= $value->nama_lokasi ?>, <?= $value->alamat_lengkap ?></td>
                            </tr>
                            <tr>
                                <th>Id User</th>
                                <td><?= $value->id_user ?></td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td><?= $value->merk ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Asset</th>
                                <td><?= $value->jml_asset ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
