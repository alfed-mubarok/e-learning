<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Proyek Siswa</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form action="<?= base_url('dashboard/store') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_proyek">Nama Proyek</label>
                    <input type="text" name="nama_proyek" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Proyek</label>
                    <input type="file" name="gambar" class="form-control-file" required>
                </div>
                <div class="form-group">
                    <label for="link_proyek">Link Proyek</label>
                    <input type="url" name="link_proyek" class="form-control" placeholder="https://contoh.com" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>