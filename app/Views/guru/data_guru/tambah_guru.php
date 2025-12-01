<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800 mb-0">Tambah Guru</h1>
        <a href="<?= base_url('guru/data_guru') ?>" class="btn btn-dark btn-sm">
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
            <form action="<?= base_url('guru/data_guru/simpan') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>ID Guru (NIP / Username Login)</label>
                    <input type="text" name="id_guru" class="form-control"
                        value="<?= old('id_guru') ?>" required>
                </div>

                <div class="form-group">
                    <label>Password Login</label>
                    <input type="password" name="password" class="form-control" required>
                    <small class="text-muted">Minimal 6 karakter.</small>
                </div>

                <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control"
                        value="<?= old('nama_guru') ?>" required>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control"
                        value="<?= old('jabatan') ?>" required>
                </div>

                <div class="form-group">
                    <label>Foto Guru (Opsional)</label>
                    <input type="file" name="foto" class="form-control-file" accept="image/*">
                    <small class="form-text text-muted">Maks 2MB | JPG, JPEG, PNG</small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>