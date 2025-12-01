<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-dark">Daftar Tugas</h4>
        <a href="<?= base_url('guru/tugas/tambah') ?>" class="btn btn-primary btn-sm">+ Tambah Tugas</a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="background-color: #DDC85E; font-weight: bold; color: #4F4747">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Materi</th>
                            <th>Deadline</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($tugas as $t) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>Materi <?= $t['nomor_materi'] ?> - <?= esc($t['judul']) ?></td>
                                <td><?= date('d M Y - H:i', strtotime($t['deadline'])) ?></td>
                                <td class="text-center">
    <?= esc($t['kelas_target']) ?> (<?= esc($t['semester']) ?>)<br>
    <small><?= esc($t['tahun_target']) ?></small>
</td>
                                <td class="text-center">
                                    <a href="<?= base_url('guru/tugas/penilaian/' . $t['id_tugas']) ?>" class="btn btn-info btn-sm">📝 Nilai</a>
                                    <a href="<?= base_url('guru/tugas/edit/' . $t['id_tugas']) ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <a href="<?= base_url('guru/tugas/hapus/' . $t['id_tugas']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus tugas ini?')">🗑 Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($tugas)) : ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada tugas</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        
</div>

<?= $this->endSection(); ?>
