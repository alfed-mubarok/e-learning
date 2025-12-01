<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kenaikan Kelas Siswa</h1>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form method="get" class="form-inline mb-4">
        <div class="form-group mr-2">
            <label for="kelas" class="mr-2">Kelas:</label>
            <select name="kelas" id="kelas" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="10" <?= @$_GET['kelas'] == '10' ? 'selected' : '' ?>>10</option>
                <option value="11" <?= @$_GET['kelas'] == '11' ? 'selected' : '' ?>>11</option>
            </select>
        </div>
        <div class="form-group mr-2">
            <label for="tahun" class="mr-2">Tahun Masuk:</label>
            <input type="text" name="tahun" id="tahun" class="form-control" placeholder="misal 2023" value="<?= esc($_GET['tahun'] ?? '') ?>">
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>

    <?php if (!empty($siswa)) : ?>
        <form method="post" action="<?= base_url('guru/kenaikankelas/proses') ?>">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Pilih</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelas Saat Ini</th>
                            <th>No Absen</th>
                            <th>Riwayat Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><input type="checkbox" name="naikkan[]" value="<?= $row['id_siswa'] ?>"></td>
                                <td><?= esc($row['id_siswa']) ?></td>
                                <td><?= esc($row['nama']) ?></td>
                                <td><?= esc($row['kelas']) ?></td>
                                <td><?= esc($row['no_absen']) ?></td>
                                <td><?= esc($row['kelas_terkini']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Kelas Baru:</label>
                    <select name="kelas_baru" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Semester:</label>
                    <select name="semester" class="form-control" required>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Tahun Ajaran Baru:</label>
                    <input type="text" name="tahun_baru" class="form-control" required placeholder="misal 2025/2026">
                </div>
            </div>

            <button type="submit" class="btn btn-success">Naikkan Kelas</button>
        </form>
    <?php elseif ($_GET) : ?>
        <div class="alert alert-warning">Tidak ada siswa ditemukan untuk filter tersebut.</div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>