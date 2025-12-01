<?= $this->extend('Siswa/Layout/templatemurid') ?>
<?= $this->section('isi') ?>

<div class="container-fluid" style="color:#4F4747;">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Detail Rekap Tugas</h3>
    </div>
    <form method="get" class="form-inline mb-3">

        <label class="mr-2 font-weight-bold">Kelas</label>
        <select name="kelas" class="form-control mr-3">
            <option value="">-- Kelas Saya (<?= esc($kelasSiswa) ?>) --</option>
            <option value="10" <?= $kelasFilter == '10' ? 'selected' : '' ?>>10</option>
            <option value="11" <?= $kelasFilter == '11' ? 'selected' : '' ?>>11</option>
            <option value="12" <?= $kelasFilter == '12' ? 'selected' : '' ?>>12</option>
        </select>

        <label class="mr-2 font-weight-bold">Semester</label>
        <select name="semester" class="form-control mr-3">
            <option value="">-- Pilih Semester --</option>
            <option value="ganjil" <?= $semester == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
            <option value="genap" <?= $semester == 'genap' ? 'selected' : '' ?>>Genap</option>
        </select>

        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>

    <p class="mb-1"><strong>Nama:</strong> <?= esc($siswa['nama']) ?></p>
    <p class="mb-1"><strong>Kelas:</strong> <?= esc($siswa['kelas']) ?> - <?= esc(ucfirst($semester)) ?></p>
    <p class="mb-1"><strong>Tahun Masuk:</strong> <?= esc($siswa['tahun_masuk']) ?></p>

    <style>
        .table-border-black th,
        .table-border-black td {
            border-color: #4F4747;
            border: 2px solid !important;
        }

        .table-border-black {
            border-collapse: collapse;
        }
    </style>

    <table class="table table-bordered table-border-black mt-3">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Materi</th>
                <th>Nilai</th>
                <th>Komentar Guru</th>
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
                    <td colspan="4" class="text-center text-muted">Belum ada tugas yang dinilai</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-4">
        <a href="<?= base_url('siswa/rapor/cetak?semester=' . urlencode($semester)) ?>"
            target="_blank" class="btn btn-danger btn-sm">
            🖨️ Cetak PDF
        </a>
    </div>

</div>

<?= $this->endSection() ?>