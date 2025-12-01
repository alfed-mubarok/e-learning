<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800 mb-0">Tambah Siswa</h1>
        <a href="<?= base_url('guru/murid') ?>" class="btn btn-dark btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

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
            <form action="<?= base_url('guru/murid/simpan') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>NISN (ID Siswa)</label>
                    <input type="text" name="id_siswa" class="form-control" value="<?= old('id_siswa') ?>" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" value="<?= old('nama') ?>" required>
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="<?= old('kelas') ?>" required>
                </div>

                <div class="form-group">
                    <label>No Absen</label>
                    <input type="number" name="no_absen" class="form-control" value="<?= old('no_absen') ?>" required>
                </div>

                <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" class="form-control" value="<?= old('tahun_masuk') ?>" min="2000" max="<?= date('Y') ?>" required>
                </div>

                <div class="form-group">
                    <label>Semester Awal</label>
                    <select name="semester" class="form-control" required>
                        <option value="">-- Pilih Semester --</option>
                        <option value="ganjil" <?= old('semester') == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                        <option value="genap" <?= old('semester') == 'genap' ? 'selected' : '' ?>>Genap</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto Siswa</label>
                    <input type="file" name="foto" class="form-control-file" accept="image/*" required>
                    <small class="form-text text-muted">Maksimal 2MB. Format: JPG, JPEG, PNG.</small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>