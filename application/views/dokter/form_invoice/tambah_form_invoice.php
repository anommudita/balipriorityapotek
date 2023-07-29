                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Tambah Form Invoice</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 ">
                                <form action="<?= base_url('dokter/tambah_form_invoice/' . $pasien['id']) ?>" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <div id="formContainer1">

                                                <div class="form-tindakan">
                                                    <!-- Tindakan 1 -->
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="tindakan1">Tindakan 1</label>
                                                                <select class="form-control" id="tindakan1" name="tindakan1">
                                                                    <option value="0">Pilih..</option>
                                                                    <?php foreach ($all_tindakan as $row) : ?>
                                                                        <option value="<?= $row['id']; ?>"><?= $row['nama_tindakan']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <!-- notif error -->
                                                                <?= form_error('tindakan1', '<small class="text-danger">', '</small'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="hargatindakan1">Harga Tindakan 1</label>
                                                                <input type="text" class="form-control" id="hargatindakan1" name="hargatindakan1" placeholder="Masukan harga tindakan 1">
                                                                <!-- notif error -->
                                                                <?= form_error('hargatindakan1', '<small class="text-danger">', '</small'); ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Diskon Tindakan 1 -->
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="diskon_tindakan1">Diskon Tindakan 1 (%)</label>
                                                                <input type="text" class="form-control" id="diskon_tindakan1" name="diskon_tindakan1" placeholder="Masukan diskon tindakan 1">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="harga_diskon">Harga setelah diskon</label>
                                                                <input type="text" class="form-control" id="harga_diskon" name="harga_diskon" placeholder="Harga otomatis berkurang" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col ">
                                                    <button type="button" class="btn btn-sm btn-primary ml-1 mr-1" onclick="tambahFormTindakan()">+</button>
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="hapusFormTindakan()">-</button>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- line vertikal -->
                                        <div class="vl" id="verticalLine"></div>
                                        <div class="col">
                                            <!-- Jenis Obat -->
                                            <div id="formContainer">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="obat">Jenis Obat</label>
                                                            <select class="form-control" id="obat" name="obat">
                                                                <option value="0">Pilih..</option>
                                                                <?php foreach ($all_obat as $row) : ?>
                                                                    <option value="<?= $row['id']; ?>"><?= $row['nama_obat']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <!-- notif error -->
                                                            <?= form_error('obat', '<small class="text-danger">', '</small'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="jumlah">Jumlah</label>
                                                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan jumlah">
                                                            <!-- notif error -->
                                                            <?= form_error('jumlah', '<small class="text-danger">', '</small'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="harga_obat">Harga</label>
                                                            <input type="text" class="form-control" id="harga_obat" name="harga_obat" placeholder="harga obat" readonly>
                                                            <!-- notif error -->
                                                            <?= form_error('harga_obat', '<small class="text-danger">', '</small'); ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col ">
                                                    <button type="button" class="btn btn-sm btn-primary ml-1 mr-1" onclick="tambahForm()">+</button>
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="hapusForm()">-</button>
                                                </div>
                                            </div>

                                            <!-- pajak -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="tax">Pajak</label>
                                                        <select class="form-control" id="tax" name="tax" required>
                                                            <option value="">Pilih..</option>
                                                            <?php foreach ($all_pajak as $row) : ?>
                                                                <option value="<?= $row['id']; ?>" data-pajak="<?= $row['pajak']; ?>"> <?= $row['pajak']; ?> - <?= $row['keterangan']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <!-- notif error -->
                                                        <?= form_error('pajak', '<small class="text-danger">', '</small'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total -->
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input type="number" class="form-control" id="total" name="total" placeholder="Total Keseluruhan" readonly>
                                            </div>

                                            <!-- Nomor Invoice -->
                                            <div class="form-group">
                                                <label for="no_invoice">Nomor Invoice</label>
                                                <input type="text" class="form-control" id="no_invoice" name="no_invoice" value="<?= $no_invoice; ?>" readonly>
                                            </div>

                                            <!-- Nama Pasien -->
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $pasien['nama_pasien'] ?>" readonly>
                                            </div>


                                            <div class="col mt-5">
                                                <!-- button -->
                                                <button type="submit" class="btn btn-primary mt-4 float-right">Tambah</button>
                                                <a class="btn btn-danger mt-4 mr-3 float-right" href="<?= base_url('dokter/antrianpasien'); ?>" role="button">Batal</a>
                                            </div>
                                        </div>
                                    </div>
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