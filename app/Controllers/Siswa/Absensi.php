<?php

namespace App\Controllers\Siswa;
use App\Controllers\BaseMurid;
use App\Models\AbsensiModel;

class Absensi extends BaseMurid
{
    public function simpan()
{
    $idSiswa = session()->get('id_user');
    $status = $this->request->getPost('status'); // hadir / izin / sakit
    $keterangan = $this->request->getPost('keterangan');

    // Validasi status
    if (!in_array($status, ['hadir', 'izin', 'sakit'])) {
        return redirect()->back()->with('error', 'Status absensi tidak valid.');
    }

    // Validasi keterangan untuk izin & sakit
    if (($status == 'izin' || $status == 'sakit') && empty($keterangan)) {
        return redirect()->back()->with('error', 'Keterangan wajib diisi untuk izin atau sakit.');
    }

    // Validasi foto
    $base64Image = $this->request->getPost('foto');
    if (!$base64Image) {
        return redirect()->back()->with('error', 'Gagal mengambil gambar.');
    }

    // Proses simpan foto
    $image = str_replace('data:image/png;base64,', '', $base64Image);
    $image = base64_decode($image);
    $namaFile = uniqid() . '.png';
    $path = FCPATH . 'absen/' . $namaFile;
    file_put_contents($path, $image);

    // Simpan ke database
    $absenModel = new AbsensiModel();
    $absenModel->insert([
        'id_siswa'       => $idSiswa,
        'foto_siswa'     => $namaFile,
        'status'         => $status,
        'keterangan'     => $keterangan,
        'tanggal_absensi'=> date('Y-m-d H:i:s')
    ]);

    return redirect()->to('/siswa/absensi')->with('success', 'Absensi berhasil disimpan.');
    }

    public function form()
    {
    date_default_timezone_set('Asia/Jakarta'); // penting biar jam sesuai WIB

    $now = date('H:i');

    if ($now < '06:45') {
        $statusAbsensi = 'belum_buka';
    } elseif ($now > '15:00') {
        $statusAbsensi = 'tutup';
    } else {
        $statusAbsensi = 'buka';
    }

    return view('siswa/absensi/absensiswa', [
        'statusAbsensi' => $statusAbsensi
    ]);
    }
}
