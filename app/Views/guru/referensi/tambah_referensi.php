<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-dark">Input Referensi Materi</h4>
        <a href="<?= base_url('guru/referensi') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali ke Materi
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="<?= base_url('guru/referensi/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id_materi">Pilih Materi</label>
                    <select name="id_materi" class="form-control" required>
                        <option value="">-- Pilih Materi --</option>
                        <?php foreach ($materi as $m) : ?>
                            <option value="<?= $m['id_materi'] ?>">
                                Materi <?= $m['nomor_materi'] ?> - <?= esc($m['judul']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_referensi">Nama Referensi</label>
                    <input type="text" name="nama_referensi" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="link">Link Referensi (opsional)</label>
                    <input type="url" name="link" class="form-control">
                </div>

                <div class="form-group">
                    <label for="file">Upload File Referensi (opsional)</label>
                    <input type="file" name="file" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Referensi</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>