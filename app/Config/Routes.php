<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);
$routes->get('/', 'pages::index');
$routes->get('logout', 'Login::logout');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('dashboard/create', 'Dashboard::create');
$routes->post('dashboard/store', 'Dashboard::store');
$routes->post('dashboard/delete/(:num)', 'Dashboard::delete/$1');
$routes->get('guru/murid', 'Murid::index');
$routes->get('guru/murid/tambah', 'Murid::tambah');
$routes->post('guru/murid/simpan', 'Murid::simpan');
$routes->get('guru/murid/edit/(:any)', 'Murid::edit/$1');
$routes->post('guru/murid/update/(:any)', 'Murid::update/$1');
$routes->get('guru/murid/hapus/(:any)', 'Murid::hapus/$1');
$routes->get('siswa/absensi', 'Siswa\Absensi::form');
$routes->post('siswa/absensi/simpan', 'Siswa\Absensi::simpan');
$routes->get('guru/absensi/grafik_absensi', 'Absensi::grafik');
$routes->get('guru/absensi/rekap', 'Absensi::rekap');
$routes->get('guru/absensi/rekap/cetak', 'Absensi::cetak');
$routes->get('guru/absensi/auto-alfa', 'Absensi::autoAlfa');
$routes->get('guru/materi', 'Materi::index');
$routes->get('guru/materi/tambah', 'Materi::tambah');
$routes->post('guru/materi/simpan', 'Materi::simpan');
$routes->get('guru/materi/edit/(:num)', 'Materi::edit/$1');
$routes->post('guru/materi/update/(:num)', 'Materi::update/$1');
$routes->get('guru/materi/hapus/(:num)', 'Materi::hapus/$1');
$routes->post('guru/materi/tambah_referensi/(:num)', 'Materi::tambah_referensi/$1');
$routes->get('guru/materi/hapus_referensi/(:num)/(:num)', 'Materi::hapus_referensi/$1/$2');
$routes->get('guru/referensi', 'Referensi::index');
$routes->get('guru/referensi/tambah', 'Referensi::tambah');
$routes->post('guru/referensi/simpan', 'Referensi::simpan');
$routes->get('guru/referensi/edit/(:num)', 'Referensi::edit/$1');
$routes->post('guru/referensi/update/(:num)', 'Referensi::update/$1');
$routes->get('guru/referensi/delete/(:num)', 'Referensi::delete/$1');
$routes->get('guru/tugas', 'Tugas::index');
$routes->get('guru/tugas/tambah', 'Tugas::tambah');
$routes->post('guru/tugas/simpan', 'Tugas::simpan');
$routes->get('guru/tugas/edit/(:num)', 'Tugas::edit/$1');
$routes->post('guru/tugas/update/(:num)', 'Tugas::update/$1');
$routes->get('guru/tugas/hapus/(:num)', 'Tugas::hapus/$1');
$routes->get('/diskusi/(:num)', 'Diskusi::index/$1');
$routes->post('/diskusi/kirim', 'Diskusi::kirim');
$routes->get('notifikasi/cek', 'Notifikasi::cek');
$routes->get('guru/notifikasi', 'Notifikasi::list');
$routes->get('siswa/materi/(:num)', 'Siswa\Materi::detail/$1');
$routes->get('siswa/materi/detail/(:num)', 'Siswa\Materi::detail/$1');
$routes->post('siswa/materi/tambah_diskusi/(:num)', 'Siswa\Materi::tambah_diskusi/$1');
$routes->get('/diskusi/(:num)', 'Diskusi::index/$1');
$routes->post('login', 'Login::index');
$routes->get('login', 'Login::index');
$routes->get('guru/dashboard', 'Dashboard::index');
$routes->get('notifikasi/baca/(:num)', 'Notifikasi::baca/$1');
$routes->post('guru/penilaian/nilai/(:num)', 'Penilaian::nilai/$1');
$routes->get('guru/tugas/penilaian/(:num)', 'Tugas::penilaian/$1');
$routes->get('siswa/tugas/detail/(:num)', 'Siswa\Tugas::detail/$1');
$routes->post('siswa/tugas/kumpulkan/(:num)', 'Siswa\Tugas::kumpulkan/$1');
$routes->get('siswa/tugas/ambilmateri/(:num)', 'Siswa\Tugas::AmbilMateri/$1');
$routes->post('siswa/tugas/kumpulkan/(:num)', 'Siswa\Tugas::kumpulkan/$1');
$routes->get('guru/rapor', 'Rapor::index');
$routes->get('guru/rapor/detail/(:num)', 'Rapor::detail/$1');
$routes->get('guru/rapor/cetak/(:num)', 'Rapor::cetak/$1');
$routes->get('siswa/referensi/(:num)', 'Siswa\Referensi::index/$1');
$routes->get('guru/kenaikankelas', 'KenaikanKelas::index');
$routes->post('guru/kenaikankelas/proses', 'KenaikanKelas::proses');
$routes->get('siswa/rapor', 'Siswa\Rapor::index');
$routes->get('siswa/rapor/cetak', 'Siswa\Rapor::cetak');
$routes->get('guru/data_guru', 'Guru::index');
$routes->get('guru/data_guru/tambah', 'Guru::tambah');
$routes->post('guru/data_guru/simpan', 'Guru::simpan');
$routes->get('guru/data_guru/edit/(:any)', 'Guru::edit/$1');
$routes->post('guru/data_guru/update/(:any)', 'Guru::update/$1');
$routes->get('guru/data_guru/hapus/(:any)', 'Guru::hapus/$1');  
$routes->get('siswa/notifikasi/cek', 'Siswa\Notifikasi::cek');
$routes->get('siswa/notifikasi/baca/(:num)', 'Siswa\Notifikasi::baca/$1');


