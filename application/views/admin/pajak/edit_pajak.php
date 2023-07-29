                <!-- Main Content-->
                <div class="container-fluid">
                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Edit Pajak</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">

                                <form action="<?= base_url('admin/edit_pajak/' . $pajak['id']) ?>" method="post">
                                    <!-- Pajak-->
                                    <div class="form-group">
                                        <label for="pajak">Nominal Pajak</label>
                                        <input type="text" class="form-control" id="pajak" name="pajak" value="<?= $pajak['pajak']; ?>" placeholder="Masukan nominal pajak">
                                        <!-- notif error -->
                                        <?= form_error('nama_obat', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>
                                    <!-- Keterangan -->
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?=$pajak['keterangan']?></textarea>
                                        <!-- notif error -->
                                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>

                                    <!-- button -->
                                    <button type="submit" class="btn btn-primary mt-4 float-right">Simpan</button>
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