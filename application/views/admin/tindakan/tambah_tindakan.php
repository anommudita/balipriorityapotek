                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Tambah Tindakan</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">

                                <form action="<?= base_url('admin/tambah_tindakan') ?>" method="post">
                                    <!--Tindakan-->
                                    <div class="form-group">
                                        <label for="tindakan">Tindakan</label>
                                        <input type="text" class="form-control" id="tindakan" name="tindakan" value="<?= set_value('tindakan') ?>" placeholder="Masukan nama tindakan">
                                        <!-- notif error -->
                                        <?= form_error('tindakan', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>

                                    <!-- Biaya Tindakan -->
                                    <div class="form-group">
                                        <label for="biaya">Biaya Tindakan</label>
                                        <input type="number" class="form-control" id="biaya" name="biaya" value="<?= set_value('biaya') ?>" placeholder="Masukan biaya tindakan">
                                        <!-- notif error -->
                                        <?= form_error('biaya', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>

                                    <!-- button -->
                                    <button type="submit" class="btn btn-primary mt-4 float-right">Tambah</button>
                                    <a class="btn btn-danger mt-4 mr-3 float-right" href="<?= base_url('admin/tindakan'); ?>" role="button">Batal</a>

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