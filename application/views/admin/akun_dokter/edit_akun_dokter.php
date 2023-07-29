                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Edit Akun Dokter</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 col-lg-8">
                                <!-- <form action="" method="post"> -->
                                <?= form_open_multipart('admin/edit_akun_dokter/' . $user_dokter['id']) ?>

                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label for="nama">Nama Dokter</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user_dokter['nama'] ?>" placeholder="Masukan nama dokter">
                                    <!-- notif error -->
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Username -->
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user_dokter['username'] ?>" placeholder="Masukan username">
                                    <!-- notif error -->
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="passwordnew" name="passwordnew" placeholder="Masukan password">
                                    <!-- notif error -->
                                    <?= form_error('passwordnew', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>

                                <!-- Gambar atau foto -->
                                <div class="form-group">
                                    <label for="gambar">Foto Dokter</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3 pl-1" id="preview">
                                                <img src="<?= base_url('assets/img/dokter/profile/').$user_dokter['foto'] ?>" alt="profile_dokter" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9 pr-1">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="getImagePreview(event)">
                                                    <label class="custom-file-label" for="gambar">Pilih file..</label>
                                                    <small class="text-danger pl-3">Gambar boleh dikosongkan! dan format gambar png, jpeg, gif, dan heic</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- button -->
                                <button type="submit" class="btn btn-primary mt-4 float-right">Simpan</button>
                                <a class="btn btn-danger mt-4 mr-3 float-right" href="<?= base_url('admin/akun_dokter'); ?>" role="button">Batal</a>

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