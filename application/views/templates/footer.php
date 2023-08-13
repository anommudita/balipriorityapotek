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


<!-- script loading page -->
<script src="<?= base_url('assets/'); ?>js/loader-hander.js"></script>


<!-- Datatables Pluginss -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/datatables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/datatables.js"></script>



<!-- <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

<!-- 
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script> -->

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
        $('#nip').on('input', function() {
            var nip = $(this).val();
            // Make an AJAX request to retrieve historical data
            $.ajax({
                url: '<?= base_url('admin/get_historical_data'); ?>',
                method: 'POST',
                data: {
                    nip: nip
                },
                dataType: 'json',
                success: function(response) {
                    // Process the response and populate the form fields with historical data
                    if (response.success) {
                        // Populate form fields with historical data
                        $('#nama').val(response.data.nama);
                        $('#nik').val(response.data.nik);
                        $('#tanggal_lahir').val(response.data.tanggal_lahir);
                        $('#umur').val(response.data.umur);
                        $('#alamat').val(response.data.alamat);
                        $('#jenis_kelamin').val(response.data.jenis_kelamin);
                        $('#no_tlp').val(response.data.no_telepon);
                        $('#notif').text('');
                    } else {
                        // Clear form fields if no historical data found
                        $('#nama').val('');
                        $('#nik').val('');
                        $('#tanggal_lahir').val('');
                        $('#umur').val('');
                        $('#alamat').val('');
                        $('#jenis_kelamin').val('');
                        $('#no_tlp').val('');
                        $('#notif').text('Data tidak ditemukan, pastikan data pasien sudah terdaftar');
                    }
                }
            });
        });
    });
</script>


<!-- Script Untuk Mencari Nilai Umur dari Nilai tanggal lahir  (menampilan 12 tahun 2 bulan)-->
<script>
    document.getElementById('tanggal_lahir').addEventListener('change', function() {
        var tanggalLahir = this.value;
        var today = new Date();
        var birthDate = new Date(tanggalLahir);
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDiff = today.getMonth() - birthDate.getMonth();

        // Jika ulang tahun belum terjadi pada tahun ini, kurangi umur satu tahun
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
            monthDiff = 12 + monthDiff; // Menghitung selisih bulan dengan mengubah ke positif
        }

        // Formatkan umur ke dalam string "X tahun Y bulan"
        var umurString = age + " tahun";
        if (monthDiff > 0) {
            umurString += " " + monthDiff + " bulan";
        }

        document.getElementById('umur').value = umurString;
    });
</script>


<!-- Script Untuk Mencari Nilai Umur dari Nilai tanggal lahir  (menampilan 12 tahun 2 bulan) untuk pasien-->
<script>
    document.getElementById('tanggal_lahir_pasien').addEventListener('change', function() {
        var tanggalLahir = this.value;
        var today = new Date();
        var birthDate = new Date(tanggalLahir);
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDiff = today.getMonth() - birthDate.getMonth();

        // Jika ulang tahun belum terjadi pada tahun ini, kurangi umur satu tahun
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
            monthDiff = 12 + monthDiff; // Menghitung selisih bulan dengan mengubah ke positif
        }

        // Formatkan umur ke dalam string "X tahun Y bulan"
        var umurString = age + " tahun";
        if (monthDiff > 0) {
            umurString += " " + monthDiff + " bulan";
        }

        document.getElementById('umur_pasien').value = umurString;
    });
</script>



