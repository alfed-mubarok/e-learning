<?= $this->extend('guru/layout/templateguru') ?>
<?= $this->section('isi') ?>

<div class="container">
    <h4 class="mb-4">📢 Notifikasi Diskusi Baru</h4>

    <?php if (empty($notifikasi)): ?>
        <div class="alert alert-info">Tidak ada diskusi baru.</div>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($notifikasi as $n): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?= $n['judul'] ?></strong><br>
                        <small><?= $n['pesan'] ?></small><br>
                        <small class="text-muted">🕒 <?= date('d M Y H:i', strtotime($n['tanggal'])) ?></small>
                    </div>
                    <a href="<?= base_url('diskusi/index/' . $n['id_materi']) ?>" class="btn btn-sm btn-primary">Lihat</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>