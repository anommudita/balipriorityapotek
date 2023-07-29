<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-secret"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Administrator</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Beranda -->
    <li class="nav-item <?= $nav == 'beranda' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-solid fa-house"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur
    </div>


    <!-- Akun Dokter -->
    <li class="nav-item <?= $nav == 'akun_dokter' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/akun_dokter'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Akun Dokter</span></a>
    </li>


    <!-- Pengaturan -->
    <li class="nav-item <?= $nav == 'pasien' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pasien" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-hospital-user"></i>
            <span>Pasien</span>
        </a>
        <div id="pasien" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Pasien:</h6>
                <a class="collapse-item" href="<?= base_url('admin/pasien'); ?>">Data Pasien</a>
                <a class="collapse-item" href="<?= base_url('admin/recordpasien'); ?>">Record Pasien</a>
            </div>
        </div>
    </li>

    <!-- Record Pasien -->
    <!-- <li class="nav-item <?= $nav == 'record_pasien' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/recordpasien'); ?>">
            <i class="fas fa-fw fa-hospital-user"></i>
            <span>Record Pasien</span></a>
    </li> -->


    <!-- Antrian Pasien -->
    <li class="nav-item <?= $nav == 'antrian_pasien' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/antrianpasien'); ?>">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Antrian Pasien</span></a>
    </li>

    <!-- Tindakan -->
    <li class="nav-item <?= $nav == 'tindakan' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/tindakan'); ?>">
            <i class="fas fa-fw fa-sharp fa-solid fa-user-check"></i>
            <span>Tindakan</span></a>
    </li>

    <!-- Jenis Obat -->
    <li class="nav-item <?= $nav == 'jenis_obat' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/jenisobat'); ?>">
            <i class="fas fa-fw fa-solid fa-capsules"></i>
            <span>Jenis Obat</span></a>
    </li>

    <!-- Pajak -->
    <li class="nav-item <?= $nav == 'pajak' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/pajak'); ?>">
            <i class="fas fa-fw fa-solid fa-money-bill"></i>
            <span>Pajak</span></a>
    </li>


    <!-- Riwayat Invoice -->
    <li class="nav-item <?= $nav == 'riwayat_invoice' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/riwayat_invoice'); ?>">
            <i class="fas fa-fw fa-solid fa-clipboard"></i>
            <span>Riwayat Invoice</span></a>
    </li>


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
                <a class="collapse-item" href="<?= base_url('admin/myprofile'); ?>">My Profile</a>
                <a class="collapse-item" href="<?= base_url('admin/editprofile'); ?>">Edit Profile</a>
                <a class="collapse-item" href="<?= base_url('admin/gantikatasandi'); ?>">Ganti Kata Sandi</a>
            </div>
        </div>
    </li>


    <!-- Tentang -->
    <li class="nav-item <?= $nav == 'tentang' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/tentang'); ?>">
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