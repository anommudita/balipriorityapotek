                <!-- Main Content-->
                <div class="container-fluid" class="d-flex flex-column">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Antrian Pasien</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">

                                            <!-- Flashdata! -->
                                            <?php if ($this->session->flashdata('flash')) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">Data pasien
                                                            <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Flashdata form pemeriksaan -->
                                            <?php if ($this->session->flashdata('flash_form_pemeriksaan')) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">Form Pemeriksaan
                                                            <strong>berhasil</strong> <?= $this->session->flashdata('flash_form_pemeriksaan'); ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Flashdata form invoice -->
                                            <?php if ($this->session->flashdata('flash_form_invoice')) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">Form Invoice
                                                            <strong>berhasil</strong> <?= $this->session->flashdata('flash_form_invoice'); ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                            <!-- Flashdata status -->
                                            <?php if ($this->session->flashdata('flash_status')) : ?>
                                                <div class="col">
                                                    <div class="row mt-2">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">Status
                                                            <strong>berhasil</strong> <?= $this->session->flashdata('flash_status'); ?>
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
                                                    <th style="width:18%">Nomor Riwayat</th>
                                                    <th style="width:18%">Nama</th>
                                                    <th style="width:18%">Nomor Rekam Medis</th>
                                                    <th style="width:10%">Tanggal</th>
                                                    <th style="width:10%">Status</th>
                                                    <th style="width:15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:18%">Nomor Riwayat</th>
                                                    <th style="width:18%">Nama</th>
                                                    <th style="width:18%">Nomo Rekam Medis</th>
                                                    <th style="width:10%">Tanggal</th>
                                                    <th style="width:10%">Status</th>
                                                    <th style="width:15%">Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php if (empty($pasien_today)) : ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="alert alert-danger" role="alert">
                                                                Data tidak ditemukan!
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($pasien_today as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row['no_rm']; ?></td>
                                                        <td><?= $row['nama']; ?></td>
                                                        <td><?= $row['no_rekam_medis']; ?></td>
                                                        <td><?= $row['date_created']; ?></td>
                                                        <td>
                                                            <?php if ($row['status'] == 0) : ?>
                                                                <i class="fa-solid fa-circle fa-beat" style="color:  #e74a3b;"></i> Menunggu
                                                            <?php endif; ?>
                                                            <?php if ($row['status'] == 1) : ?>
                                                                <i class="fa-solid fa-circle fa-beat" style="color:  #ebbd34;"></i> Sedang Proses
                                                            <?php endif; ?>
                                                            <?php if ($row['status'] == 2) : ?>
                                                                <i class="fa-solid fa-circle fa-beat" style="color:  #1cc88a;"></i> Sudah Diperiksa
                                                            <?php endif; ?>
                                                            <?php if ($row['status'] == 3) : ?>
                                                                <i class="fa-solid fa-circle fa-beat" style="color:  #1cc88a;"></i> Selesai
                                                            <?php endif; ?>

                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-row">
                                                                <a href="#" class="btn btn-success mr-2" data-toggle="modal" data-target="#detailModal<?= $row['id']; ?>" id="tombol-detail">Detail</a>


                                                                <a href="#" class="btn btn-<?= $row['status'] == 3 ? 'success' : 'secondary'; ?> mr-2" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#pemeriksaan<?= $row['id']; ?>">Pemeriksaan</a>
                                                                <a href="#" class="btn btn-<?= $row['status'] == 3 ? 'success' : 'secondary'; ?> mr-2" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#invoice<?= $row['id']; ?>">Invoice</a>
                                                                <a href="<?= base_url(); ?>dokter/change_status/<?= $row['id']; ?>" class="btn btn-primary change-status mr-2" data-id="<?= $row['id']; ?>">Selesai</a>
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
                                                                            <div class="col">
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <h3><?= $row['nama'] ?></h3>
                                                                                    </li>
                                                                                    <li class="list-group-item"> Nomor Riwayat : <?= $row['no_rm']; ?></li>
                                                                                    <li class="list-group-item"> Nomor Rekam Medis : <?= $row['no_rekam_medis']; ?></li>
                                                                                    <li class="list-group-item"> NIK : <?= $row['nik'] ?></li>
                                                                                    <li class="list-group-item"> Tanggal Lahir : <?= $row['tanggal_lahir'] ?></li>
                                                                                    <li class="list-group-item"> Umur : <?= $row['umur'] ?></li>
                                                                                    <li class="list-group-item"> Jenis Kelamin : <?= $row['jenis_kelamin'] ?></li>
                                                                                    <li class="list-group-item"> Alamat : <?= $row['alamat'] ?></li>
                                                                                    <li class="list-group-item"> Nomor Telepon : <?= $row['no_tlp'] ?></li>
                                                                                    <li class="list-group-item"> Didata : <?= $row['date_created']; ?></li>
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


                                                    <!-- start model box pemeriksaan -->
                                                    <div class="modal fade" tabindex="-1" role="dialog" id="pemeriksaan<?= $row['id']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Form Pemeriksaan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Untuk membuat form baru pilih 'Tambah' dan untuk mengedit form Pilih 'Edit' dengan catatan harus sudah menambah form pemeriksaan terlebih dahulu</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-<?= $row['status_periksa'] == 1 ? 'warning' : 'secondary'; ?>" href="
                                                                    <?php
                                                                    if ($row['status_periksa'] == 1) {
                                                                        echo base_url('dokter/edit_form_pemeriksaan/') . $row['id'];
                                                                    } else {
                                                                        echo '#';
                                                                    }
                                                                    ?>
                                                                    
                                                                    ">Edit</a>
                                                                    <a class="btn btn-<?= $row['status_periksa'] == 0 ? 'primary' : 'secondary'; ?>" href="
                                                                    <?php
                                                                    if ($row['status_periksa'] == 0) {
                                                                        echo base_url('dokter/tambah_form_pemeriksaan/') . $row['id'];
                                                                    } else {
                                                                        echo '#';
                                                                    }
                                                                    ?>
                                                                    ">Tambah</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end model box pemeriksaan -->


                                                    <!-- start model box invoice -->
                                                    <div class="modal fade" tabindex="-1" role="dialog" id="invoice<?= $row['id']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Form Invoice</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Untuk membuat form baru pilih 'Tambah' dan untuk mengedit form Pilih 'Edit' dengan catatan harus sudah menambah form pemeriksaan terlebih dahulu</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-<?= $row['status_invoice'] == 1 ? 'warning' : 'secondary'; ?>" href="

                                                                    <?php

                                                                    if ($row['status_invoice'] == 1) {
                                                                        echo base_url('dokter/edit_form_invoice/') . $row['id'];
                                                                    } else {
                                                                        echo '#';
                                                                    }

                                                                    ?>
                                                                    ">Edit</a>
                                                                    <a class="btn btn-<?= $row['status_invoice'] == 0 ? 'primary' : 'secondary'; ?>" href="

                                                                    <?php
                                                                    if ($row['status_invoice'] == 0) {
                                                                        echo base_url('dokter/tambah_form_invoice/') . $row['id'];
                                                                    } else {
                                                                        echo '#';
                                                                    }
                                                                    ?>
                                                                    ">Tambah</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end model box invoice -->


                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <?= $this->pagination->create_links(); ?>
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
            