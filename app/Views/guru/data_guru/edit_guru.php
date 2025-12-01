<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Guru</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
        <div class="alert alert-warning"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-body">
            <form action="<?= site_url('guru/data_guru/update/' . $guru['id_guru']) ?>"
                method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>ID Guru</label>
                    <input type="text" class="form-control" value="<?= $guru['id_guru'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control"
                        value="<?= $guru['nama_guru'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control"
                        value="<?= $guru['jabatan'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Foto Saat Ini</label><br>
                    <?php if ($guru['foto']): ?>
                        <img src="<?= base_url('guru/' . $guru['foto']) ?>" width="100">
                    <?php else: ?>
                        <p>Tidak ada foto.</p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Upload Foto Baru (Opsional)</label>
                    <input type="file" name="foto" class="form-control-file" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('guru/data_guru') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>