<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bali Priority Apotek <?= date("Y") ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tekan Logout jika anda ingin keluar dari sistem</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/loader-hander.js"></script>



<!-- Datatables Pluginss -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/datatables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/datatables.js"></script>

<!-- Datatables Script -->
<!-- <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script> -->

<!-- sweetalert  -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="<?= base_url('assets/') ?>js/sweetalert2/sweetalert2.all.min.js"></script>

<script src="<?= base_url('assets/'); ?>js/sweetalert2/myscript.js"></script>

<!-- Script untuk upload gambat agar terlihat ditampilan inputnya -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>


<!-- script untuk preview gambar -->
<script>
    function getImagePreview(event) {
        var image = URL.createObjectURL(event.target.files[0]);
        var iamgediv = document.getElementById('preview')

        var newImage = document.createElement('img');
        iamgediv.innerHTML = '';
        newImage.src = image;
        newImage.style.width = '100%';

        // Menambahkan class "img-thumbnail" pada elemen gambar
        newImage.classList.add('img-thumbnail');

        iamgediv.appendChild(newImage);
    }
</script>


<!-- Data histori untuk tambah data -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Bind a function to the input event of the NIK field
        $('#nik').on('input', function() {
            var nik = $(this).val();
            // Make an AJAX request to retrieve historical data
            $.ajax({
                url: '<?= base_url('dokter/get_historical_data'); ?>',
                method: 'POST',
                data: {
                    nik: nik
                },
                dataType: 'json',
                success: function(response) {
                    // Process the response and populate the form fields with historical data
                    if (response.success) {
                        // Populate form fields with historical data
                        $('#nama').val(response.data.nama);
                        $('#tanggal_lahir').val(response.data.tanggal_lahir);
                        $('#umur').val(response.data.umur);
                        $('#alamat').val(response.data.alamat);
                        $('#no_tlp').val(response.data.no_tlp);
                    } else {
                        // Clear form fields if no historical data found
                        $('#nama').val('');
                        $('#tanggal_lahir').val('');
                        $('#umur').val('');
                        $('#alamat').val('');
                        $('#no_tlp').val('');
                    }
                }
            });
        });
    });
</script>



<!-- Script Untuk Mencari Nilai Umur dari Nilai tanggal lahir -->
<script>
    document.getElementById('tanggal_lahir').addEventListener('change', function() {
        var tanggalLahir = this.value;
        var today = new Date();
        var birthDate = new Date(tanggalLahir);
        var age = today.getFullYear() - birthDate.getFullYear();

        // Jika ulang tahun belum terjadi pada tahun ini, kurangi umur satu tahun
        var monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        document.getElementById('umur').value = age;
    });
</script>


<!-- Script waktu real time -->
<script>
    function updateTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Menambahkan nol pada angka tunggal
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // Mendapatkan elemen dengan id 'real-time-clock' dan memperbarui nilainya
        document.getElementById('real-time-clock').innerHTML = hours + ":" + minutes + ":" + seconds;

        // Memperbarui waktu setiap detik (1000 milidetik)
        setTimeout(updateTime, 1000);
    }

    // Memanggil fungsi updateTime saat halaman selesai dimuat
    window.onload = function() {
        updateTime();
    };
</script>

