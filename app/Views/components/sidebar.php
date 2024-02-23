<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-text mx-3">SIDUG</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item<?= ($current_page == 'dashboard') ? ' active' : '' ?>">
        <a class="nav-link" href="<?= url_to('Dashboard::index') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item<?= ($current_page == 'data_saya') ? ' active' : '' ?>">
        <a class="nav-link" href="<?= url_to('DataUmat::data_saya') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Saya</span></a>
    </li>

    <?php if (auth()->user()->inGroup('admin')) : ?>

        <li class="nav-item<?= ($current_page == 'pengguna') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= url_to('Pengguna::index') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Pengguna</span></a>
        </li>

        <li class="nav-item<?= ($current_page == 'data_umat') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= url_to('DataUmat::index') ?>">
                <i class="fas fa-fw fa-database"></i>
                <span>Data Umat</span></a>
        </li>

    <?php endif; ?>

    <li class="nav-item<?= ($current_page == 'statistik') ? ' active' : '' ?>">
        <a class="nav-link" href="<?= url_to('Statistik::index') ?>">
            <i class="fas fa-fw fa-chart-pie"></i>
            <span>Statistik</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->