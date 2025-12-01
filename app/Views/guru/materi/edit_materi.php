<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Materi</h5>
            <a href="<?= base_url('guru/materi') ?>" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <form action="<?= base_url('guru/materi/update/' . $materi['id_materi']) ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Materi</label>
                            <input type="number" name="nomor_materi" class="form-control" value="<?= esc($materi['nomor_materi']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Judul Materi</label>
                            <input type="text" name="judul" class="form-control" value="<?= esc($materi['judul']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Tahun Target Siswa</label>
                            <input type="text" name="tahun_target" class="form-control" value="<?= esc($materi['tahun_target']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" value="<?= esc($materi['kelas']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control" required>
                                <option value="">-- Pilih Semester --</option>
                                <option value="ganjil" <?= $materi['semester'] == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                                <option value="genap" <?= $materi['semester'] == 'genap' ? 'selected' : '' ?>>Genap</option>
                            </select>

                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <select name="id_mapel" class="form-control" required>
                                    <?php foreach ($mapel as $m) : ?>
                                        <option value="<?= $m['id_mapel'] ?>" <?= $materi['id_mapel'] == $m['id_mapel'] ? 'selected' : '' ?>>
                                            <?= esc($m['nama_mapel']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rangkuman Materi</label>
                                <textarea name="deskripsi" class="form-control" rows="5" required><?= esc($materi['deskripsi']) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Link Video (YouTube)</label>
                                <input type="url" name="video_link" class="form-control" value="<?= esc($materi['video_link']) ?>">
                            </div>

                            <div class="form-group">
                                <label>Upload Video Baru (Kosongkan jika tidak diganti)</label>
                                <input type="file" name="video_file" class="form-control-file">
                                <?php if ($materi['video_file']) : ?>
                                    <small class="text-muted">File saat ini: <?= esc($materi['video_file']) ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label>Upload Gambar Baru (opsional, bisa multiple)</label>
                                <input type="file" name="gambar[]" class="form-control-file" multiple>
                                <?php
                                $gambarLama = json_decode($materi['gambar_json'], true);
                                if ($gambarLama) : ?>
                                    <div class="mt-2">
                                        <?php foreach ($gambarLama as $g) : ?>
                                            <img src="<?= base_url('public/materi/gambar/' . $g) ?>" alt="gambar" width="60" class="mr-2 mb-1 rounded">
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label>Upload File Materi Baru (Kosongkan jika tidak diganti)</label>
                                <input type="file" name="file_materi" class="form-control-file">
                                <?php if ($materi['file_materi']) : ?>
                                    <small class="text-muted">File saat ini: <?= esc($materi['file_materi']) ?></small>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Perbarui
                    </button>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>