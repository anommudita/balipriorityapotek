<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7 mt-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row ">
                        <div class="col-lg ">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                                </div>

                                <div class="text-center rounded mx-auto d-block mb-3">
                                    <img src="<?= base_url('assets/img/') ?>logobalipriorityapotek.png" alt="" width="350px">
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">

                                    <!-- username -->
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan username" value="<?= set_value('username') ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <!-- password -->
                                    <div class="form-group password-wrapper">
                                        <input type="password" class="form-control form-control-user password-toggle" id="password" name="password" placeholder="Masukan password">

                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="sumbit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>