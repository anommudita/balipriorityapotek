                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Tambah Obat</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">

                                <form action="<?=base_url('admin/tambah_obat')?>" method="post">
                                <!-- Nama obat-->
                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat</label>
                                    <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= set_value('nama_obat') ?>" placeholder="Masukan nama obat">
                                    <!-- notif error -->
                                    <?= form_error('nama_obat', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Harga Obat -->
                                <div class="form-group">
                                    <label for="harga_obat">Harga Obat</label>
                                    <input type="number" class="form-control" id="harga_obat" name="harga_obat" value="<?= set_value('harga_obat') ?>" placeholder="Masukan harga obat">
                                    <!-- notif error -->
                                    <?= form_error('harga_obat', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- button -->
                                <button type="submit" class="btn btn-primary mt-4 float-right">Tambah</button>
                                <a class="btn btn-danger mt-4 mr-3 float-right" href="<?= base_url('admin/jenisobat'); ?>" role="button">Batal</a>

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