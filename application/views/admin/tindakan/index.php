                <!-- Main Content-->
                <div class="container-fluid" class="d-flex flex-column">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Daftar Tindakan</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <h6 class="m-0 font-weight-bold text-primary">Tindakan</h6>
                                        </div>
                                        <div class="col-4 text-right"> <!-- Menggunakan col-4 untuk mengatur tata letak kolom -->
                                            <a href="<?= base_url('admin/print_data_tindakan') ?>" class="btn btn-secondary" target="_blank">Print</a>
                                            <a href="<?= base_url('admin/tambah_tindakan') ?>" class="btn btn-primary">Tambah</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="myTable" width="100%" cellspacing="0">
                                            <!-- Flashdata! -->
                                            <?php if ($this->session->flashdata('flash')) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">Data tindakan
                                                            <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Notif data tidak ditemukan -->
                                            <?php if (empty($all_tindakan)) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">Data tindakan tidak ditemukan!
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:40%">Tindakan</th>
                                                    <th style="width:35%">Biaya Tindakan</th>
                                                    <th style="width:18%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:40%">Tindakan</th>
                                                    <th style="width:35%">Biaya Tindakan</th>
                                                    <th style="width:18%">Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($all_tindakan as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['nama_tindakan']; ?></td>
                                                        <td><?= $row['biaya']; ?></td>
                                                        <td>
                                                            <div class="d-flex flex-row">
                                                                <a href="<?= base_url() ?>admin/edit_tindakan/<?= $row['id']; ?>" class="btn btn-warning mr-2">Edit</a>
                                                                <a href="<?= base_url(); ?>admin/hapus_tindakan/<?= $row['id']; ?>" class="btn btn-danger delete-tindakan" data-id="<?= $row['id']; ?>">Hapus</a>
                                                            </div>
                                                        </td>
                                                    </tr>

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