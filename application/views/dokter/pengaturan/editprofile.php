<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- notif eror -->
            <?= $this->session->flashdata('message'); ?>

            <!-- form untuk upload gambar -->
            <?= form_open_multipart('dokter/editprofile'); ?>

            <!-- username-->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <!-- nama -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <!-- foto -->
            <div class="form-group row">
                <div class="col-sm-2">Foto</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3" id="preview">
                            <img src="<?= base_url('assets/img/dokter/profile/') . $user['foto'] ?>" alt="" class="img-thumbnail">
                        </div>
                        <div class=" col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="getImagePreview(event)">
                                <label class="custom-file-label" for="gambar">Pilih gambar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

            </form>

        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>