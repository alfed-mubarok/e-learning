<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>
<div class="container-fluid">

    <h3 class="mb-3">Rekap Tugas Siswa</h3>

    <form method="get" class="mb-3">
        <div class="row">
            <div class="col-md-3 mb-2">
                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" value="<?= esc($nama) ?>">
            </div>
            <div class="col-md-2 mb-2">
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="<?= esc($kelas) ?>">
            </div>
            <div class="col-md-2 mb-2">
                <input type="text" name="tahun" class="form-control" placeholder="Tahun Masuk" value="<?= esc($tahun) ?>">
            </div>
            <div class="col-md-3 mb-2">
                <select name="semester" class="form-control">
                    <option value="">-- Semester --</option>
                    <option value="Ganjil" <?= ($semester == 'Ganjil') ? 'selected' : '' ?>>Ganjil</option>
                    <option value="Genap" <?= ($semester == 'Genap') ? 'selected' : '' ?>>Genap</option>
                </select>
            </div>
            <div class="col-md-1 mb-2">
                <button type="submit" class="btn btn-primary w-100">🔍</button>
            </div>
            <div class="col-md-1 mb-2">
                <a href="<?= base_url('guru/rapor') ?>" class="btn btn-outline-secondary w-100">🔄</a>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tahun Masuk</th>
                <th>Rata-rata</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($siswa as $s): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($s['nama']) ?></td>
                    <td class="text-center">
                        <?= esc($s['kelas']) ?>
                        <?php if ($semester): ?>
                            <br><small class="text-muted">(<?= esc($semester) ?>)</small>
                        <?php elseif (!empty($s['semester_aktif'])): ?>
                            <br><small class="text-muted">(<?= esc($s['semester_aktif']) ?>)</small>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($s['tahun_masuk']) ?></td>
                    <td><?= $s['rata_rata'] ?></td>
                    <td>
                        <?= $s['rata_rata'] >= 75 ? '<span class="text-success">Lulus</span>' : '<span class="text-danger">Tidak Lulus</span>' ?>
                    </td>
                    <td>
                        <?php
                        $detailUrl = base_url('guru/rapor/detail/' . $s['id_siswa']);
                        if ($semester) {
                            $detailUrl .= '?semester=' . urlencode($semester);
                        }
                        ?>
                        <a href="<?= $detailUrl ?>" class="btn btn-sm btn-info">🔍 Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($siswa)) : ?>
                <tr>
                    <td colspan="7" class="text-center text-muted">Tidak ada data siswa</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>