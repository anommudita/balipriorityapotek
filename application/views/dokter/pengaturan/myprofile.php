<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>


    <!-- Flashdata! -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="col">
            <div class="row mt-2">
                <div class="alert alert-success alert-dismissible fade show" role="alert">Data Anda telah
                    <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/dokter/profile/') . $user['foto']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <h5 class="card-title">Username : <?= $user['username']; ?></h5>
                    <p class="card-text"><small class="text-muted">Akun dibuat sejak <?= $user['date_created']; ?></small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>