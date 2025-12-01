<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Learning SMKN 1 Kamal</title>

    <!-- Custom fonts for this template-->
    <base href="<?php echo base_url('assets') ?>/">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/custom-font.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #4F4747;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i>
                        <img src="<?php echo base_url('assets/logosmk.png') ?>" alt="imgs" width="50 rem">
                    </i>
                </div>
                <div class="sidebar-brand-text mx-1">SMKN 1 Kamal</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php $uri = uri_string(); ?>
            <li class="nav-item <?= (str_starts_with($uri, 'siswa/dashboard')) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('siswa/dashboard') ?>">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item <?= str_starts_with($uri, 'siswa/absensi') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('siswa/absensi') ?>">
                    <i class="fas fa-calendar-check"></i>
                    <span>Absensi</span>
                </a>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading" style="font-weight:bold; ">Materi</div>

            <?php if (!empty($materiSidebar)) : ?>
                <?php foreach ($materiSidebar as $guru => $kelasList): ?>

                    <!-- Guru -->
                    <div class="sidebar-heading"
                        style="
            font-weight:bold; 
              
            ">
                        <?= esc($guru) ?>
                    </div>

                    <?php foreach ($kelasList as $kelas => $semesterList): ?>

                        <!-- Kelas -->
                        <a href="#"
                            class="nav-link collapsed"
                            data-toggle="collapse"
                            data-target="#kelas<?= md5($guru . $kelas) ?>"
                            style="
                    color :#ffffff;
                    padding: 8px 16px;
                    margin: 5px 4px;
                    background: <?= ($kelas == $activeKelas) ? '#ffffff20' : 'transparent' ?>;
                    border-radius: 5px;
                    font-size : 15px;
                    transition: 0.25s;
                ">
                            <span style="border-left: 4px  <?= ($kelas == $activeKelas) ? '#FFD700' : 'transparent' ?>; padding-left:6px;">
                                📚 Kelas <?= esc($kelas) ?>
                            </span>
                        </a>

                        <div id="kelas<?= md5($guru . $kelas) ?>"
                            class="collapse <?= ($kelas == $activeKelas) ? 'show' : '' ?>"
                            data-parent="#accordionSidebar"
                            style="
                    background: <?= ($kelas == $activeKelas) ? '#ffffffd5' : '#ffffffd5' ?>;
                    border-radius: 5px;
                    margin: 0 5px 5px 5px;
                    padding: 5px 8px;
                    transition: all .3s ease;
                ">

                            <?php foreach ($semesterList as $semester => $materiList): ?>

                                <!-- Semester -->
                                <a href="#"
                                    class="nav-link collapsed"
                                    data-toggle="collapse"
                                    data-target="#semester<?= md5($guru . $kelas . $semester) ?>"
                                    style="
                            padding: 8px 5px;
                            margin: 4px 1px;
                            background: <?= ($kelas == $activeKelas && $semester == $activeSemester) ? '#FFF7D6' : 'transparent' ?>;
                            border-radius: 10px;
                            font-size: 14px;
                            transition: 0.25s;
                        ">
                                    <span style=" <?= ($kelas == $activeKelas && $semester == $activeSemester) ?: 'transparent' ?>; padding-left:1px;">
                                        📄 Semester <?= ucfirst($semester) ?>
                                    </span>
                                </a>

                                <div id="semester<?= md5($guru . $kelas . $semester) ?>"
                                    class="collapse <?= ($kelas == $activeKelas && $semester == $activeSemester) ? 'show' : '' ?>"
                                    data-parent="#kelas<?= md5($guru . $kelas) ?>"
                                    style="
                            background: #ffffff;
                            border-radius: 5px;
                            margin: 0 0px 5px 5px;
                            padding: 5px 1px;
                            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                        ">

                                    <?php foreach ($materiList as $m): ?>
                                        <?php $isActive = current_url() == base_url('siswa/materi/' . $m['id_materi']); ?>

                                        <!-- MATERI -->
                                        <a href="<?= base_url('siswa/materi/' . $m['id_materi']) ?>"
                                            class="nav-link <?= $isActive ? 'active' : '' ?>"
                                            style="
                                    padding: 8px 10px;
                                    margin: 6px 5px;
                                    font-size: 14px;
                                    border-radius: 5px;
                                    background: <?= $isActive ? '#FFF5C2' : '#F7F7F7' ?>;
                                    font-weight: <?= $isActive ? '600' : '500' ?>;
                                    color: <?= $isActive ? '#4F4747' : '#444' ?>;
                                    box-shadow: <?= $isActive ? '0 2px 8px rgba(0,0,0,0.15)' : 'none' ?>;
                                    transition: 0.25s;
                                ">
                                            <?= esc($m['nomor_materi']) ?>. <?= esc($m['judul']) ?>
                                        </a>

                                        <!-- TUGAS -->
                                        <a href="<?= base_url('siswa/tugas/ambilmateri/' . $m['id_materi']) ?>"
                                            class="nav-link"
                                            style="
                                    padding: 6px 32px;
                                    margin: 0 10px -4px 10px;
                                    font-size: 13px;
                                    opacity:0.85;
                                    color:#333;
                                ">
                                            ✅ Tugas
                                        </a>

                                        <!-- REFERENSI -->
                                        <a href="<?= base_url('siswa/referensi/' . $m['id_materi']) ?>"
                                            class="nav-link"
                                            style="
                                    padding: 6px 32px;
                                    margin: 0 10px 6px 10px;
                                    font-size: 13px;
                                    opacity:0.85;
                                    color:#333;
                                ">
                                            📎 Referensi
                                        </a>

                                    <?php endforeach; ?>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    <?php endforeach; ?>

                <?php endforeach; ?>

            <?php else: ?>
                <div style="color:#bbb; font-size:12px; padding-left:12px;">Belum ada materi</div>
            <?php endif; ?>


            <li class="nav-item <?= (str_starts_with($uri, 'siswa/rapor')) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('siswa/rapor') ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>Rekap Tugas</span>
                </a>
            </li>

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

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
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="fas fa-bell fa-fw"></i>

                                <span id="notif-badge" class="badge badge-danger badge-counter"
                                    style="<?= !empty($notif_siswa) ? '' : 'display:none;' ?>">
                                    <?= !empty($notif_siswa) ? count($notif_siswa) : '' ?>
                                </span>
                            </a>

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="notifDropdown">

                                <!-- Header dengan background biru -->
                                <h6 class="dropdown-header bg-primary text-white">
                                    Notifikasi Diskusi
                                </h6>

                                <?php if (!empty($notif_siswa)): ?>
                                    <?php foreach ($notif_siswa as $n): ?>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="<?= base_url('siswa/notifikasi/baca/' . $n['id_diskusi']) ?>">

                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-comments text-white"></i>
                                                </div>
                                            </div>

                                            <div>
                                                <span class="font-weight-bold">
                                                    <?= esc($n['judul_materi']) ?>
                                                </span>
                                                <div class="small text-gray-500">
                                                    <?= date('d M Y H:i', strtotime($n['created_at'])) ?>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="dropdown-item text-center small text-gray-500">
                                        Tidak ada notifikasi baru
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small">
                                    <?= session()->get('nama_siswa') ?>
                                </span>
                                <?php
                                $foto = session()->get('foto_siswa');
                                $pathFoto = FCPATH . 'siswa/' . $foto;

                                if ($foto && file_exists($pathFoto)) {
                                    $urlFoto = base_url('siswa/' . $foto);
                                } else {
                                    $urlFoto = base_url('img/undraw_profile.svg');
                                }
                                ?>

                                <img class="img-profile rounded-circle"
                                    src="<?= $urlFoto ?>"
                                    style="width: 40px; height: 40px; object-fit: cover;">


                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <?= $this->renderSection('isi'); ?>
            </div>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Klik "Logout" jika kamu ingin keluar dari sesi.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function refreshNotifSiswa() {
            fetch("<?= base_url('siswa/notifikasi/cek') ?>")
                .then(res => res.json())
                .then(data => {
                    const badge = document.getElementById("notif-badge");

                    if (!badge) return;

                    if (data.jumlah > 0) {
                        badge.textContent = data.jumlah;
                        badge.style.display = 'inline-block';
                    } else {
                        badge.style.display = 'none';
                    }
                });
        }

        setInterval(refreshNotifSiswa, 5000);
        refreshNotifSiswa();
    </script>
</body>

</html>