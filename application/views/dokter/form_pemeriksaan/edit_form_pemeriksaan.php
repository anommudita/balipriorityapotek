                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Edit Form Pemeriksaan</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">
                                <!-- <form action="" method="post"> -->
                                <?= form_open_multipart('dokter/edit_form_pemeriksaan/' . $form_pemeriksaan['id']) ?>


                                <!-- Nomor Rekam Medis -->
                                <div class="form-group">
                                    <label for="no_rekam_medis">Nomor Rekam Medis</label>
                                    <input class="form-control" type="text" id="no_rekam_medis" name="no_rekam_medis" value="<?= $pasien['no_rekam_medis']; ?>" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="nama_pasien">Nama Pasien</label>
                                    <input class="form-control" type="text" id="nama_pasien" name="nama_pasien" value="<?= $pasien['nama']; ?>" readonly>
                                    <?= form_error('nama_pasien', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>


                                <!-- Subjectif -->
                                <div class="form-group">
                                    <label for="subjektif">Subjektif</label>
                                    <textarea class="form-control" id="subjektif" name="subjektif" rows="3"><?= $form_pemeriksaan['S'] ?>
                                    </textarea>
                                    <!-- notif error -->
                                    <?= form_error('subjektif', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Objektif -->
                                <div class="form-group">
                                    <label for="objektif">Objektif</label>
                                    <textarea class="form-control" id="objektif" name="objektif" rows="3"><?= $form_pemeriksaan['O'] ?></textarea>
                                    <!-- notif error -->
                                    <?= form_error('objektif', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Assement -->
                                <div class="form-group">
                                    <label for="assesment">Assesment</label>
                                    <textarea class="form-control" id="assesment" name="assesment" rows="3"><?= $form_pemeriksaan['A'] ?></textarea>
                                    <!-- notif error -->
                                    <?= form_error('assesment', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Plan -->
                                <div class="form-group">
                                    <label for="plan">Plan</label>
                                    <textarea class="form-control" id="plan" name="plan" rows="3"><?= $form_pemeriksaan['P'] ?></textarea>
                                    <!-- notif error -->
                                    <?= form_error('plan', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>
                                <!-- Pemeriksa -->
                                <!-- <div class="form-group">
                                    <label for="dokter">Pemeriksa</label>
                                    <select class="form-control" id="dokter" name="dokter">
                                        <option value="<?= $form_pemeriksaan['id_dokter'] ?>" id=""><?= $form_pemeriksaan['nama_dokter'] ?></option>
                                        <?php foreach ($dokter_not_id as $row) : ?>
                                            <option value="<?= $row['id']; ?>" data-dokter="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('dokter', '<small class="text-danger pl-3">', '</small'); ?>
                                </div> -->

                                <div class="form-group">
                                    <label for="dokter">Pemeriksa</label>
                                    <input class="form-control" type="text" id="dokter" name="dokter" value="<?= $pasien['nama_dokter'] ?>" readonly>
                                    <?= form_error('dokter', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- id_pasien -->
                                <div class="form-group">
                                    <input class="form-control" type="text" id="id_pasien" name="id_pasien" value="<?= $form_pemeriksaan['id_pasien'] ?>" readonly hidden>
                                </div>

                                <!-- id_dokter -->
                                <div class="form-group">
                                    <input class="form-control" type="text" id="id_dokter" name="id_dokter" value="<?= $form_pemeriksaan['id_dokter'] ?>" readonly hidden>
                                </div>


                                <!-- button -->
                                <button type="submit" class="btn btn-primary mt-4 float-right">Simpan</button>
                                <a class="btn btn-danger mt-4 mr-3 float-right" href="<?= base_url('dokter/antrianpasien'); ?>" role="button">Batal</a>
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