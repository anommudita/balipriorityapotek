                <!-- Main Content-->
                <div class="container-fluid" class="d-flex flex-column">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Riwayat Pemeriksaan</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Pemeriksaan</h6>
                                    <!-- <a href="<?= base_url('dokter/tambah_form_pemeriksaan') ?>" class="btn btn-primary">Tambah</a> -->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">

                                            <!-- Flashdata! -->
                                            <?php if ($this->session->flashdata('flash')) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">Form Pemeriksaan
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
                                                    <th style="width:20%">Nomor Riwayat</th>
                                                    <th style="width:30%">Nama</th>
                                                    <th>NIK</th>
                                                    <th>Tanggal Periksa</th>
                                                    <th style="width:10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:20%">Nomor Riwayat</th>
                                                    <th style="width:30%">Nama</th>
                                                    <th>NIK</th>
                                                    <th>Tanggal Periksa</th>
                                                    <th style="width:10%">Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php if (empty($all_form_pemeriksaan)) : ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="alert alert-danger" role="alert">
                                                                Data tidak ditemukan!
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($all_form_pemeriksaan as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row['no_rm']; ?></td>
                                                        <td><?= $row['nama_pasien']; ?></td>
                                                        <td>
                                                            <?= $row['nik'] ?>
                                                        </td>
                                                        <td><?= $row['date_created'] ?></td>
                                                        <td>
                                                            <div class="d-flex flex-row">
                                                                <a href="#" class="btn btn-success mr-2" data-toggle="modal" data-target="#detailModal<?= $row['id']; ?>" id="tombol-detail">Detail</a>
                                                                <a href="<?= base_url() ?>dokter/print_form_pemeriksaan/<?= $row['id']; ?>" class="btn btn-secondary" target="_blank">Print</a>
                                                                <!-- <a href="<?= base_url() ?>dokter/edit_form_pemeriksaan/<?= $row['id']; ?>" class="btn btn-warning mr-2">Edit</a>
                                                                <a href="<?= base_url(); ?>dokter/hapus_form_pemeriksaan/<?= $row['id']; ?>" class="btn btn-danger delete-form-pemeriksaan" data-id="<?= $row['id']; ?>">Hapus</a> -->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- modal box -->
                                                    <div class="modal fade" id="detailModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <h3><?= $row['nama_pasien'] ?></h3>
                                                                                    </li>
                                                                                    <li class="list-group-item"> No.Riwayat : <?= $row['no_rm']; ?></li>
                                                                                    <li class="list-group-item"> S : <?= $row['S'] ?></li>
                                                                                    <li class="list-group-item"> O : <?= $row['O'] ?></li>
                                                                                    <li class="list-group-item"> A : <?= $row['A'] ?></li>
                                                                                    <li class="list-group-item"> P : <?= $row['P'] ?></li>
                                                                                    <li class="list-group-item"> Diperiksa pada tanggal : <?= $row['date_created']; ?></li>
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
            