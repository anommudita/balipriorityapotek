                <!-- Main Content-->
                <div class="container-fluid" class="d-flex flex-column">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Form Invoice</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Form Invoice</h6>
                                    <a href="<?= base_url('dokter/tambah_form_invoice') ?>" class="btn btn-primary">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">

                                            <!-- Flashdata! -->
                                            <?php if ($this->session->flashdata('flash')) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">Form Invoice
                                                            <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
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
                                                    <th style="width:20%">Nomor Invoice</th>
                                                    <th style="width:15%">Tanggal dan Jam</th>
                                                    <th style="width:20%">Nama</th>
                                                    <th style="width:10%">Total</th>
                                                    <th style="width:20%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:20%">Nomor Invoice</th>
                                                    <th style="width:15%">Tanggal dan Jam</th>
                                                    <th style="width:20%">Nama</th>
                                                    <th style="width:10%">Total</th>
                                                    <th style="width:20%">Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php if (empty($all_form_invoice)) : ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="alert alert-danger" role="alert">
                                                                Data tidak ditemukan!
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($all_form_invoice as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row['nomor_invoice']; ?></td>
                                                        <td><?= $row['date_created']; ?></td>
                                                        <td>
                                                            <?= $row['nama'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['total'] ?>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-row">
                                                                <a href="<?= base_url() ?>dokter/print_invoice/<?= $row['id']; ?>" class="btn btn-secondary mr-2" target="_blank">Print</a>
                                                                <a href="<?= base_url() ?>dokter/edit_form_invoice/<?= $row['id']; ?>" class="btn btn-warning mr-2">Edit</a>
                                                                <a href="<?= base_url(); ?>dokter/hapus_form_invoice/<?= $row['id']; ?>" class="btn btn-danger delete-form-invoice" data-id="<?= $row['id']; ?>">Hapus</a>
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
            