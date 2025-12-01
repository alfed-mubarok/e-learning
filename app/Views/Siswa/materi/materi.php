<?= $this->extend('siswa/layout/templatemurid'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <?php if (!empty($materi)): ?>
        <h4 class="text-dark mb-4"><?= esc($materi['judul']) ?></h4>
    <?php else: ?>
        <div class="alert alert-danger">Materi tidak ditemukan</div>
    <?php endif; ?>

    <?php if (!empty($materi['video_link'])): ?>
        <div class="mb-4">

            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                    src="<?= esc($materi['video_link']) ?>"
                    allowfullscreen></iframe>
            </div>
        </div>
    <?php elseif (!empty($materi['video_file'])): ?>
        <div class="mb-4">
            <video width="100%" controls>
                <source src="<?= base_url('materi/video/' . $materi['video_file']) ?>" type="video/mp4">
                Browser tidak mendukung video.
            </video>
        </div>
    <?php endif; ?>

    <?php $gambarList = json_decode($materi['gambar_json'], true);
    if (!empty($gambarList)):
    ?>
        <div class="mb-4">
            <label><strong>Gambar Materi:</strong></label><br>
            <?php foreach ($gambarList as $gambar): ?>
                <img src="<?= base_url('materi/gambar/' . $gambar) ?>" class="img-fluid mb-2" style="max-height: 250px;">
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($materi['file_materi'])): ?>
        <div class="mb-4">
            <?php if (strtolower(pathinfo($materi['file_materi'], PATHINFO_EXTENSION)) === 'pdf'): ?>
                <iframe src="<?= base_url('materi/file/' . $materi['file_materi']) ?>" width="100%" height="600px" style="border: 1px solid #ccc;"></iframe>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($materi['deskripsi'])): ?>
        <div class="mb-4">
            <label><strong>Rangkuman:</strong></label>
            <div class=" rounded bg-light">
                <?= nl2br(esc($materi['deskripsi'])) ?>
            </div>
        </div>
    <?php endif; ?>
    <hr>
    <h5>💬 Diskusi</h5>

    <?php foreach ($komentar as $k): ?>
        <div class="mb-2 p-2 bg-light">
            <div class="d-flex align-items-center mb-1">
                <img src="<?= base_url(
                                ($k['role'] === 'guru' ? 'guru/' : 'siswa/') . $k['foto']
                            ) ?>"
                    class="rounded-circle mr-2"
                    width="40" height="40"
                    onerror="this.src='<?= base_url('img/undraw_profile.svg') ?>';"
                    alt="foto">

                <div>
                    <strong><?= esc($k['nama']) ?></strong><br>
                    <small class="text-muted"><?= $k['waktu'] ?></small>
                    <div><?= esc($k['isi_pesan']) ?></div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
    <form action="<?= base_url('/siswa/materi/tambah_diskusi/' . $materi['id_materi']) ?>" method="post">
        <div class="form-group">
            <textarea name="isi_pesan" class="form-control" rows="3" required placeholder="Tulis komentar..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm mt-2">Kirim</button>
    </form>

    <?= $this->endSection(); ?>