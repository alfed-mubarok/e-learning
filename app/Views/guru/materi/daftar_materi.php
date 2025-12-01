<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Materi</h1>
        <a href="<?= base_url('guru/materi/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead style="background-color: #DDC85E; font-weight: bold; color: #4F4747">
                <tr>
                    <th>No</th>
                    <th>Materi Ke-</th>
                    <th>Untuk Tahun</th>
                    <th>Judul Materi</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($materi)) : ?>
                    <?php $no = 1;
                    foreach ($materi as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>Materi <?= esc($row['nomor_materi']) ?></td>
                            <td><?= esc($row['tahun_target']) ?></td>
                            <td><?= esc($row['judul']) ?></td>
                            <td>
                                <?= esc($row['kelas'] ?? '-') ?>
                                <?= $row['semester'] ? '(' . esc($row['semester']) . ')' : '' ?>
                            </td>

                            <td><?= esc($row['nama_mapel']) ?></td>
                            <td>
                                <a href="<?= base_url('guru/materi/edit/' . $row['id_materi']) ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('guru/materi/hapus/' . $row['id_materi']) ?>" onclick="return confirm('Yakin ingin menghapus materi ini?')" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="<?= base_url('/diskusi/' . $row['id_materi']) ?>" class="btn btn-sm btn-outline-primary">
                                    💬 Diskusi
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">Belum ada data materi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</div>

<?= $this->endSection(); ?>