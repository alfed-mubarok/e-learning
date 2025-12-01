<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800 mb-0">Tambah Materi Baru</h1>
            <a href="<?= base_url('guru/materi') ?>" class="btn btn-dark btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <form action="<?= base_url('guru/materi/simpan') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Materi</label>
                            <input type="number" name="nomor_materi" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Judul Materi</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Tahun Target Siswa</label>
                            <input type="text" name="tahun_target" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control" required>
                                <option value="">-- Pilih Semester --</option>
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>
                            </select>

                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <select name="id_mapel" class="form-control" required>
                                    <option value="">-- Pilih Mapel --</option>
                                    <?php foreach ($mapel as $m) : ?>
                                        <option value="<?= $m['id_mapel'] ?>"><?= esc($m['nama_mapel']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rangkuman Materi</label>
                                <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Link Video (YouTube)</label>
                                <input type="url" name="video_link" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Upload Video</label>
                                <input type="file" name="video_file" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label>Upload Gambar (boleh lebih dari 1)</label>
                                <input type="file" name="gambar[]" class="form-control-file" multiple>
                            </div>

                            <div class="form-group">
                                <label>Upload File Materi</label>
                                <input type="file" name="file_materi" class="form-control-file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>