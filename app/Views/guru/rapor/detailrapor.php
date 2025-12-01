<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid" style="color: #4F4747;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Detail Rekap Tugas</h3>
        <a href="<?= base_url('guru/rapor') ?>" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <p class="mb-2"><strong>Nama:</strong> <?= esc($siswa['nama']) ?></p>
    <p class="mb-2"><strong>Kelas:</strong> <?= esc($siswa['kelas']) ?> - <?= esc(ucfirst($semester)) ?></p>
    <p class="mb-2"><strong>Tahun Masuk:</strong> <?= esc($siswa['tahun_masuk']) ?></p>


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
    <table class="table table-bordered table-border-black">

        <thead>
            <tr class="text-center" style="color: #4F4747;">
                <th>No</th>
                <th>Materi</th>
                <th>Nilai</th>
                <th>Komentar Guru</th>
            </tr>
        </thead>
        <tbody style="color: #4F4747;">
            <?php if (count($pengumpulan) > 0): ?>
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
    <div class="d-flex justify-content-end mt-4 mr-1">
        <a href="<?= base_url('guru/rapor/cetak/' . $siswa['id_siswa'] . '?semester=' . urlencode($semester)) ?>" target="_blank" class="btn btn-danger btn-sm">
            🖨️ Cetak PDF
        </a>
    </div>

</div>
<?= $this->endSection(); ?>