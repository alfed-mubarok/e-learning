<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">

    <!-- HEADER + BACK BUTTON -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800 mb-0">Rekap Absensi</h1>

        <a href="<?= base_url('guru/absensi/grafik_absensi') ?>" class="btn btn-dark btn-sm  px-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- FILTER + EXPORT BUTTONS -->
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#filterForm">
            <i class="fas fa-filter"></i> Tampilkan Filter
        </button>

        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exportModal">
            <i class="fas fa-download"></i> Unduh Rekap
        </button>
    </div>

    <!-- FILTER FORM -->
    <div class="collapse" id="filterForm">
        <div class="card card-body mb-4">
            <form method="get">
                <div class="form-row row">
                    <div class="col-md-3">
                        <label>Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" class="form-control"
                            value="<?= esc($_GET['tanggal_awal'] ?? '') ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" class="form-control"
                            value="<?= esc($_GET['tanggal_akhir'] ?? '') ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control"
                            placeholder="Contoh: 10" value="<?= esc($_GET['kelas'] ?? '') ?>">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-dark w-100">Terapkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- EXPORT MODAL -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="exportModalLabel">Pilih Format Unduhan</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">
                    <?php
                    $params = http_build_query([
                        'tanggal_awal' => $tanggal_awal ?? '',
                        'tanggal_akhir' => $tanggal_akhir ?? '',
                        'kelas' => $kelas ?? '',
                    ]);
                    ?>
                    <a href="<?= base_url('absensi/cetak?' . $params) ?>" target="_blank" class="btn btn-danger m-2">
                        <i class="fas fa-file-pdf"></i> PDF
                    </a>
                    <a href="<?= base_url('absensi/exportExcel?' . $params) ?>" target="_blank" class="btn btn-success m-2">
                        <i class="fas fa-file-excel"></i> Excel
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- TABLE -->
    <?php if (!empty($absensi)): ?>
        <div class="table-responsive mt-3">
            <table class="table table-bordered text-center">
                <thead style="background-color: #DDC85E; font-weight: bold; color: #4F4747">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($absensi as $i => $a): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($a['nama']) ?></td>
                            <td><?= esc($a['kelas']) ?></td>

                            <!-- STATUS DIAMBIL DARI 'keterangan' -->
                            <td class="text-uppercase"><?= esc($a['keterangan']) ?></td>

                            <!-- KETERANGAN TIDAK ADA, JADI '-' -->
                            <td>-</td>

                            <td><?= esc($a['tanggal_absensi']) ?></td>
                            <td>
                                <img src="<?= base_url('absen/' . $a['foto_siswa']) ?>" width="90">
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning mt-4">Belum ada data absensi untuk filter yang dipilih.</div>
    <?php endif; ?>

</div>

<?= $this->endSection(); ?>