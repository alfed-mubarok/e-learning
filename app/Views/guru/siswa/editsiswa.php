<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800 mb-0">Edit Siswa</h1>
        <a href="<?= base_url('guru/murid') ?>" class="btn btn-dark btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i> <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-body">
            <form action="<?= base_url('murid/update/' . $siswa['id_siswa']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>NISN (ID Siswa)</label>
                    <input type="text" class="form-control" value="<?= esc($siswa['id_siswa']) ?>" disabled>
                </div>

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" value="<?= old('nama', $siswa['nama']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="<?= old('kelas', $siswa['kelas']) ?>" required>
                </div>

                <div class="form-group">
                    <label>No Absen</label>
                    <input type="number" name="no_absen" class="form-control" value="<?= old('no_absen', $siswa['no_absen']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" class="form-control" value="<?= old('tahun_masuk', $siswa['tahun_masuk']) ?>" min="2000" max="<?= date('Y') ?>" required>
                </div>

                <div class="form-group">
                    <label>Semester Saat Ini</label>
                    <select name="semester" class="form-control" required>
                        <option value="">-- Pilih Semester --</option>
                        <option value="ganjil" <?= old('semester') == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                        <option value="genap" <?= old('semester') == 'genap' ? 'selected' : '' ?>>Genap</option>
                    </select>
                    <small class="form-text text-muted">Semester ini akan dimasukkan ke dalam riwayat kelas jika belum ada.</small>
                </div>

                <div class="form-group">
                    <label>Foto Siswa (jika ingin mengganti)</label>
                    <input type="file" name="foto" class="form-control-file" accept="image/*">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                </div>

                <?php if (!empty($siswa['foto']) && file_exists(FCPATH . 'siswa/' . $siswa['foto'])): ?>
                    <div class="mb-3">
                        <label>Foto Saat Ini:</label><br>
                        <img src="<?= base_url('siswa/' . $siswa['foto']) ?>" alt="Foto Siswa" class="img-thumbnail" style="max-width: 150px;">
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>