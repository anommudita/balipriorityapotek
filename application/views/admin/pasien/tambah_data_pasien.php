                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Tambah Pasien</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">
                                <!-- <form action="" method="post"> -->
                                <?= form_open_multipart('admin/tambah_data_pasien') ?>

                                <!-- NIK -->
                                <div class="form-group">
                                    <label for="nik_pasien">NIK</label>
                                    <input type="number" class="form-control" id="nik_pasien" name="nik_pasien" value="<?= set_value('nik_pasien') ?>" placeholder="Masukan nomor nik pasien">
                                    <!-- notif error -->
                                    <?= form_error('nik_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label for="nama_pasien">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= set_value('nama_pasien') ?>" placeholder="Masukan nama pasien">
                                    <!-- notif error -->
                                    <?= form_error('nama_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="form-group">
                                    <label for="tanggal_lahir_pasien">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir_pasien" name="tanggal_lahir_pasien" value="<?= set_value('tanggal_lahir_pasien') ?>" placeholder="Masukan tanggal lahir pasien">
                                    <!-- notif error -->
                                    <?= form_error('tanggal_lahir_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Umur -->
                                <div class="form-group">
                                    <label for="umur_pasien">Umur</label>
                                    <input type="text" class="form-control" id="umur_pasien" name="umur_pasien" value="<?= set_value('umur_pasien') ?>" placeholder="Masukan umur pasien">
                                    <!-- notif error -->
                                    <?= form_error('umur_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="form-group">
                                    <label for="jenis_kelamin_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin_pasien" name="jenis_kelamin_pasien" required>
                                        <option value="">Pilih..</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Alamat -->
                                <div class="form-group">
                                    <label for="alamat_pasien">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" value="<?= set_value('alamat_pasien') ?>" placeholder="Masukan alamat pasien">
                                    <!-- notif error -->
                                    <?= form_error('alamat_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- No Telepon -->
                                <div class="form-group">
                                    <label for="no_tlp_pasien">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="no_tlp_pasien" name="no_tlp_pasien" value="<?= set_value('no_tlp_pasien') ?>" placeholder="Masukan nomor telepon pasien">
                                    <!-- notif error -->
                                    <?= form_error('no_tlp_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- button -->
                                <button type="submit" class="btn btn-primary mt-4 float-right">Tambah</button>
                                <a class="btn btn-danger mt-4 mr-3 float-right" href="<?= base_url('admin/pasien'); ?>" role="button">Batal</a>
                                </form>
                            </div>
                        </div>

                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->


                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End Main Content -->