<?= $this->extend('siswa/layout/templatemurid'); ?>
<?= $this->section('isi'); ?>

<div class="container mt-4">
    <h3 class="text-dark font-weight-bold"><?= esc($tugas['headline']) ?></h3>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted"><?= esc($tugas['kelas_target']) ?> - <?= esc($tugas['tahun_target']) ?></span>
        <div class="text-right">
            <strong>Due Date</strong><br>
            <?= date('M d, Y h:i A', strtotime($tugas['deadline'])) ?><br>
            <small class="text-danger"><?= hitungSisaWaktu($tugas['deadline']) ?></small>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <?= nl2br(esc($tugas['deskripsi'])) ?>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <strong>Submission</strong>
        </div>
        <div class="card-body">

            <?php if ($pengumpulan): ?>
                <div class="mb-3">
                    <p><strong>File Terkumpul:</strong><br>
                        <a href="<?= base_url('public/tugas/siswa/' . $pengumpulan['file_tugas']) ?>" target="_blank" class="btn btn-outline-info btn-sm">
                            🔍 Preview
                        </a>
                    </p>
                    <p><strong>Waktu Pengumpulan:</strong><br>
                        <?= date('d M Y H:i', strtotime($pengumpulan['waktu_kumpul'])) ?>
                    </p>
                    <p><strong>Nilai:</strong><br>
                        <?= $pengumpulan['nilai'] ?? '<em>Belum dinilai</em>' ?>
                    </p>
                    <p><strong>Komentar Guru:</strong><br>
                        <?= esc($pengumpulan['komentar'] ?? '-') ?>
                    </p>
                </div>

                <hr>

                <form action="<?= base_url('siswa/tugas/kumpulkan/' . $tugas['id_tugas']) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Update File Tugas</label>
                        <input type="file" name="file" class="form-control" required>
                        <small class="form-text text-muted">File berupa .pdf, .doc, .docx</small>
                    </div>
                    <button type="submit" class="btn btn-warning mt-2">Update Tugas</button>
                </form>

            <?php else: ?>
                <form action="<?= base_url('siswa/tugas/kumpulkan/' . $tugas['id_tugas']) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Upload File disini</label>
                        <input type="file" name="file" class="form-control" required>
                        <small class="form-text text-muted">File berupa .pdf, .doc, .docx</small>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            <?php endif; ?>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>