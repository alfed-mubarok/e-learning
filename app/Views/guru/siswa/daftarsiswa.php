<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Siswa</h1>
        <a href="<?= base_url('guru/murid/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead style="background-color: #DDC85E; font-weight: bold; color: #4F4747">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Absen</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Tahun Masuk</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($siswa)): $no = 1; ?>
                    <?php foreach ($siswa as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['nama']) ?></td>
                            <td><?= esc($row['id_siswa']) ?></td>
                            <td><?= esc($row['no_absen']) ?></td>
                            <td><?= esc($row['kelas']) ?></td>
                            <td>
                                <?php
                                // Ambil semester terakhir dari riwayat kelas
                                $db = db_connect();
                                $riwayat = $db->table('riwayat_kelas')
                                    ->where('id_siswa', $row['id_siswa'])
                                    ->orderBy('timestamp', 'DESC')
                                    ->get()
                                    ->getRowArray();
                                echo $riwayat ? esc(ucfirst($riwayat['semester'])) : '-';
                                ?>
                            </td>
                            <td><?= esc($row['tahun_masuk']) ?></td>
                            <td>
                                <a href="<?= base_url('murid/edit/' . $row['id_siswa']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('murid/hapus/' . $row['id_siswa']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-muted">Belum ada data siswa.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>