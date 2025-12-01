<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Learning SMKN 1 Kamal</title>

    <!-- Base URL -->
    <base href="<?= base_url('assets') ?>/">

    <!-- Custom fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/custom-font.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <?= $this->renderSection('style'); ?>

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #4F4747;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/logosmk.png') ?>" alt="logo" width="50">
                </div>
                <div class="sidebar-brand-text mx-1">SMKN 1 Kamal</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php $uri = uri_string(); ?>

            <!-- Dashboard -->
            <li class="nav-item <?= (
                                    str_starts_with($uri, 'guru/dashboard') ||
                                    str_starts_with($uri, 'dashboard') ||
                                    str_starts_with($uri, 'dashboard/create') ||
                                    str_starts_with($uri, 'dashboard/delete')
                                ) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-project-diagram"></i>
                    <span>Proyek Siswa</span>
                </a>
            </li>

            <!-- Rekap Absensi -->
            <li class="nav-item <?= str_starts_with($uri, 'guru/absensi/grafik_absensi') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('guru/absensi/grafik_absensi') ?>">
                    <i class="fas fa-calendar-check"></i>
                    <span>Rekap Absensi</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Materi Siswa</div>

            <li class="nav-item <?= str_starts_with($uri, 'guru/materi') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('guru/materi') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Input Materi</span>
                </a>
            </li>

            <li class="nav-item <?= str_starts_with($uri, 'guru/tugas') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('guru/tugas') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Input Tugas</span>
                </a>
            </li>

            <li class="nav-item <?= str_starts_with($uri, 'guru/referensi') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('guru/referensi') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Input Referensi</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Rapor Siswa</div>

            <li class="nav-item <?= str_starts_with($uri, 'guru/rapor') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('guru/rapor') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Rapor Siswa</span>
                </a>
            </li>

            <li class="nav-item <?= str_starts_with($uri, 'guru/kenaikankelas') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('guru/kenaikankelas') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Kenaikan Kelas</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">Tambah Siswa</div>

            <li class="nav-item <?= str_starts_with($uri, 'guru/murid') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('guru/murid') ?>">
                    <i class="fas fa-users"></i>
                    <span>Siswa</span>
                </a>
            </li>

            <li class="nav-item <?= str_starts_with($uri, 'guru/data_guru') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('guru/data_guru') ?>">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Data Guru</span>
                </a>
            </li>

            <!-- Sidebar Toggler -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow" style="background-color: #E4D476;">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <!-- Notifikasi -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="fas fa-bell fa-fw"></i>

                                <span id="notif-badge" class="badge badge-danger badge-counter"
                                    style="<?= count($notifikasi_baru) > 0 ? '' : 'display:none;' ?>">
                                    <?= count($notifikasi_baru) ?>
                                </span>
                            </a>

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="notifDropdown">

                                <h6 class="dropdown-header">Notifikasi Diskusi</h6>

                                <?php if (!empty($notifikasi_baru)) : ?>
                                    <?php foreach ($notifikasi_baru as $notif) : ?>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="<?= base_url('notifikasi/baca/' . $notif['id_materi']) ?>">

                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-comments text-white"></i>
                                                </div>
                                            </div>

                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><?= esc($notif['judul_materi']) ?></div>
                                                <div class="small text-gray-500">
                                                    <?= date('d M Y H:i', strtotime($notif['tanggal'])) ?>
                                                </div>
                                            </div>

                                        </a>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="dropdown-item text-center small text-gray-500">Tidak ada notifikasi baru</div>
                                <?php endif; ?>
                            </div>
                        </li>

                        <!-- Profil Guru -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-white-600 small">
                                    <?= session()->get('nama_guru') ?>
                                </span>

                                <?php
                                $fotoGuru = session()->get('foto_guru');
                                $path = FCPATH . 'guru/' . $fotoGuru;

                                $urlFoto = ($fotoGuru && file_exists($path))
                                    ? base_url('guru/' . $fotoGuru)
                                    : base_url('img/undraw_profile.svg');
                                ?>

                                <img class="img-profile rounded-circle"
                                    src="<?= $urlFoto ?>"
                                    style="width: 40px; height: 40px; object-fit: cover;">

                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End Topbar -->

                <?= $this->renderSection('script'); ?>
                <?= $this->renderSection('isi'); ?>


                <!-- Scroll to Top -->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                Select "Logout" below if you are ready to end your current session.
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Scripts -->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                <script src="js/sb-admin-2.min.js"></script>

                <script src="vendor/chart.js/Chart.min.js"></script>
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>