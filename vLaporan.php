<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Tim TI</h1>


                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div>
            </div>
           
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->userdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php
        } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

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
                                        <th class="text-center">Jenis Barang</th>
                                        <th class="text-center">Merk</th>
                                        <th class="text-center">Jumlah Asset</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($asset as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->nama_barang ?></td>
                                            <td class="text-center"><?= $value->merk ?></td>
                                            <td class="text-center"><?= $value->jml_asset ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Asset</th>
                                        <th class="text-center">Merk</th>
                                        <th class="text-center">Jumlah Asset</th>
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
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengaduan</h3><br>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pengaduan</th>
                                        <th class="text-center">Nama Asset</th>
                                        <th class="text-center">Hasil Monitoring</th>
                                        <th class="text-center">Faktor Penyebab</th>
                                        <th class="text-center">Total Pengaduan</th>
                                        <th class="text-center">Tanggal Keputusan</th>
                                        <th class="text-center">Nama Asset Keputusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengaduan as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->tgl_pengaduan ?></td>
                                            <td class="text-center"><?= $value->merk ?></td>
                                            <td class="text-center"><?= $value->hasil_monitoring ?></td>
                                            <td class="text-center"><?= $value->faktor_penyebab ?></td>
                                            <td class="text-center"><?= $value->total_pengaduan ?></td>
                                            <td class="text-center"><?= $value->tgl_kep ?></td>
                                            <td class="text-center"><?= $value->nama_asset_kep ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pengaduan</th>
                                        <th class="text-center">Nama Asset</th>
                                        <th class="text-center">Hasil Monitoring</th>
                                        <th class="text-center">Faktor Penyebab</th>
                                        <th class="text-center">Total Pengaduan</th>
                                        <th class="text-center">Tanggal Keputusan</th>
                                        <th class="text-center">Nama Asset Keputusan</th>
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