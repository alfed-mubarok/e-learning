<?= $this->extend('siswa/layout/templatemurid'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="text-dark">Proyek Siswa</h4>
    </div>

    <!-- Daftar Proyek -->
    <div class="row mt-4">
        <?php if (!empty($proyek)): ?>
            <?php foreach ($proyek as $p): ?>
                <div class="col-md-3 mb-4">
                    <div class="card shadow">
                        <a href="<?= $p['link'] ?>" target="_blank">
                            <img src="<?= base_url('uploads/' . $p['gambar']) ?>"
                                class="card-img-top"
                                style="height: 200px; object-fit: cover; object-position: center;">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title text-center"><?= esc($p['nama_proyek']) ?></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-muted">Belum ada proyek yang ditampilkan.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>