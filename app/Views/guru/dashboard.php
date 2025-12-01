<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proyek Siswa</h1>
        <a href="<?= base_url('dashboard/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Tambah Proyek</a>
    </div>
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
                            <h5 class="card-title text-center"><?= esc($p['nama_proyek']) ?></h5>
                            <form action="<?= base_url('dashboard/delete/' . $p['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-danger mt-2 w-100">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-muted">Belum ada proyek ditambahkan.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Content Row -->


    <!-- Content Row -->


    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->

<?php $this->endSection(); ?>