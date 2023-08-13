                <!-- Main Content-->
                <div class="container-fluid" class="d-flex flex-column">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Pajak</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pajak</h6>
                                    <a href="<?= base_url('admin/tambah_pajak') ?>" class="btn btn-primary">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-striped table-bordered" id="myTable" width="100%" cellspacing="0">

                                            <!-- Flashdata! -->
                                            <?php if ($this->session->flashdata('flash')) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">Data pajak
                                                            <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Notif Data Tidak Ditemukan -->
                                            <?php if (empty($all_pajak)) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">Data pajak tidak ditemukan!
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
                                                    <th style="width:40%">Nominal Pajak</th>
                                                    <th style="width:35%">Keterangan</th>
                                                    <th style="width:18%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:40%">Nominal Pajak</th>
                                                    <th style="width:35%">Keterangan</th>
                                                    <th style="width:18%">Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($all_pajak as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['pajak']; ?></td>
                                                        <td><?= $row['keterangan']; ?></td>
                                                        <td>
                                                            <div class="d-flex flex-row">
                                                                <a href="<?= base_url() ?>admin/edit_pajak/<?= $row['id']; ?>" class="btn btn-warning mr-2">Edit</a>
                                                                <a href="<?= base_url(); ?>admin/hapus_pajak/<?= $row['id']; ?>" class="btn btn-danger delete-pajak" data-id="<?= $row['id']; ?>">Hapus</a>
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