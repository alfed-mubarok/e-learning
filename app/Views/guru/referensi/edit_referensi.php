<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-dark">Edit Referensi</h4>
        <a href="<?= base_url('guru/referensi') ?>" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="<?= base_url('guru/referensi/update/' . $referensi['id_referensi']) ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="id_materi" class="form-label">Materi</label>
                    <<select name="id_materi" id="id_materi" class="form-control" required>
                        <option value="">-- Pilih Materi --</option>
                        <?php foreach ($materi as $m): ?>
                            <option value="<?= $m['id_materi'] ?>">
                                Materi <?= $m['nomor_materi'] ?> - <?= esc($m['judul']) ?> - <?= esc($m['kelas']) ?> - <?= esc($m['tahun_target']) ?>
                            </option>
                        <?php endforeach ?>
                        </select>
                </div>
                <div class="mb-3">
                    <label for="nama_referensi" class="form-label">Judul Referensi</label>
                    <input type="text" name="nama_referensi" class="form-control" value="<?= esc($referensi['nama_referensi']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link (opsional)</label>
                    <input type="url" name="link" class="form-control" value="<?= esc($referensi['link']) ?>">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Ganti File (opsional)</label>
                    <input type="file" name="file" class="form-control">
                    <?php if ($referensi['file']) : ?>
                        <small>File saat ini: <a href="<?= base_url('materi/referensi/' . $referensi['file']) ?>" target="_blank">Lihat</a></small>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>