<!-- script untuk seleksi data yang akan ditampilkan (tindakan1) versi manualnya -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Tindakan 1
    $(document).ready(function() {
        $('#tindakan1').on('change', function() {
            var tindakan1 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getTindakan'); ?>",
                type: "POST",
                data: {
                    tindakanId: tindakan1
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#hargatindakan1').val(data);
                        $('#harga_diskon').val(data);
                    } else {
                        $('#hargatindakan1').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // diskon untuk tindakan 1
    $(document).ready(function() {
        $('#tindakan1').on('change', function() {
            var hargaTindakan1 = $('#hargatindakan1').val();
            var diskonTindakan1 = $('#diskon_tindakan1').val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon').val(hargaDiskon);
        });

        $('#diskon_tindakan1').on('input', function() {
            var hargaTindakan1 = $('#hargatindakan1').val();
            var diskonTindakan1 = $(this).val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon').val(hargaDiskon);
        });
    });


    // Tindakan 2
    $(document).ready(function() {
        $('#tindakan2').on('change', function() {
            var tindakan1 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getTindakan'); ?>",
                type: "POST",
                data: {
                    tindakanId: tindakan1
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#hargatindakan2').val(data);
                        $('#harga_diskon2').val(data);
                    } else {
                        $('#hargatindakan2').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // diskon untuk tindakan 2
    $(document).ready(function() {
        $('#tindakan2').on('change', function() {
            var hargaTindakan1 = $('#hargatindakan2').val();
            var diskonTindakan1 = $('#diskon_tindakan2').val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon2').val(hargaDiskon);
        });

        $('#diskon_tindakan2').on('input', function() {
            var hargaTindakan1 = $('#hargatindakan2').val();
            var diskonTindakan1 = $(this).val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon2').val(hargaDiskon);
        });
    });

    // Tindakan 3
    $(document).ready(function() {
        $('#tindakan3').on('change', function() {
            var tindakan1 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getTindakan'); ?>",
                type: "POST",
                data: {
                    tindakanId: tindakan1
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#hargatindakan3').val(data);
                        $('#harga_diskon3').val(data);
                    } else {
                        $('#hargatindakan3').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // diskon untuk tindakan 3
    $(document).ready(function() {
        $('#tindakan3').on('change', function() {
            var hargaTindakan1 = $('#hargatindakan3').val();
            var diskonTindakan1 = $('#diskon_tindakan3').val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon3').val(hargaDiskon);
        });

        $('#diskon_tindakan3').on('input', function() {
            var hargaTindakan1 = $('#hargatindakan3').val();
            var diskonTindakan1 = $(this).val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon3').val(hargaDiskon);
        });
    });


    // Tindakan 4
    $(document).ready(function() {
        $('#tindakan4').on('change', function() {
            var tindakan1 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getTindakan'); ?>",
                type: "POST",
                data: {
                    tindakanId: tindakan1
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#hargatindakan4').val(data);
                        $('#harga_diskon4').val(data);
                    } else {
                        $('#hargatindakan4').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // diskon untuk tindakan 4
    $(document).ready(function() {
        $('#tindakan4').on('change', function() {
            var hargaTindakan1 = $('#hargatindakan4').val();
            var diskonTindakan1 = $('#diskon_tindakan4').val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon4').val(hargaDiskon);
        });

        $('#diskon_tindakan4').on('input', function() {
            var hargaTindakan1 = $('#hargatindakan4').val();
            var diskonTindakan1 = $(this).val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon4').val(hargaDiskon);
        });
    });


    // Tindakan 5
    $(document).ready(function() {
        $('#tindakan5').on('change', function() {
            var tindakan1 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getTindakan'); ?>",
                type: "POST",
                data: {
                    tindakanId: tindakan1
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#hargatindakan5').val(data);
                        $('#harga_diskon5').val(data);
                    } else {
                        $('#hargatindakan4').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // diskon untuk tindakan 5
    $(document).ready(function() {
        $('#tindakan5').on('change', function() {
            var hargaTindakan1 = $('#hargatindakan5').val();
            var diskonTindakan1 = $('#diskon_tindakan5').val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon5').val(hargaDiskon);
        });

        $('#diskon_tindakan5').on('input', function() {
            var hargaTindakan1 = $('#hargatindakan5').val();
            var diskonTindakan1 = $(this).val();

            // Menghitung harga setelah diskon
            var diskonPersen = parseFloat(diskonTindakan1) / 100;
            var hargaDiskon = hargaTindakan1 - (hargaTindakan1 * diskonPersen);

            // Mengisi nilai pada input harga_diskon
            $('#harga_diskon5').val(hargaDiskon);
        });
    });
</script>


<!-- tindakan ajax jika data sudah diselect (edit form invoice) -->
<script>
    // Fungsi untuk memproses AJAX dan diskon
    // tindakan 1
    function processTindakan1() {
        var tindakan1 = $('#tindakan1').val();

        $.ajax({
            url: "<?php echo base_url('dokter/getTindakan'); ?>",
            type: "POST",
            data: {
                tindakanId: tindakan1
            },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#hargatindakan1').val(data);
                    $('#harga_diskon').val(data);
                } else {
                    $('#hargatindakan1').val('');
                }
            },
            error: function() {
                console.log('Error occurred during AJAX request.');
            }
        });
    }

    // tindakan 2
    function processTindakan2() {
        var tindakan1 = $('#tindakan2').val();

        $.ajax({
            url: "<?php echo base_url('dokter/getTindakan'); ?>",
            type: "POST",
            data: {
                tindakanId: tindakan1
            },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#hargatindakan2').val(data);
                    $('#harga_diskon2').val(data);
                } else {
                    $('#hargatindakan2').val('');
                }
            },
            error: function() {
                console.log('Error occurred during AJAX request.');
            }
        });
    }

    // tindakan 3
    function processTindakan3() {
        var tindakan1 = $('#tindakan3').val();

        $.ajax({
            url: "<?php echo base_url('dokter/getTindakan'); ?>",
            type: "POST",
            data: {
                tindakanId: tindakan1
            },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#hargatindakan3').val(data);
                    $('#harga_diskon3').val(data);
                } else {
                    $('#hargatindakan3').val('');
                }
            },
            error: function() {
                console.log('Error occurred during AJAX request.');
            }
        });
    }


    // tindakan 4
    function processTindakan4() {
        var tindakan1 = $('#tindakan4').val();

        $.ajax({
            url: "<?php echo base_url('dokter/getTindakan'); ?>",
            type: "POST",
            data: {
                tindakanId: tindakan1
            },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#hargatindakan4').val(data);
                    $('#harga_diskon4').val(data);
                } else {
                    $('#hargatindakan4').val('');
                }
            },
            error: function() {
                console.log('Error occurred during AJAX request.');
            }
        });
    }


    // tindakan 5
    function processTindakan5() {
        var tindakan1 = $('#tindakan5').val();

        $.ajax({
            url: "<?php echo base_url('dokter/getTindakan'); ?>",
            type: "POST",
            data: {
                tindakanId: tindakan1
            },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#hargatindakan5').val(data);
                    $('#harga_diskon5').val(data);
                } else {
                    $('#hargatindakan5').val('');
                }
            },
            error: function() {
                console.log('Error occurred during AJAX request.');
            }
        });
    }

    // Panggil fungsi saat halaman dimuat
    $(document).ready(function() {
        processTindakan1(); // Panggil fungsi saat halaman dimuat untuk menginisialisasi nilai diskon
        processTindakan2(); // Panggil fungsi saat halaman dimuat untuk menginisialisasi nilai diskon
        processTindakan3(); // Panggil fungsi saat halaman dimuat untuk menginisialisasi nilai diskon
        processTindakan4(); // Panggil fungsi saat halaman dimuat untuk menginisialisasi nilai diskon
        processTindakan5(); // Panggil fungsi saat halaman dimuat untuk menginisialisasi nilai diskon
    });
</script>



<!-- script untuk fungsi menghapus dan menambahkan form tindakan -->
<script>
    var formCounter = 1; // Variabel penghitung

    // Fungsi untuk menambahkan form Tindakan
    function tambahFormTindakan() {
        if (formCounter <= 4) { // Batas maksimal 5 form jenis obat
            var formGroup = document.createElement('div');
            formGroup.className = "form-tindakan"; // Add class name
            formGroup.innerHTML = `
            <!-- Tindakan ${formCounter+1} -->
                
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tindakan${formCounter+1}">Tindakan ${formCounter+1}</label>
                                        <select class="form-control" id="tindakan${formCounter+1}" name="tindakan${formCounter+1}">
                                            <option value="0">Pilih..</option>
                                            <?php foreach ($all_tindakan as $row) : ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['nama_tindakan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="form-group">
                                        <label for="hargatindakan${formCounter+1}">Harga Tindakan ${formCounter+1}</label>
                                        <input type="text" class="form-control" id="hargatindakan${formCounter+1}" name="hargatindakan${formCounter+1}" placeholder="Masukan harga tindakan ${formCounter+1}">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Diskon Tindakan ${formCounter+1} -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="diskon_tindakan${formCounter}">Diskon Tindakan ${formCounter+1} (%)</label>
                                        <input type="text" class="form-control" id="diskon_tindakan${formCounter+1}" name="diskon_tindakan${formCounter+1}" placeholder="Masukan diskon tindakan ${formCounter+1}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="harga_diskon${formCounter+1}">Harga setelah diskon</label>
                                        <input type="text" class="form-control" id="harga_diskon${formCounter+1}" name="harga_diskon${formCounter+1}" placeholder="Harga otomatis berkurang" readonly>
                                    </div>
                                </div>
                            </div>
                </div>
        
            `;

            var formContainer = document.getElementById("formContainer1");
            formContainer.appendChild(formGroup);

            // Atur tinggi elemen "vl"
            var verticalLine = document.getElementById("verticalLine");
            verticalLine.style.height = (560 + 70 * formCounter) + "px";

            // Log pesan "ok" saat menambah form
            console.log("Form Tindakan ke-" + formCounter + " ditambahkan.");

            formCounter++; // Increment penghitung

            tindakan(formCounter);
            diskon(formCounter);
        }
    }

    // fungsi untuk tindakan ajax!
    function tindakan($formCounter) {
        $(document).ready(function() {
            $('#tindakan' + formCounter).on('change', function() {
                var tindakan = $(this).val();
                // console.log(tindakan);

                $.ajax({
                    url: "<?php echo base_url('dokter/getTindakan'); ?>",
                    type: "POST",
                    data: {
                        tindakanId: tindakan
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.length > 0) {
                            $('#hargatindakan' + formCounter).val(data);
                            $('#harga_diskon' + formCounter).val(data);
                        } else {
                            $('#hargatindakan' + formCounter).val('');
                        }
                    },
                    error: function() {
                        console.log('Error occurred during AJAX request.');
                    }
                });
            });
        });
    }

    // fungsi untuk menghitung diskon dari tindakan yang dipilih
    function diskon($formCounter) {
        $(document).ready(function() {
            $('#tindakan' + formCounter).on('change', function() {
                var hargaTindakan = $('#hargatindakan' + formCounter).val();
                var diskonTindakan = $('#diskon_tindakan' + formCounter).val();

                // Menghitung harga setelah diskon
                var diskonPersen = parseFloat(diskonTindakan) / 100;
                var hargaDiskon = hargaTindakan - (hargaTindakan * diskonPersen);

                // Mengisi nilai pada input harga_diskon
                $('#harga_diskon' + formCounter).val(hargaDiskon);
            });

            $('#diskon_tindakan' + formCounter).on('input', function() {
                var hargaTindakan = $('#hargatindakan' + formCounter).val();
                var diskonTindakan = $(this).val();

                // Menghitung harga setelah diskon
                var diskonPersen = parseFloat(diskonTindakan) / 100;
                var hargaDiskon = hargaTindakan - (hargaTindakan * diskonPersen);

                // Mengisi nilai pada input harga_diskon
                $('#harga_diskon' + formCounter).val(hargaDiskon);
            });
        });
    }

    function hapusFormTindakan() {

        var formContainer = document.getElementById("formContainer1");
        var formGroups = formContainer.getElementsByClassName("form-tindakan");
        var lastFormGroup = formGroups[formGroups.length - 1];

        if (formGroups.length > 1 && lastFormGroup) {
            formContainer.removeChild(lastFormGroup);
            formCounter--; // Dekrement penghitung

            // Atur tinggi elemen "vl" setelah mengurangi form
            var verticalLine = document.getElementById("verticalLine");
            verticalLine.style.height = (560 + 70 * formCounter) + "px";

            // Log pesan "ok" saat menghapus form
            console.log("Form ke-" + formCounter + " dihapus.");
        }
    }
</script>


<!-- script untuk seleksi data yang akan ditampilkan (obat) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // jenis obat 
    $(document).ready(function() {
        $('#obat').on('change', function() {
            console.log('ok');
            var id_obat = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getObat'); ?>",
                type: "POST",
                data: {
                    obatId: id_obat
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#harga_obat').val(data);
                    } else {
                        $('#harga_obat').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // jumlah obat 0
    $(document).ready(function() {
        $('#jumlah').on('input', function() {

            console.log('ok');
            var obat = $('#obat').val();
            var jumlah = $(this).val();

            if (jumlah == '') {
                $('#harga_obat').val('');
                return;
            }

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: "<?php echo base_url('dokter/getJumlahObat'); ?>",
                method: 'POST',
                data: {
                    jumlah: jumlah,
                    obatId: obat
                },
                success: function(response) {
                    // Update nilai harga_obat dengan respons dari server
                    $('#harga_obat').val(response);
                }
            });
        });
    });


    // jenis obat 1
    $(document).ready(function() {
        $('#obat1').on('change', function() {
            console.log('ok');
            var id_obat1 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getObat'); ?>",
                type: "POST",
                data: {
                    obatId: id_obat1
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#harga_obat1').val(data);
                    } else {
                        $('#harga_obat1').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // jumlah obat 1
    $(document).ready(function() {
        $('#jumlah1').on('input', function() {

            console.log('ok');
            var obat1 = $('#obat1').val();
            var jumlah1 = $(this).val();

            if (jumlah1 == '') {
                $('#harga_obat1').val('');
                return;
            }

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: "<?php echo base_url('dokter/getJumlahObat'); ?>",
                method: 'POST',
                data: {
                    jumlah: jumlah1,
                    obatId: obat1
                },
                success: function(response) {
                    // Update nilai harga_obat dengan respons dari server
                    $('#harga_obat1').val(response);
                }
            });
        });
    });

    // jenis obat 2
    $(document).ready(function() {
        $('#obat2').on('change', function() {
            console.log('ok');
            var id_obat2 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getObat'); ?>",
                type: "POST",
                data: {
                    obatId: id_obat2
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#harga_obat2').val(data);
                    } else {
                        $('#harga_obat2').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // jumlah obat 2
    $(document).ready(function() {
        $('#jumlah2').on('input', function() {

            console.log('ok');
            var obat2 = $('#obat2').val();
            var jumlah2 = $(this).val();

            if (jumlah2 == '') {
                $('#harga_obat2').val('');
                return;
            }

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: "<?php echo base_url('dokter/getJumlahObat'); ?>",
                method: 'POST',
                data: {
                    jumlah: jumlah2,
                    obatId: obat2
                },
                success: function(response) {
                    // Update nilai harga_obat dengan respons dari server
                    $('#harga_obat2').val(response);
                }
            });
        });
    });

    // jenis obat 3
    $(document).ready(function() {
        $('#obat3').on('change', function() {
            console.log('ok');
            var id_obat3 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getObat'); ?>",
                type: "POST",
                data: {
                    obatId: id_obat3
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#harga_obat3').val(data);
                    } else {
                        $('#harga_obat3').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // jumlah obat 3
    $(document).ready(function() {
        $('#jumlah3').on('input', function() {

            console.log('ok');
            var obat3 = $('#obat3').val();
            var jumlah3 = $(this).val();

            if (jumlah3 == '') {
                $('#harga_obat3').val('');
                return;
            }

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: "<?php echo base_url('dokter/getJumlahObat'); ?>",
                method: 'POST',
                data: {
                    jumlah: jumlah3,
                    obatId: obat3
                },
                success: function(response) {
                    // Update nilai harga_obat dengan respons dari server
                    $('#harga_obat3').val(response);
                }
            });
        });
    });

    // jenis obat 4
    $(document).ready(function() {
        $('#obat4').on('change', function() {
            console.log('ok');
            var id_obat4 = $(this).val();

            $.ajax({
                url: "<?php echo base_url('dokter/getObat'); ?>",
                type: "POST",
                data: {
                    obatId: id_obat4
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#harga_obat4').val(data);
                    } else {
                        $('#harga_obat4').val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    });

    // jumlah obat 4
    $(document).ready(function() {
        $('#jumlah4').on('input', function() {

            console.log('ok');
            var obat4 = $('#obat4').val();
            var jumlah4 = $(this).val();

            if (jumlah4 == '') {
                $('#harga_obat4').val('');
                return;
            }

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: "<?php echo base_url('dokter/getJumlahObat'); ?>",
                method: 'POST',
                data: {
                    jumlah: jumlah4,
                    obatId: obat4
                },
                success: function(response) {
                    // Update nilai harga_obat dengan respons dari server
                    $('#harga_obat4').val(response);
                }
            });
        });
    });
</script>


<!-- script untuk fungsi menghapus dan menambahkan form jenis obat -->
<script>
    var formCounter1 = 1; // Variabel penghitung

    // Fungsi untuk menambahkan form jenis obat
    function tambahForm() {
        if (formCounter1 <= 4) { // Batas maksimal 5 form jenis obat
            var formGroup = document.createElement('div');
            formGroup.classList.add('row');
            formGroup.innerHTML = `
                <div class="col ">
                    <div class="form-group">
                        <label for="obat${formCounter1}">Jenis Obat</label>
                        <select class="form-control" id="obat${formCounter1}" name="obat${formCounter1}">
                            <option value="0">Pilih..</option>
                            <?php foreach ($all_obat as $row) : ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nama_obat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- notif error -->
                        <small class="text-danger"></small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="jumlah${formCounter1}">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah${formCounter1}" name="jumlah${formCounter1}" placeholder="Masukan jumlah">
                        <!-- notif error -->
                        <small class="text-danger"></small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="harga_obat${formCounter1}">Harga</label>
                        <input type="text" class="form-control" id="harga_obat${formCounter1}" name="harga_obat${formCounter1}" placeholder="harga obat" readonly>
                        <!-- notif error -->
                        <small class="text-danger"></small>
                    </div>
                </div>
            `;

            var formContainer = document.getElementById("formContainer");
            formContainer.appendChild(formGroup);

            // Atur tinggi elemen "vl"
            var verticalLine = document.getElementById("verticalLine");
            verticalLine.style.height = (560 + 70 * formCounter1) + "px";

            // Log pesan "ok" saat menambah form
            console.log("Form Obat ke-" + formCounter1 + " ditambahkan.");

            // Panggil fungsi obat dan jumlah dengan parameter formCounter
            obat(formCounter1);
            jumlah(formCounter1);
            formCounter1++; // Increment penghitung
        }
    }

    function obat(formCounter1) {
        $('#obat' + formCounter1).on('change', function() {
            var id_obat = $(this).val();
            console.log("Form ke-" + formCounter1 + ": Jenis Obat dipilih: " + id_obat);

            $.ajax({
                url: "<?php echo base_url('dokter/getObat'); ?>",
                type: "POST",
                data: {
                    obatId: id_obat
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        $('#harga_obat' + formCounter1).val(data);
                    } else {
                        $('#harga_obat' + formCounter1).val('');
                    }
                },
                error: function() {
                    console.log('Error occurred during AJAX request.');
                }
            });
        });
    }

    function jumlah(formCounter1) {
        $('#jumlah' + formCounter1).on('input', function() {
            // console.log('Form ke-' + formCounter1 + ': Jumlah diisi: ' + $(this).val());
            var obat = $('#obat' + formCounter1).val();
            var jumlah = $(this).val();

            if (jumlah == '') {
                $('#harga_obat' + formCounter1).val('');
                return;
            }

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: "<?php echo base_url('dokter/getJumlahObat'); ?>",
                method: 'POST',
                data: {
                    jumlah: jumlah,
                    obatId: obat
                },
                success: function(response) {
                    // Update nilai harga_obat dengan respons dari server
                    $('#harga_obat' + formCounter1).val(response);
                }
            });
        });
    }

    // Fungsi untuk menghapus form jenis obat terakhir
    function hapusForm() {
        var formContainer = document.getElementById("formContainer");
        var formGroups = formContainer.getElementsByClassName("row");
        if (formGroups.length > 1) {
            formContainer.removeChild(formGroups[formGroups.length - 1]);
            formCounter1--; // Dekrement penghitung

            // Atur tinggi elemen "vl" setelah mengurangi form
            var verticalLine = document.getElementById("verticalLine");
            verticalLine.style.height = (560 + 70 * formCounter1) + "px";

            // Log pesan "ok" saat menghapus form
            console.log("hapus form ke-" + formCounter1);
        }
    }
</script>

<!-- total -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Buat fungsi untuk memperbarui total
        function updateTotal() {

            // biaya tindakan
            var hargaTindakan1 = $('#harga_diskon').val();
            var hargaTindakan2 = $('#harga_diskon2').val();
            var hargaTindakan3 = $('#harga_diskon3').val();
            var hargaTindakan4 = $('#harga_diskon4').val();
            var hargaTindakan5 = $('#harga_diskon5').val();

            if (hargaTindakan2 == '') {
                hargaTindakan2 = 0;
            }

            if (hargaTindakan3 == '') {
                hargaTindakan3 = 0;
            }

            if (hargaTindakan4 == '') {
                hargaTindakan4 = 0;
            }

            if (hargaTindakan5 == '') {
                hargaTindakan5 = 0;
            }

            // harga_obat
            var harga_obat = $('#harga_obat').val();
            var harga_obat2 = $('#harga_obat1').val();
            var harga_obat3 = $('#harga_obat2').val();
            var harga_obat4 = $('#harga_obat3').val();
            var harga_obat5 = $('#harga_obat4').val();

            //  jika kosong


            if (harga_obat2 == '') {
                harga_obat2 = 0;
            }

            if (harga_obat3 == '') {
                harga_obat3 = 0;
            }

            if (harga_obat4 == '') {
                harga_obat4 = 0;
            }

            if (harga_obat5 == '') {
                harga_obat5 = 0;
            }

            // Mengambil nilai pajak terpilih
            var pajak = $('#tax').find(':selected').attr('data-pajak');
            console.log(pajak);

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: "<?php echo base_url('dokter/getTotalKeseluruhan'); ?>",
                method: 'POST',
                data: {
                    hargaTindakan1: hargaTindakan1,
                    hargaTindakan2: hargaTindakan2,
                    hargaTindakan3: hargaTindakan3,
                    hargaTindakan4: hargaTindakan4,
                    hargaTindakan5: hargaTindakan5,
                    harga_obat: harga_obat,
                    harga_obat2: harga_obat2,
                    harga_obat3: harga_obat3,
                    harga_obat4: harga_obat4,
                    harga_obat5: harga_obat5,
                    pajak: pajak
                },
                success: function(response) {
                    // Update nilai total dengan respons dari server
                    $('#total').val(response);
                }
            });
        }

        // Panggil fungsi updateTotal saat elemen-elemen lainnya berubah
        $('#tax').on('input change', function() {
            updateTotal();
        });
    });
</script>

</body>

</html>