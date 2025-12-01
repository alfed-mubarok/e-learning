<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-dark">Edit Tugas</h4>
        <a href="<?= base_url('guru/tugas') ?>" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <form action="<?= base_url('guru/tugas/update/' . $tugas['id_tugas']) ?>" method="post" enctype="multipart/form-data">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="id_materi">Pilih Materi</label>
                    <select name="id_materi" id="id_materi" class="form-control" required>
                        <?php foreach ($materi as $m) : ?>
                            <option value="<?= $m['id_materi'] ?>" <?= $tugas['id_materi'] == $m['id_materi'] ? 'selected' : '' ?>>
                                Materi <?= $m['nomor_materi'] ?> - <?= esc($m['judul']) ?> (<?= $m['kelas'] ?> - <?= $m['tahun_target'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="headline">Judul/Headline Tugas</label>
                    <input type="text" name="headline" id="headline" class="form-control" value="<?= esc($tugas['headline']) ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi Tugas</label>
                    <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control" required><?= esc($tugas['deskripsi']) ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="deadline">Deadline</label>
                    <input type="datetime-local" name="deadline" id="deadline" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($tugas['deadline'])) ?>" required>
                </div>

                <?php if (!empty($tugas['file_pendukung'])) : ?>
                    <div class="form-group mb-3">
                        <label>File Sebelumnya:</label>
                        <p><a href="<?= base_url('public/materi/tugas/' . $tugas['file_pendukung']) ?>" target="_blank">Lihat File</a></p>
                    </div>
                <?php endif; ?>

                <div class="form-group mb-3">
                    <label for="file_pendukung">Ganti File Pendukung (Opsional)</label>
                    <input type="file" name="file_pendukung" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>