                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                                <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
                            </div>

                            <!-- <h1 id="rela-time-clock"></h1>
                            <div id="real-time-clock"></div> -->

                            <!-- Content Row -->
                            <div class="row">

                                <!-- Card Dokter -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Akun Dokter</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_dokter; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Record -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Record Pasien</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_pasien ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Antrian Pasien -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Antrian Pasien</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_antrian ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-id-card fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Tindakan -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tindakan</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_tindakan ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-sharp fa-solid fa-user-check fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Card Jenis Obat -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jenis Obat</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_obat ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-solid fa-capsules fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pasien -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pasien</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_data_pasien ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Pajak -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pajak</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_pajak ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-solid fa-money-bill fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Invoice -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Riwayat Invoice</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_invoice ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-solid fa-clipboard fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Content Row -->
                            <div class="row">


                                <div class="col-lg-6 ">
                                    <!-- Illustrations -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Pemberitahuan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/system/') ?>alert.svg" alt="">
                                            </div>
                                            <p>Untuk meminimalisir kesalahan pada sistem, sebaiknya membaca <strong>aturan penggunaan sistem</strong> yang berlaku.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <!-- Illustrations -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Aturan Penggunaan</h6>
                                        </div>
                                        <div class="card-body">
                                            <p>Aturan sistem yang berlaku :</p>
                                            <ol>
                                                <li>Jika Anda pergi ke halaman fitur dan data masih kosong, klik tombol "ok" pada notifikasi yang muncul.</li>
                                                <li>Selama proses upload data atau gambar berlangsung, jangan melakukan pemutaran ulang (refresh) halaman.
                                                </li>
                                                <li>Pastikan setiap kolom diisi sesuai dengan data yang diminta.</li>
                                                <li>Anda diizinkan mencetak pemeriksaan dan invoice jika tombol periksa dan tombol invoice telah berubah menjadi warna hijau.</li>
                                                <li>Apabila dokter lupa passwordnya, mereka dapat mengganti password akun dokter.</li>
                                                <li>Setelah selesai menggunakan sistem, disarankan untuk logout terlebih dahulu.</li>
                                            </ol>
                                            <p>Catatan :</p>
                                            <p>Jangan lupa untuk memperbaharui aturan penggunaan ketika sistem diperbaiki atau diperbaharui.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->


                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End Main Content -->