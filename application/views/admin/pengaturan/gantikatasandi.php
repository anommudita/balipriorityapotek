                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <h1 class="h3 mb-2 text-gray-800 mt-5 mb-3">Ganti Kata Sandi</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">

                                <form method="POST" action="<?= base_url('admin/gantikatasandi') ?>">
                                    <!-- flash data -->
                                    <?= $this->session->flashdata('message'); ?>
                                    <!-- Password Sekarang -->
                                    <div class="form-group">
                                        <label for="passwordcurrent">Password Sekarang</label>
                                        <input type="password" class="form-control" id="passwordcurrent" name="passwordcurrent" placeholder="Masukan password sekarang">
                                        <!-- notif error -->
                                        <?= form_error('passwordcurrent', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>

                                    <!-- Password Baru -->
                                    <div class="form-group">
                                        <label for="passwordnew">Password Baru</label>
                                        <input type="password" class="form-control" id="passwordnew" name="passwordnew" placeholder="Masukan password baru">
                                        <?= form_error('passwordnew', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>

                                    <!-- Password Konfirmasi -->
                                    <div class="form-group">
                                        <label for="passwordconfirm">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm" placeholder="Masukan ulang password">
                                    </div>
                                    <p class="text-danger">* Kosongkan password jika tidak ingin diganti</p>
                                    <button type="submit" class="btn btn-primary mt-4 float-right">Simpan</button>
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