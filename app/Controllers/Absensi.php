<?php
// app/Controllers/Absensi.php
namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\AbsensiModel;
use Dompdf\Dompdf;

class Absensi extends BaseGuru
{
    public function grafik()
    {
        $absensiModel = new AbsensiModel();

        // ===============================
        // 1. RANGE TANGGAL
        // ===============================
        $tawal  = $this->request->getGet('tawal');
        $takhir = $this->request->getGet('takhir');

        if (!$tawal)  $tawal = date('Y-m-01');
        if (!$takhir) $takhir = date('Y-m-d');

        $today = date('Y-m-d');
        $year  = date('Y');

        // ===============================
        // 2. HARIAN KELAS 10
        // ===============================
        $hari10 = ['hadir' => 0, 'izin' => 0, 'sakit' => 0, 'alfa' => 0];

        $result10 = (new AbsensiModel())
            ->select("keterangan, COUNT(*) AS total")
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
            ->where('tb_siswa.kelas', '10')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->groupBy('keterangan')
            ->findAll();

        foreach ($result10 as $r) {
            $hari10[$r['keterangan']] = $r['total'];
        }

        // ===============================
        // 3. HARIAN KELAS 11
        // ===============================
        $hari11 = ['hadir' => 0, 'izin' => 0, 'sakit' => 0, 'alfa' => 0];

        $result11 = (new AbsensiModel())
            ->select("keterangan, COUNT(*) AS total")
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
            ->where('tb_siswa.kelas', '11')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->groupBy('keterangan')
            ->findAll();

        foreach ($result11 as $r) {
            $hari11[$r['keterangan']] = $r['total'];
        }

        // ===============================
        // 4. BULANAN KELAS 10
        // ===============================
        $bulan10 = array_fill(0, 12, ['hadir' => 0, 'izin' => 0, 'sakit' => 0, 'alfa' => 0]);

        $resultB10 = (new AbsensiModel())
            ->select("MONTH(tanggal_absensi) AS bulan, keterangan, COUNT(*) AS total")
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
            ->where('tb_siswa.kelas', '10')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->groupBy('bulan, keterangan')
            ->findAll();

        foreach ($resultB10 as $r) {
            $bulan10[$r['bulan'] - 1][$r['keterangan']] = $r['total'];
        }

        // ===============================
        // 5. BULANAN KELAS 11
        // ===============================
        $bulan11 = array_fill(0, 12, ['hadir' => 0, 'izin' => 0, 'sakit' => 0, 'alfa' => 0]);

        $resultB11 = (new AbsensiModel())
            ->select("MONTH(tanggal_absensi) AS bulan, keterangan, COUNT(*) AS total")
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
            ->where('tb_siswa.kelas', '11')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->groupBy('bulan, keterangan')
            ->findAll();

        foreach ($resultB11 as $r) {
            $bulan11[$r['bulan'] - 1][$r['keterangan']] = $r['total'];
        }

        // ===============================
        // 6. TOP 5
        // ===============================

        $topAlfa = (new AbsensiModel())
            ->select("tb_siswa.nama, tb_siswa.kelas, COUNT(*) AS total")
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
            ->where('keterangan', 'alfa')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->groupBy('tb_siswa.id_siswa')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->findAll();

        $topIzin = (new AbsensiModel())
            ->select("tb_siswa.nama, tb_siswa.kelas, COUNT(*) AS total")
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
            ->where('keterangan', 'izin')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->groupBy('tb_siswa.id_siswa')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->findAll();

        $topSakit = (new AbsensiModel())
            ->select("tb_siswa.nama, tb_siswa.kelas, COUNT(*) AS total")
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
            ->where('keterangan', 'sakit')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->groupBy('tb_siswa.id_siswa')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->findAll();

        // ===============================
        // 7. PERSENTASE
        // ===============================
        $izin = (new AbsensiModel())
            ->where('keterangan', 'izin')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->countAllResults();

        $sakit = (new AbsensiModel())
            ->where('keterangan', 'sakit')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->countAllResults();

        $alfa = (new AbsensiModel())
            ->where('keterangan', 'alfa')
            ->where("DATE(tanggal_absensi) BETWEEN '$tawal' AND '$takhir'")
            ->countAllResults();

        $persen = [
            'izin'  => $izin,
            'sakit' => $sakit,
            'alfa'  => $alfa
        ];

        return view('guru/absensi/grafik_absensi', [
            'hari10' => $hari10,
            'hari11' => $hari11,
            'bulan10' => $bulan10,
            'bulan11' => $bulan11,
            'topAlfa' => $topAlfa,
            'topIzin' => $topIzin,
            'topSakit' => $topSakit,
            'persen' => $persen,
            'tahun' => $year,
            'today' => $today,
            'tawal' => $tawal,
            'takhir' => $takhir
        ]);
    }


