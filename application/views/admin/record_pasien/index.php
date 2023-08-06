                <!-- Main Content-->
                <div class="container-fluid" class="d-flex flex-column">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Record Pasien</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <h6 class="m-0 font-weight-bold text-primary">Record Pasien</h6>
                                        </div>
                                        <div class="col-8 text-right"> <!-- Menggunakan col-4 untuk mengatur tata letak kolom -->
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#printby">
                                                Mencetak Data
                                                <i class="fa-solid fa-print"></i>
                                            </button>
                                            <!-- <a href="<?= base_url('admin/print_data_pasien') ?>" class="btn btn-secondary" target="_blank">Print</a> -->
                                            <a href="<?= base_url('admin/tambah_pasien') ?>" class="btn btn-primary">Tambah</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
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


                                        <!-- Flashdata Print By Date -->
                                        <?php if ($this->session->flashdata('flash_print_by_date')) : ?>
                                            <div class="col">
                                                <div class="row mt-2">
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">Data pasien by tanggal
                                                        <strong>gagal</strong> <?= $this->session->flashdata('flash_print_by_date'); ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Flashdata Print By NIk -->
                                        <?php if ($this->session->flashdata('flash_print_by_nik')) : ?>
                                            <div class="col">
                                                <div class="row mt-2">
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">Data pasien by NIK
                                                        <strong>gagal</strong> <?= $this->session->flashdata('flash_print_by_nik'); ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>


                                        <!-- Flashdata Print By Dokter -->
                                        <?php if ($this->session->flashdata('flash_print_by_dokter')) : ?>
                                            <div class="col">
                                                <div class="row mt-2">
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">Data pasien by dokter
                                                        <strong>gagal</strong> <?= $this->session->flashdata('flash_print_by_dokter'); ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>



                                        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                            <a href="<?= base_url('admin/recordpasien/') ?>" class="btn btn-success mr-3 mb-3">All Data</a>
                                            <?php foreach ($dokter as $row) : ?>
                                                <a href="<?= base_url('admin/dokter_record_pasien/' . $row['id']) ?>" class="btn btn-primary mr-3 mb-3"><?= $row['nama'] ?></a>
                                            <?php endforeach; ?>

                                            <thead>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:18%">Nomor Riwayat</th>
                                                    <th style="width:15%">Nama</th>
                                                    <th style="width:15%">Nomor Rekam Medis</th>
                                                    <th style="width:10%">No Telepon</th>
                                                    <th style="width:10%">Tanggal</th>
                                                    <th style="width:10%">Dokter</th>
                                                    <th style="width:20%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:18%">Nomor Riwayat</th>
                                                    <th style="width:15%">Nama</th>
                                                    <th style="width:15%">Nomor Rekam Medis</th>
                                                    <th style="width:10%">No Telepon</th>
                                                    <th style="width:10%">Tanggal</th>
                                                    <th style="width:10%">Dokter</th>
                                                    <th style="width:20%">Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php if (empty($all_pasien)) : ?>
                                                    <tr>
                                                        <td colspan="8">
                                                            <div class="alert alert-danger" role="alert">
                                                                Data tidak ditemukan!
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($all_pasien as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row['no_rm']; ?></td>
                                                        <td><?= $row['nama']; ?></td>
                                                        <td><?= $row['no_rekam_medis']; ?></td>
                                                        <td>
                                                            <?= $row['no_tlp'] ?>
                                                        </td>
                                                        <td><?= $row['date_created'] ?></td>
                                                        <td>
                                                            <?= $row['nama_dokter'] ?>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-row">
                                                                <a href="#" class="btn btn-success mr-2" data-toggle="modal" data-target="#detailModal<?= $row['id']; ?>" id="tombol-detail">Detail</a>
                                                                <a href="<?= base_url() ?>admin/edit_pasien/<?= $row['id']; ?>" class="btn btn-warning mr-2">Edit</a>
                                                                <a href="<?= base_url(); ?>admin/hapus_pasien/<?= $row['id']; ?>" class="btn btn-danger delete-pasien" data-id="<?= $row['id']; ?>">Hapus</a>
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
                                                                                    <li class="list-group-item"> Nomor Riwayat : <?= $row['no_rm']; ?></li>
                                                                                    <li class="list-group-item"> Nomor Rekam Medis : <?= $row['no_rekam_medis']; ?></li>
                                                                                    <li class="list-group-item"> NIK : <?= $row['nik'] ?></li>
                                                                                    <li class="list-group-item"> Tanggal Lahir : <?= $row['tanggal_lahir'] ?></li>
                                                                                    <li class="list-group-item"> Umur : <?= $row['umur'] ?></li>
                                                                                    <li class="list-group-item"> Jenis Kelamin : <?= $row['jenis_kelamin'] ?></li>
                                                                                    <li class="list-group-item"> Alamat : <?= $row['alamat'] ?></li>
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
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- /.container-fluid -->

                        <!-- Modal Pilihan -->
                        <div class="modal fade" id="printby" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Pilih print sesuai menu dibawah :</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-outline-warning mr-3" data-toggle="modal" data-target="#printbynik">
                                                Print By NIK
                                            </button>
                                            <button type="button" class="btn btn-outline-success mr-3" data-toggle="modal" data-target="#printbydokter">
                                                Print By Dokter
                                            </button>
                                            <button type="button" class="btn btn-outline-primary mr-3" data-toggle="modal" data-target="#printbytanggal">
                                                Print By Tanggal
                                            </button>
                                            <a href="<?= base_url('admin/print_record_pasien') ?>" class="btn btn-outline-secondary" target="_blank">Print Keseluruhan</a>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Box Print By Tanggal  -->
                        <div class="modal fade" id="printbytanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Print By Tanggal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open_multipart('admin/print_pasien_by') ?>
                                    <div class="modal-body">
                                        <!-- Dari tanggal  -->
                                        <div class="form-group">
                                            <label for="dari_tanggal">Dari Tanggal</label>
                                            <input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal" required>
                                        </div>

                                        <!-- Sampai tanggal  -->
                                        <div class="form-group">
                                            <label for="sampai_tanggal">Sampai Tanggal</label>
                                            <input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Print</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Box Print By NIK  -->
                        <div class="modal fade" id="printbynik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Print By Tanggal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open_multipart('admin/print_pasien_by') ?>
                                    <div class="modal-body">
                                        <!-- NIK -->
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukan nomor nik pasien" autofocus autocomplete="off">
                                            <!-- notif error -->
                                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small'); ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Print</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- Modal Box Print By Dokter  -->
                        <div class="modal fade" id="printbydokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Print By Tanggal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open_multipart('admin/print_pasien_by') ?>
                                    <div class="modal-body">
                                        <!-- Dokter -->
                                        <div class="form-group">
                                            <label for="dokter">Dokter</label>
                                            <select class="form-control" id="dokter" name="dokter">
                                                <option value="" id="value_dokter">Pilih..</option>
                                                <?php foreach ($dokter as $row) : ?>
                                                    <option value="<?= $row['id']; ?>" data-dokter="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('dokter', '<small class="text-danger pl-3">', '</small'); ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Print</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of Main Content -->
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End Main Content -->
                <!-- 
            