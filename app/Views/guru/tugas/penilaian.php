<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="text-dark mb-1"><?= esc($tugas['judul']) ?></h4>
            <p class="mb-0">
                Kelas <?= esc($tugas['kelas_target']) ?> (<?= esc($tugas['semester']) ?>) – Tahun <?= esc($tugas['tahun_target']) ?>
            </p>
        </div>
        <a href="<?= base_url('guru/tugas') ?>" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>File</th>
                            <th>Nilai</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($siswa as $s): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($s['nama']) ?></td>
                                <td>
                                    <?php if ($s['file_tugas']) : ?>
                                        <a href="<?= base_url('materi/tugas/' . $s['file_tugas']) ?>" target="_blank">🔍 Preview</a>
                                    <?php else: ?>
                                        <span class="text-muted">Belum Upload</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($s['nilai'] ?? '-') ?></td>
                                <td><?= esc($s['komentar'] ?? '-') ?></td>
                                <td>
                                    <!-- Tombol modal nilai/edit -->
                                    <button class="btn btn-sm btn-<?= $s['nilai'] ? 'warning' : 'primary' ?>"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalNilai<?= $s['id_siswa'] ?>">
                                        <?= $s['nilai'] ? '✏️ Edit' : '📝 Nilai' ?>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalNilai<?= $s['id_siswa'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <form action="<?= base_url('guru/penilaian/nilai/' . $tugas['id_tugas']) ?>" method="post" class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Nilai - <?= esc($s['nama']) ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_siswa" value="<?= $s['id_siswa'] ?>">
                                                    <div class="mb-3">
                                                        <label for="nilai" class="form-label">Nilai</label>
                                                        <input type="number" name="nilai" min="0" max="100" value="<?= esc($s['nilai']) ?>" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="komentar" class="form-label">Komentar</label>
                                                        <textarea name="komentar" class="form-control" rows="3"><?= esc($s['komentar']) ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <?php if (empty($siswa)) : ?>
                            <tr><td colspan="6">Tidak ada data siswa</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
