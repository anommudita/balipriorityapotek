// fungsi detail pada tim untuk memunculkan modal box
$('#tombol-detail').on('click', function(){
    var name = $(this).data('name');
    var nim = $(this).data('nim');
    var prodi = $(this).data('prodi');
    var jabatan = $(this).data('jabatan');
    var keahlian = $(this).data('keahlian');
    var guru_pamong = $(this).data('guruGP');
    var sosmed = $(this).data('sosmed');
    var gambar = $(this).data('gambar');

    $('#name').text(name);
    $('#nim').text(nim);
    $('#prodi').text(prodi);
    $('#jabatan').text(jabatan);
    $('#keahlian').text(keahlian);
    $('#guruGP').text(guruGP);
    $('#sosmend').text(sosmed);
    $('gambar').text(gambar);

    alert('test');
    console.log('test');
    
});

// tombol delete akun dokter
$('.delete-akun-dokter').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus data akun dokter ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Akun Dokter!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Hapus!',
                'Akun Dokter berhasil dihapus.',
                'success'
                )
            }
            })

});


// tombol delete obat
$('.delete-obat').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus data obat ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus obat!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Hapus!',
                'Data berhasil dihapus.',
                'success'
                )
            }
            })

});


/// tombol delete pajak
$('.delete-pajak').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus pajak ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus pajak!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Hapus!',
                'Data berhasil dihapus.',
                'success'
                )
            }
            })

});


// delete tindakan
$('.delete-tindakan').on('click', function(e){
    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus tindakan ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus tindakan!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Hapus!',
                'Data berhasil dihapus.',
                'success'
                )
            }
            })

});

// delete record pasien
$('.delete-pasien').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus pasien ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus pasien!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Hapus!',
                'Data berhasil dihapus.',
                'success'
                )
            }
            })

});

// delete data pasien
$('.delete-data-pasien').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus pasien ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus pasien!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Hapus!',
                'Data berhasil dihapus.',
                'success'
                )
            }
            })

});


// delete form pemeriksaan
$('.delete-form-pemeriksaan').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus form pemeriksaan ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus form pemeriksaan!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Hapus!',
                'Data berhasil dihapus.',
                'success'
                )
            }
            })

});


// delete form invoice
$('.delete-form-invoice').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus invoice ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus invoice!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Hapus!',
                'Data berhasil dihapus.',
                'success'
                )
            }
            })

});



// change status pasien
$('.change-status').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin mengubah status pasien ini menjadi selesai?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Selesai!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                'Ubah!',
                'Data berhasil ubah status.',
                'success'
                )
            }
            })

});



// notif opps invoice
$('.notif-invoice').on('click', function(e){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tidak bisa mencetak invoice, status harus selesai!',
    })
});


// notif opps pemeriksaan
$('.notif-pemeriksaan').on('click', function(e){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tidak bisa mencetak pemeriksaan, status harus selesai!',
    })
});


// new DataTable('#myTable');
// mengaktifkan data table
$('#myTable').DataTable( {
    // paging: false,
    // scrollY: 400
} );





