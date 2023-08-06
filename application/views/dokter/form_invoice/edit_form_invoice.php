                <!-- Main Content-->
                <div class="container-fluid">

                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800 mt-2 mb-3">Edit Form Invoice</h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 p-4 col-12 ">
                                <form action="<?= base_url('dokter/edit_form_invoice/' . $pasien['id']) ?>" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <!-- Tindakan 1 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="tindakan1">Tindakan 1</label>
                                                        <select class="form-control" id="tindakan1" name="tindakan1" onchange="processTindakan1()">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['tindakan1'] ?>" selected><?= $form_invoice['nama_tindakan1'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['tindakan1']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_tindakan1']; // nama yang dipilih
                                                            foreach ($all_tindakan as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_tindakan'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="hargatindakan1">Harga Tindakan 1</label>
                                                        <input type="text" class="form-control" id="hargatindakan1" name="hargatindakan1" placeholder="Masukan harga tindakan 1">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Diskon Tindakan 1 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diskon_tindakan1">Diskon Tindakan 1 (%)</label>
                                                        <input type="text" class="form-control" id="diskon_tindakan1" name="diskon_tindakan1" placeholder="Masukan diskon tindakan 1" value="<?= $form_invoice['diskon1'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_diskon">Harga setelah diskon</label>
                                                        <input type="text" class="form-control" id="harga_diskon" name="harga_diskon" placeholder="Harga otomatis berkurang" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tindakan 2 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="tindakan2">Tindakan 2</label>
                                                        <select class="form-control" id="tindakan2" name="tindakan2" onchange="processTindakan2()">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['tindakan2'] ?>" selected><?= $form_invoice['nama_tindakan2'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['tindakan2']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_tindakan2']; // nama yang dipilih
                                                            foreach ($all_tindakan as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_tindakan'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="hargatindakan2">Harga Tindakan 2</label>
                                                        <input type="text" class="form-control" id="hargatindakan2" name="hargatindakan2" placeholder="Masukan harga tindakan 2">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Diskon Tindakan 2 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diskon_tindakan2">Diskon Tindakan 2 (%)</label>
                                                        <input type="text" class="form-control" id="diskon_tindakan2" name="diskon_tindakan2" placeholder="Masukan diskon tindakan 2" value="<?= $form_invoice['diskon2'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_diskon2">Harga setelah diskon</label>
                                                        <input type="text" class="form-control" id="harga_diskon2" name="harga_diskon2" placeholder="Harga otomatis berkurang" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tindakan 3 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="tindakan3">Tindakan 3</label>
                                                        <select class="form-control" id="tindakan3" name="tindakan3" onchange="processTindakan3()">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['tindakan3'] ?>" selected><?= $form_invoice['nama_tindakan3'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['tindakan3']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_tindakan3']; // nama yang dipilih
                                                            foreach ($all_tindakan as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_tindakan'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="hargatindakan3">Harga Tindakan 3</label>
                                                        <input type="text" class="form-control" id="hargatindakan3" name="hargatindakan3" placeholder="Masukan harga tindakan 3">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Diskon Tindakan 3 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diskon_tindakan3">Diskon Tindakan 3 (%)</label>
                                                        <input type="text" class="form-control" id="diskon_tindakan3" name="diskon_tindakan3" placeholder="Masukan diskon tindakan 3" value="<?= $form_invoice['diskon3'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_diskon3">Harga setelah diskon</label>
                                                        <input type="text" class="form-control" id="harga_diskon3" name="harga_diskon3" placeholder="Harga otomatis berkurang" readonly>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tindakan 4 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="tindakan4">Tindakan 4</label>
                                                        <select class="form-control" id="tindakan4" name="tindakan4" onchange="processTindakan4()">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['tindakan4'] ?>" selected><?= $form_invoice['nama_tindakan4'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['tindakan4']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_tindakan4']; // nama yang dipilih
                                                            foreach ($all_tindakan as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_tindakan'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="hargatindakan4">Harga Tindakan 4</label>
                                                        <input type="text" class="form-control" id="hargatindakan4" name="hargatindakan4" placeholder="Masukan harga tindakan 4">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Diskon Tindakan 4 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diskon_tindakan4">Diskon Tindakan 4 (%)</label>
                                                        <input type="text" class="form-control" id="diskon_tindakan4" name="diskon_tindakan4" placeholder="Masukan diskon tindakan 4" value="<?= $form_invoice['diskon4'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_diskon4">Harga setelah diskon</label>
                                                        <input type="text" class="form-control" id="harga_diskon4" name="harga_diskon4" placeholder="Harga otomatis berkurang" readonly>

                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Tindakan 5 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="tindakan5">Tindakan 5</label>
                                                        <select class="form-control" id="tindakan5" name="tindakan5" onchange="processTindakan5()">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['tindakan5'] ?>" selected><?= $form_invoice['nama_tindakan5'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['tindakan5']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_tindakan5']; // nama yang dipilih
                                                            foreach ($all_tindakan as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_tindakan'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="hargatindakan5">Harga Tindakan 5</label>
                                                        <input type="text" class="form-control" id="hargatindakan5" name="hargatindakan5" placeholder="Masukan harga tindakan 5">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Diskon Tindakan 5 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diskon_tindakan5">Diskon Tindakan 5 (%)</label>
                                                        <input type="text" class="form-control" id="diskon_tindakan5" name="diskon_tindakan5" placeholder="Masukan diskon tindakan 5" value="<?= $form_invoice['diskon5'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_diskon5">Harga setelah diskon</label>
                                                        <input type="text" class="form-control" id="harga_diskon5" name="harga_diskon5" placeholder="Harga otomatis berkurang" readonly>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- line vertikal -->
                                        <div class="vl" style="height: 900px;"></div>
                                        <div class="col">
                                            <!-- Jenis Obat 0 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="obat">Jenis Obat</label>
                                                        <select class="form-control" id="obat" name="obat">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['jenis_obat'] ?>" selected><?= $form_invoice['nama_obat'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['jenis_obat']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_obat']; // nama yang dipilih
                                                            foreach ($all_obat as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_obat'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan jumlah" value="<?= $form_invoice['jumlah_obat'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_obat">Harga</label>
                                                        <input type="text" class="form-control" id="harga_obat" name="harga_obat" placeholder="harga obat" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- jenis obat 2 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="obat1">Jenis Obat</label>
                                                        <select class="form-control" id="obat1" name="obat1">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['jenis_obat2'] ?>" selected><?= $form_invoice['nama_obat2'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['jenis_obat2']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_obat2']; // nama yang dipilih
                                                            foreach ($all_obat as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_obat'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah1" name="jumlah1" placeholder="Masukan jumlah" value="<?= $form_invoice['jumlah_obat2'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_obat">Harga</label>
                                                        <input type="text" class="form-control" id="harga_obat1" name="harga_obat1" placeholder="harga obat" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- jenis obat 3 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="obat">Jenis Obat</label>
                                                        <select class="form-control" id="obat2" name="obat2">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['jenis_obat3'] ?>" selected><?= $form_invoice['nama_obat3'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['jenis_obat3']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_obat3']; // nama yang dipilih
                                                            foreach ($all_obat as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_obat'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah2" name="jumlah2" placeholder="Masukan jumlah" value="<?= $form_invoice['jumlah_obat3'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_obat">Harga</label>
                                                        <input type="text" class="form-control" id="harga_obat2" name="harga_obat2" placeholder="harga obat" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- jenis obat 4 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="obat">Jenis Obat</label>
                                                        <select class="form-control" id="obat3" name="obat3">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['jenis_obat4'] ?>" selected><?= $form_invoice['nama_obat4'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['jenis_obat4']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_obat4']; // nama yang dipilih
                                                            foreach ($all_obat as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_obat'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah3" name="jumlah3" placeholder="Masukan jumlah" value="<?= $form_invoice['jumlah_obat4'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_obat">Harga</label>
                                                        <input type="text" class="form-control" id="harga_obat3" name="harga_obat3" placeholder="harga obat" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- jenis obat 5 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="obat">Jenis Obat</label>
                                                        <select class="form-control" id="obat4" name="obat4">
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['jenis_obat5'] ?>" selected><?= $form_invoice['nama_obat5'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['jenis_obat5']; // id yang dipilih
                                                            $selectedText = $form_invoice['nama_obat5']; // nama yang dipilih
                                                            foreach ($all_obat as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['nama_obat'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>"><?= $optionText ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah4" name="jumlah4" placeholder="Masukan jumlah" value="<?= $form_invoice['jumlah_obat5'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="harga_obat">Harga</label>
                                                        <input type="text" class="form-control" id="harga_obat4" name="harga_obat4" placeholder="harga obat" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- pajak -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="tax">Pajak</label>
                                                        <select class="form-control" id="tax" name="tax" required>
                                                            <option value="0">Pilih..</option>
                                                            <option value="<?= $form_invoice['id_pajak'] ?>" data-pajak="<?= $form_invoice['pajak'] ?>"><?= $form_invoice['pajak'] ?> - <?= $form_invoice['keterangan'] ?></option>
                                                            <?php
                                                            $selectedValue = $form_invoice['id_pajak']; // id yang dipilih
                                                            $selectedText = $form_invoice['pajak']; // nama yang dipilih
                                                            foreach ($all_pajak as $row) :
                                                                $optionValue = $row['id'];
                                                                $optionText = $row['pajak'];
                                                                if ($optionValue === $selectedValue) {
                                                                    continue; // Skip the selected option
                                                                }
                                                            ?>
                                                                <option value="<?= $optionValue ?>" data-pajak="<?= $row['pajak']; ?>"><?= $optionText ?> - <?= $row['keterangan'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <!-- notif error -->
                                                        <?= form_error('tax', '<small class="text-danger">', '</small'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Total -->
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input type="number" class="form-control" id="total" name="total" placeholder="Total Keseluruhan" value="<?= $form_invoice['total'] ?>" readonly>
                                            </div>

                                            <!-- Nomor Invoice -->
                                            <div class="form-group">
                                                <label for="no_invoice">Nomor Invoice</label>
                                                <input type="text" class="form-control" id="no_invoice" name="no_invoice" value="<?= $form_invoice['nomor_invoice']; ?>" readonly>
                                            </div>

                                            <!-- Nama Pasien -->
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $pasien['nama_pasien'] ?>" readonly>
                                            </div>

                                            <!-- Nomor Rekam Medis -->
                                            <div class="form-group">
                                                <label for="no_rekam_medis" hidden>Nomor Rekam Medis</label>
                                                <input class="form-control" type="text" id="no_rekam_medis" name="no_rekam_medis" value="<?= $pasien['no_rekam_medis']; ?>" hidden>
                                            </div>

                                            <div class="col mt-5 button-container">
                                                <!-- button -->
                                                <button type="submit" class="btn btn-primary mt-4 float-right">Simpan</button>
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