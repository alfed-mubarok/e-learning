<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">

    <h3 class="mb-3">Data Guru</h3>

    <a href="<?= base_url('guru/data_guru/tambah') ?>" class="btn btn-primary mb-3">
        + Tambah Guru
    </a>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($guru as $g): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($g['nama_guru']) ?></td>
                    <td><?= esc($g['jabatan']) ?></td>
                    <td>
                        <a href="<?= base_url('guru/data_guru/edit/' . $g['id_guru']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('guru/data_guru/hapus/' . $g['id_guru']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data guru?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<?= $this->endSection(); ?>