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
                                        <table class="table table-striped table-bordered" id="myTable" width="100%" cellspacing="0">
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

                                            <a href="<?= base_url('admin/antrianpasien/') ?>" class="btn btn-success mr-3 mb-3">All Data</a>
                                            <?php foreach ($dokter as $row) : ?>
                                                <a href="<?= base_url('admin/antrian_pasien_by/' . $row['id']) ?>" class="btn btn-primary mr-3 mb-3"><?= $row['nama'] ?></a>
                                            <?php endforeach; ?>
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:18%">Nomor Riwayat</th>
                                                    <th style="width:18%">Nama</th>
                                                    <th style="width:18%">NIK</th>
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
                                                    <th style="width:18%">NIK</th>
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
                                                        <td><?= $row['nik']; ?></td>
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

                                                                <a href="<?= base_url(); ?>admin/print_informed_consent_psikologi/<?= $row['id']; ?>" class="btn btn-secondary mr-2" target="_blank">Informed</a>

                                                                <?php if ($row['status'] == 3) : ?>
                                                                    <a href="<?= base_url('admin/print_form_pemeriksaan/' . $row['id']); ?>" class="btn btn-success mr-2" target="_blank">Pemeriksaan</a>
                                                                <?php else : ?>
                                                                    <a href="#" class="btn btn-secondary mr-2 notif-pemeriksaan">Pemeriksaan</a>
                                                                <?php endif; ?>

                                                                <?php if ($row['status'] == 3) : ?>
                                                                    <a href="<?= base_url('admin/print_invoice_by_pasien/' . $row['id']); ?>" class="btn btn-success mr-2" target="_blank">Invoice</a>
                                                                <?php else : ?>
                                                                    <a href="#" class="btn btn-secondary mr-2 notif-invoice">Invoice</a>
                                                                <?php endif; ?>
                                                                <a href="<?= base_url(); ?>admin/change_status/<?= $row['id']; ?>" class="btn btn-primary change-status mr-2" data-id="<?= $row['id']; ?>">Selesai</a>

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
                                                                                        <h3><?= $row['nama'] ?></h3>
                                                                                    </li>
                                                                                    <li class="list-group-item"> No.Riwayat : <?= $row['no_rm']; ?></li>
                                                                                    <li class="list-group-item"> NIK : <?= $row['nik'] ?></li>
                                                                                    <li class="list-group-item"> Tanggal Lahir : <?= $row['tanggal_lahir'] ?></li>
                                                                                    <li class="list-group-item"> Umur : <?= $row['umur'] ?></li>
                                                                                    <li class="list-group-item"> Jenis Kelamin : <?= $row['jenis_kelamin'] ?></li>
                                                                                    <li class="list-group-item"> Nomor Telepon : <?= $row['no_tlp'] ?></li>
                                                                                    <li class="list-group-item"> Dokter : <?= $row['nama_dokter'] ?></li>
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
            