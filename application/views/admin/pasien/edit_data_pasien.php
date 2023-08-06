                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Edit Pasien</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">
                                <!-- <form action="" method="post"> -->
                                <?= form_open_multipart('admin/edit_data_pasien/' . $pasien['nik']) ?>

                                <!-- No Rekaman Medis -->
                                <div class="form-group">
                                    <label for="no_rekam_medis">Nomor Rekam Medis</label>
                                    <input type="number" class="form-control" id="no_rekam_medis" name="no_rekam_medis" value="<?= $pasien['no_rekam_medis'] ?>" readonly>
                                </div>

                                <!-- NIK -->
                                <div class="form-group">
                                    <label for="nik_pasien">NIK</label>
                                    <input type="number" class="form-control" id="nik_pasien" name="nik_pasien" value="<?= $pasien['nik'] ?>" placeholder="Masukan nomor nik pasien">
                                    <!-- notif error -->
                                    <?= form_error('nik_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label for="nama_pasien">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $pasien['nama'] ?>" placeholder="Masukan nama pasien">
                                    <!-- notif error -->
                                    <?= form_error('nama_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="form-group">
                                    <label for="tanggal_lahir_pasien">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir_pasien" name="tanggal_lahir_pasien" value="<?= $pasien['tanggal_lahir'] ?>" placeholder="Masukan tanggal lahir pasien">
                                    <!-- notif error -->
                                    <?= form_error('tanggal_lahir_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Umur -->
                                <div class="form-group">
                                    <label for="umur_pasien">Umur</label>
                                    <input type="text" class="form-control" id="umur_pasien" name="umur_pasien" value="<?= $pasien['umur'] ?>" placeholder="Masukan umur pasien">
                                    <!-- notif error -->
                                    <?= form_error('umur_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="form-group">
                                    <label for="jenis_kelamin_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin_pasien" name="jenis_kelamin_pasien" required>
                                        <option value="">Pilih..</option>
                                        <?php if ($pasien['jenis_kelamin'] == "Perempuan") : ?>
                                            <option value='Laki-laki'>Laki-laki</option>
                                            <option value='Perempuan' selected>Perempuan</option>
                                        <?php endif ?>

                                        <?php if ($pasien['jenis_kelamin'] == "Laki-laki") : ?>
                                            <option value='Laki-laki' selected>Laki-laki</option>
                                            <option value='Perempuan'>Perempuan</option>
                                        <?php endif ?>
                                    </select>
                                    <?= form_error('jenis_kelamin_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Alamat -->
                                <div class="form-group">
                                    <label for="alamat_pasien">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" value="<?= $pasien['alamat'] ?>" placeholder="Masukan alamat pasien">
                                    <!-- notif error -->
                                    <?= form_error('alamat_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- No Telepon -->
                                <div class="form-group">
                                    <label for="no_tlp_pasien">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="no_tlp_pasien" name="no_tlp_pasien" value="<?= $pasien['no_telepon'] ?>" placeholder="Masukan nomor telepon pasien">
                                    <!-- notif error -->
                                    <?= form_error('no_tlp_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- button -->
                                <button type="submit" class="btn btn-primary mt-4 float-right">Simpan</button>
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