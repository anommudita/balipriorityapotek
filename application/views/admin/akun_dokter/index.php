                <!-- Main Content-->
                <div class="container-fluid" class="d-flex flex-column">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Akun Dokter</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Akun Dokter</h6>
                                    <a href="<?= base_url('admin/tambah_akun_dokter') ?>" class="btn btn-primary">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <!-- Flashdata! -->
                                        <?php if ($this->session->flashdata('flash')) : ?>
                                            <div class="col">
                                                <div class="row mt-2">
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">Data akun dokter
                                                        <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Notif Data Tidak ditemukan -->
                                        <?php if (empty($all_akun_dokter)) : ?>
                                            <div class="col">
                                                <div class="row mt-2">
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">Data akun dokter tidak ditemukan!
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:25%">Nama</th>
                                                    <th style="width:20%">Username</th>
                                                    <th style="width:13%">Role</th>
                                                    <th style="width:13%">Status</th>
                                                    <th style="width:20%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:25%">Nama</th>
                                                    <th style="width:20%">Username</th>
                                                    <th style="width:13%">Role</th>
                                                    <th style="width:13%">Status</th>
                                                    <th style="width:20%">Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($all_akun_dokter as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row['nama']; ?></td>
                                                        <td><?= $row['username']; ?></td>
                                                        <td><?= $row['role_id'] == 2 ? 'Dokter' : 'Tidak Ada'; ?></td>
                                                        <td>
                                                            <?= $row['status'] == 0 ? '<i class="fa-solid fa-circle fa-beat" style="color:  #e74a3b;"></i> Offline' : '<i class="fa-solid fa-circle fa-beat" style="color:  #1cc88a;"></i> Online'; ?>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-row">
                                                                <a href="#" class="btn btn-success mr-2" data-toggle="modal" data-target="#detailModal<?= $row['id']; ?>" id="tombol-detail">Detail</a>
                                                                <a href="<?= base_url() ?>admin/edit_akun_dokter/<?= $row['id']; ?>" class="btn btn-warning mr-2">Edit</a>
                                                                <a href="<?= base_url(); ?>admin/hapus_akun_dokter/<?= $row['id']; ?>" class="btn btn-danger delete-akun-dokter" data-id="<?= $row['id']; ?>">Hapus</a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- modal box -->
                                                    <div class="modal fade" id="detailModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Akun Dokter</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-md-4 mt-3">
                                                                                <img src="<?= base_url('assets/img/dokter/profile/') ?><?= $row['foto']; ?>" class="img-fluid">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <h3><?= $row['nama'] ?></h3>
                                                                                    </li>
                                                                                    <li class="list-group-item"> Username : <?= $row['username']; ?></li>
                                                                                    <li class="list-group-item"> Role : <?= $row['role_id'] == 2 ? 'Dokter' : 'Tidak Ada'; ?></li>
                                                                                    <li class="list-group-item"> Status : <?= $row['status'] == 1 ? 'Online' : 'Offline'; ?></li>
                                                                                    <li class="list-group-item"> Akun Dibuat : <?= $row['date_created']; ?></li>
                                                                                </ul>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end modal box -->
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->


                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End Main Content -->
                <!-- 
            