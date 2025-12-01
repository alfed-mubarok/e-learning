<!DOCTYPE html>
<html>

<head>
    <title>Rekap Tugas - <?= esc($siswa['nama']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Rapor Siswa<br>Desain Komunikasi Visual</h2>

    <p>
        <strong>Nama:</strong> <?= esc($siswa['nama']) ?><br>
        <strong>Kelas:</strong> <?= esc($siswa['kelas']) ?> - <?= esc(ucfirst($semester)) ?><br>
        <strong>Tahun Masuk:</strong> <?= esc($siswa['tahun_masuk']) ?>
    </p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Materi</th>
                <th>Nilai</th>
                <th>Komentar</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($pengumpulan)): ?>
                <?php $no = 1;
                foreach ($pengumpulan as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($p['judul_materi']) ?></td>
                        <td><?= $p['nilai'] !== null ? esc($p['nilai']) : 0 ?></td>
                        <td><?= esc($p['komentar']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Belum ada nilai untuk semester ini</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br><br><br>

    <div style="width:150px; float:right; text-align:center;">
        <p>TTD</p><br><br><br>
        <strong>Guru Pengampu</strong>
    </div>

</body>

</html>