    public function rekap()
    {
        $absensiModel = new AbsensiModel();

        $tanggalAwal  = $this->request->getGet('tanggal_awal');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');
        $kelas        = $this->request->getGet('kelas');
        $tahun        = $this->request->getGet('tahun');

        $builder = $absensiModel->select('tb_absensi.*, tb_siswa.nama, tb_siswa.kelas, tb_siswa.tahun_masuk, tb_siswa.no_absen, tb_siswa.id_siswa')
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa');

        if ($tanggalAwal && $tanggalAkhir) {
            $builder->where("DATE(tanggal_absensi) BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
        }
        if ($kelas) {
            $builder->where('tb_siswa.kelas', $kelas);
        }
        if ($tahun) {
            $builder->where('tb_siswa.tahun_masuk', $tahun);
        }

        $data['absensi']       = $builder->findAll();
        $data['tanggal_awal']  = $tanggalAwal;
        $data['tanggal_akhir'] = $tanggalAkhir;
        $data['kelas']         = $kelas;
        $data['tahun']         = $tahun;

        return view('guru/absensi/rekapabsensi', $data);
    }

    public function cetak()
    {
        $absensiModel = new AbsensiModel();

        $tanggalAwal  = $this->request->getGet('tanggal_awal');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');
        $kelas        = $this->request->getGet('kelas');
        $tahun        = $this->request->getGet('tahun');

        $builder = $absensiModel->select('tb_absensi.*, tb_siswa.nama, tb_siswa.kelas, tb_siswa.tahun_masuk, tb_siswa.no_absen, tb_siswa.id_siswa')
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa');

        if ($tanggalAwal && $tanggalAkhir) {
            $builder->where("DATE(tanggal_absensi) BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
        }
        if ($kelas) {
            $builder->where('tb_siswa.kelas', $kelas);
        }
        if ($tahun) {
            $builder->where('tb_siswa.tahun_masuk', $tahun);
        }

        $data['absensi'] = $builder->findAll();

        $html = view('guru/absensi/pdf_rekap', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('rekap-absensi.pdf', ['Attachment' => false]);
    }

    public function form()
    {
        return view('Siswa/absensi/absensiswa');
    }

    public function exportExcel()
    {
        $absensiModel = new AbsensiModel();

        $tanggalAwal  = $this->request->getGet('tanggal_awal');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');
        $kelas        = $this->request->getGet('kelas');
        $tahun        = $this->request->getGet('tahun');

        $builder = $absensiModel->select('tb_absensi.*, tb_siswa.nama, tb_siswa.kelas, tb_siswa.tahun_masuk, tb_siswa.no_absen, tb_siswa.id_siswa')
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa');

        if ($tanggalAwal && $tanggalAkhir) {
            $builder->where("DATE(tanggal_absensi) BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
        }
        if ($kelas) {
            $builder->where('tb_siswa.kelas', $kelas);
        }
        if ($tahun) {
            $builder->where('tb_siswa.tahun_masuk', $tahun);
        }

        $absensi = $builder->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->fromArray(['No', 'NISN', 'Nama', 'Kelas', 'No Absen', 'Tahun Masuk', 'Tanggal'], null, 'A1');

        // Data
        $no = 1;
        $row = 2;
        foreach ($absensi as $a) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $a['id_siswa']);
            $sheet->setCellValue('C' . $row, $a['nama']);
            $sheet->setCellValue('D' . $row, $a['kelas']);
            $sheet->setCellValue('E' . $row, $a['no_absen']);
            $sheet->setCellValue('F' . $row, $a['tahun_masuk']);
            $sheet->setCellValue('G' . $row, $a['tanggal_absensi']);
            $row++;
        }

        $filename = 'rekap_absensi_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function autoAlfa()
    {
        $absensiModel = new \App\Models\AbsensiModel();
        $siswaModel   = new \App\Models\SiswaModel();

        $tanggalHariIni = date('Y-m-d');
        $kelasList = ['10', '11']; // Bisa ditambah kelas lain nanti

        foreach ($kelasList as $kelas) {

            // 1. Hitung jumlah siswa yang sudah absen hari ini di kelas ini
            $jumlahAbsen = $absensiModel
                ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
                ->where('tb_siswa.kelas', $kelas)
                ->where('DATE(tanggal_absensi)', $tanggalHariIni)
                ->countAllResults();

            // 2. Kalau kurang dari 5 = dianggap tidak ada jadwal
            if ($jumlahAbsen < 5) {
                continue; // Skip kelas ini, jangan auto alfa
            }

            // 3. Ambil semua siswa kelas ini
            $siswaKelas = $siswaModel->where('kelas', $kelas)->findAll();

            // 4. Loop siswa dan cek siapa yang belum absen
            foreach ($siswaKelas as $siswa) {

                $sudahAbsen = $absensiModel
                    ->where('id_siswa', $siswa['id_siswa'])
                    ->where('DATE(tanggal_absensi)', $tanggalHariIni)
                    ->first();

                // 5. Jika belum absen → AUTO ALFA
                if (!$sudahAbsen) {
                    $absensiModel->insert([
                        'id_siswa'        => $siswa['id_siswa'],
                        'foto_siswa'      => 'auto.png', // placeholder
                        'keterangan'      => 'alfa',
                        'tanggal_absensi' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        return "AUTO ALFA SELESAI ✅";
    }
}
