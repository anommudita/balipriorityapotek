                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Tambah pajak</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">

                                <form action="<?= base_url('admin/tambah_pajak') ?>" method="post">
                                    <!-- Pajak-->
                                    <div class="form-group">
                                        <label for="pajak">Nominal Pajak</label>
                                        <input type="text" class="form-control" id="pajak" name="pajak" value="<?= set_value('pajak') ?>" placeholder="Masukan nominal pajak">
                                        <!-- notif error -->
                                        <?= form_error('pajak', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                        <!-- notif error -->
                                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>

                                    <!-- button -->
                                    <button type="submit" class="btn btn-primary mt-4 float-right">Tambah</button>
                                    <a class="btn btn-danger mt-4 mr-3 float-right" href="<?= base_url('admin/pajak'); ?>" role="button">Batal</a>

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