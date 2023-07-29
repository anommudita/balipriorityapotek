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
                                <?= form_open_multipart('dokter/edit_pasien/'. $pasien['id']) ?>

                                <!-- Nomor Riwayat -->
                                <div class="form-group">
                                    <label for="no_rm">Nomor Riwayat</label>
                                    <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?= $pasien['no_rm'] ?>" placeholder="Masukan nomor riwayat" readonly>
                                    <!-- notif error -->
                                    <?= form_error('no_rm', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- NIK -->
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" value="<?= $pasien['nik'] ?>" placeholder="Masukan nomor nik pasien">
                                    <!-- notif error -->
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $pasien['nama'] ?>" placeholder="Masukan nama pasien">
                                    <!-- notif error -->
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $pasien['tanggal_lahir'] ?>" placeholder="Masukan tanggal lahir pasien">
                                    <!-- notif error -->
                                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Umur -->
                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input type="number" class="form-control" id="umur" name="umur" value="<?= $pasien['umur'] ?>" placeholder="Masukan umur pasien">
                                    <!-- notif error -->
                                    <?= form_error('umur', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Alamat -->
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pasien['alamat'] ?>" placeholder="Masukan alamat pasien">
                                    <!-- notif error -->
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- No Telepon -->
                                <div class="form-group">
                                    <label for="no_tlp">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="no_tlp" name="no_tlp" value="<?= $pasien['no_tlp'] ?>" placeholder="Masukan nomor telepon pasien">
                                    <!-- notif error -->
                                    <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- button -->
                                <button type="submit" class="btn btn-primary mt-4 float-right">Simpan</button>
                                <a class="btn btn-danger mt-4 mr-3 float-right" href="<?= base_url('dokter/recordpasien'); ?>" role="button">Batal</a>

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