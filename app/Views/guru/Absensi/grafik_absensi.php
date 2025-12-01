<?= $this->extend('guru/layout/templateguru'); ?>
<?= $this->section('isi'); ?>

<style>
    .chart-card {
        height: 330px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .chart-card canvas {
        max-height: 250px !important;
        width: 100% !important;
    }

    .chart-title {
        margin-bottom: 12px;
        font-weight: 600;
        font-size: 15px;
        text-align: center;
    }
</style>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800 mb-0">Dashboard Grafik Absensi</h1>
        <a href="<?= base_url('guru/absensi/rekap') ?>" class="btn btn-primary btn-sm px-3">
            🔍 Detail Absensi
        </a>
    </div>

    <p class="text-muted mb-3">
        Tahun <?= $tahun ?> — Tanggal : <?= $today ?>
    <form method="get" class="d-flex mb-3">
        <input type="date" name="tawal" value="<?= $tawal ?>" class="form-control w-auto me-2 mr-2">
        <input type="date" name="takhir" value="<?= $takhir ?>" class="form-control w-auto me-2 mr-2">
        <button class="btn btn-primary btn-sm">Terapkan</button>
    </form>
    </p>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 chart-card">
                <div class="chart-title">Grafik Absensi Hari Ini - Kelas 10</div>
                <canvas id="chart_hari_10"></canvas>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 chart-card">
                <div class="chart-title">Grafik Absensi Hari Ini - Kelas 11</div>
                <canvas id="chart_hari_11"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 chart-card">
                <div class="chart-title">Persentase Izin, Sakit, dan Alfa (Tahun <?= $tahun ?>)</div>
                <canvas id="chart_persen"></canvas>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 chart-card">
                <div class="chart-title">Top 5 Siswa Paling Sering Alfa (Tahun <?= $tahun ?>)</div>
                <canvas id="chart_top_alfa"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 chart-card">
                <div class="chart-title">Grafik Absensi Bulanan - Kelas 10</div>
                <canvas id="chart_bulan_10"></canvas>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 chart-card">
                <div class="chart-title">Grafik Absensi Bulanan - Kelas 11</div>
                <canvas id="chart_bulan_11"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 chart-card">
                <div class="chart-title">Top 5 Siswa Paling Sering Izin (Tahun <?= $tahun ?>)</div>
                <canvas id="chart_top_izin"></canvas>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 chart-card">
                <div class="chart-title">Top 5 Siswa Paling Sering Sakit (Tahun <?= $tahun ?>)</div>
                <canvas id="chart_top_sakit"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const hari10 = <?= json_encode($hari10) ?>;
    const hari11 = <?= json_encode($hari11) ?>;
    const bulan10 = <?= json_encode(array_values($bulan10)) ?>;
    const bulan11 = <?= json_encode(array_values($bulan11)) ?>;
    const topAlfa = <?= json_encode($topAlfa) ?>;
    const topIzin = <?= json_encode($topIzin) ?>;
    const topSakit = <?= json_encode($topSakit) ?>;
    const persen = <?= json_encode($persen) ?>;

    const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    new Chart(document.getElementById('chart_hari_10'), {
        type: 'pie',
        data: {
            labels: ['Hadir', 'Izin', 'Sakit', 'Alfa'],
            datasets: [{
                data: [hari10.hadir, hari10.izin, hari10.sakit, hari10.alfa]
            }]
        }
    });

    new Chart(document.getElementById('chart_hari_11'), {
        type: 'pie',
        data: {
            labels: ['Hadir', 'Izin', 'Sakit', 'Alfa'],
            datasets: [{
                data: [hari11.hadir, hari11.izin, hari11.sakit, hari11.alfa]
            }]
        }
    });

    new Chart(document.getElementById('chart_persen'), {
        type: 'pie',
        data: {
            labels: ['Izin', 'Sakit', 'Alfa'],
            datasets: [{
                data: [persen.izin, persen.sakit, persen.alfa]
            }]
        }
    });

    new Chart(document.getElementById('chart_bulan_10'), {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: [{
                    label: 'Hadir',
                    data: bulan10.map(b => b.hadir)
                },
                {
                    label: 'Izin',
                    data: bulan10.map(b => b.izin)
                },
                {
                    label: 'Sakit',
                    data: bulan10.map(b => b.sakit)
                },
                {
                    label: 'Alfa',
                    data: bulan10.map(b => b.alfa)
                }
            ]
        }
    });

    new Chart(document.getElementById('chart_bulan_11'), {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: [{
                    label: 'Hadir',
                    data: bulan11.map(b => b.hadir)
                },
                {
                    label: 'Izin',
                    data: bulan11.map(b => b.izin)
                },
                {
                    label: 'Sakit',
                    data: bulan11.map(b => b.sakit)
                },
                {
                    label: 'Alfa',
                    data: bulan11.map(b => b.alfa)
                }
            ]
        }
    });

    new Chart(document.getElementById('chart_top_alfa'), {
        type: 'bar',
        data: {
            labels: topAlfa.length > 0 ? topAlfa.map(s => s.nama + ' (Kls ' + s.kelas + ')') : ['Tidak ada data'],
            datasets: [{
                label: 'Jumlah Alfa',
                data: topAlfa.length > 0 ? topAlfa.map(s => s.total) : [0]
            }]
        },
        options: {
            indexAxis: 'y'
        }
    });

    new Chart(document.getElementById('chart_top_izin'), {
        type: 'bar',
        data: {
            labels: topIzin.length > 0 ? topIzin.map(s => s.nama + ' (Kls ' + s.kelas + ')') : ['Tidak ada data'],
            datasets: [{
                label: 'Jumlah Izin',
                data: topIzin.length > 0 ? topIzin.map(s => s.total) : [0]
            }]
        },
        options: {
            indexAxis: 'y'
        }
    });

    new Chart(document.getElementById('chart_top_sakit'), {
        type: 'bar',
        data: {
            labels: topSakit.length > 0 ? topSakit.map(s => s.nama + ' (Kls ' + s.kelas + ')') : ['Tidak ada data'],
            datasets: [{
                label: 'Jumlah Sakit',
                data: topSakit.length > 0 ? topSakit.map(s => s.total) : [0]
            }]
        },
        options: {
            indexAxis: 'y'
        }
    });
</script>

<?= $this->endSection(); ?>