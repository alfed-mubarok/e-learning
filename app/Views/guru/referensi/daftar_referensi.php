<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-dark">Daftar Referensi</h4>
        <a href="<?= base_url('guru/referensi/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success') ?> </div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-bordered text-center">
                <thead style="background-color: #DDC85E; color: black;">
                    <tr>
                        <th>No</th>
                        <th>Judul Referensi</th>
                        <th>Materi</th>
                        <th>Tahun Target</th>
                        <th>Link / File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($referensi as $ref) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($ref['nama_referensi']) ?></td>
                            <td>
                                Materi <?= $ref['nomor_materi'] ?><br>
                                <small><?= esc($ref['judul_materi']) ?></small>
                            </td>
                            <td><?= esc($ref['tahun_target']) ?></td>
                            <td>
                                <?php if ($ref['link']) : ?>
                                    <a href="<?= esc($ref['link']) ?>" target="_blank">🔗 Link</a><br>
                                <?php endif; ?>
                                <?php if ($ref['file']) : ?>
                                    <a href="<?= base_url('materi/referensi/' . $ref['file']) ?>" target="_blank">📄 File</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('guru/referensi/edit/' . $ref['id_referensi']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('guru/referensi/delete/' . $ref['id_referensi']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>