<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('dokter')?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-doctor"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dokter</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Beranda -->
    <li class="nav-item <?= $nav == 'beranda' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('dokter'); ?>">
            <i class="fas fa-fw fa-solid fa-house"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur
    </div>



    <!-- Record Pasien -->
    <li class="nav-item <?= $nav == 'record_pasien' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('dokter/recordpasien'); ?>">
            <i class="fas fa-fw fa-hospital-user"></i>
            <span>Record Pasien</span></a>
    </li>


    <!-- Antrian Pasien -->
    <li class="nav-item <?= $nav == 'antrian_pasien' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('dokter/antrianpasien'); ?>">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Antrian Pasien</span></a>
    </li>

    <!-- Form Pemeriksa -->
    <li class="nav-item <?= $nav == 'form_pemeriksaan' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('dokter/form_pemeriksaan'); ?>">
            <i class="fas fa-fw fa-sharp fa-solid fa-user-check"></i>
            <span>Riwayat Pemeriksaan</span></a>
    </li>

    <!-- Form Invoice -->
    <!-- <li class="nav-item <?= $nav == 'form_invoice' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('dokter/form_invoice'); ?>">
            <i class="fas fa-fw fa-solid fa-clipboard"></i>
            <span>Form Invoice</span></a>
    </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Lainnya
    </div>

    <!-- Pengaturan -->
    <li class="nav-item <?= $nav == 'pengaturan' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-solid fa-gear"></i>
            <span>Pengaturan</span>
        </a>
        <div id="pengaturan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Akun:</h6>
                <a class="collapse-item" href="<?= base_url('dokter/myprofile'); ?>">My Profile</a>
                <a class="collapse-item" href="<?= base_url('dokter/editprofile'); ?>">Edit Profile</a>
                <a class="collapse-item" href="<?= base_url('dokter/gantikatasandi'); ?>">Ganti Kata Sandi</a>
            </div>
        </div>
    </li>


    <!-- Tentang -->
    <li class="nav-item <?= $nav == 'tentang' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('dokter/tentang'); ?>">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Tentang</span></a>
    </li>


    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-solid fa-right-from-bracket"></i>
            <span>Logout</span></a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->