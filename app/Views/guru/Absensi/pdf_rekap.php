<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rekap Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <h2>Rekapitulasi Absensi Siswa</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>No Absen</th>
                <th>Tahun Masuk</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($absensi as $a): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($a['id_siswa']) ?></td>
                    <td><?= esc($a['nama']) ?></td>
                    <td><?= esc($a['kelas']) ?></td>
                    <td><?= esc($a['no_absen']) ?></td>
                    <td><?= esc($a['tahun_masuk']) ?></td>
                    <td><?= esc(date('d-m-Y', strtotime($a['tanggal_absensi']))) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>