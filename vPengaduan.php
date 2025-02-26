<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengaduan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengaduan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->userdata('success')): ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <a href="<?= base_url('Admin/cPengaduan/create') ?>" class="btn btn-default mb-3">
                        <i class="fas fa-list"></i> Tambah Data Pengaduan Asset
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengaduan Asset</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pengaduan</th>
                                        <th class="text-center">Nama Barang Pengaduan</th>
                                        <th class="text-center">Total Pengaduan</th>
                                        <th class="text-center">Status Pengaduan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengaduan as $value): ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= htmlspecialchars($value->tgl_pengaduan) ?></td>
                                            <td class="text-center"><?= htmlspecialchars($value->nama_barang) ?></td>
                                            <td class="text-center"><?= htmlspecialchars($value->total_pengaduan) ?></td>
                                            <td class="text-center">
                                                <?php 
                                                    if ($value->status_pengaduan == '0'): ?>
                                                        <span class="badge badge-warning">Menunggu Konfirmasi Tim TI</span>
                                                    <?php elseif ($value->status_pengaduan == '1'): ?>
                                                        <span class="badge badge-info">Pengaduan Sedang Diproses</span>
                                                    <?php elseif ($value->status_pengaduan == '2'): ?>
                                                        <span class="badge badge-success">Selesai</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Ditolak!</span>
                                                    <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($value->status_pengaduan == '2'): ?>
                                                    <button type="button" data-toggle="modal" data-target="#detail<?= $value->id_pengaduan ?>" class="btn btn-info"><i class="fas fa-info"></i></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pengaduan</th>
                                        <th class="text-center">Nama Barang Pengaduan</th>
                                        <th class="text-center">Total Pengaduan</th>
                                        <th class="text-center">Status Pengaduan</th>
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

<!-- Modal for Asset Decision -->
<?php if (!empty($detail)): ?>
    <?php foreach ($detail as $value): ?>
        <div class="modal fade" id="detail<?= $value->id_pengaduan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="<?= base_url('timti/ckeputusan/asset_keputusan/' . $value->id_pengaduan) ?>" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Pengaduan Sedang Diproses</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Informasi Keputusan Asset</p>
                            <strong><?= htmlspecialchars($value->tgl_kep) ?></strong>
                            <h5><?= htmlspecialchars($value->nama_asset_kep) ?></h5>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
