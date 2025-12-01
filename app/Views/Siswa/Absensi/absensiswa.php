<?= $this->extend('siswa/layout/templatemurid'); ?>
<?= $this->section('isi'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Absensi</h1>

    <?php if ($statusAbsensi == 'belum_buka'): ?>
        <div class="alert alert-warning text-center">
            ⛔ Absensi belum dibuka. Silakan kembali pukul 06.45.
        </div>
    <?php elseif ($statusAbsensi == 'tutup'): ?>
        <div class="alert alert-danger text-center">
            ⛔ Absensi telah ditutup pukul 15.00.
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form id="absenForm" action="<?= base_url('siswa/absensi/simpan') ?>" method="post">
        <?= csrf_field() ?>

        <input type="hidden" name="foto" id="foto">
        <input type="hidden" name="status" id="status">
        <input type="hidden" name="keterangan" id="keterangan">

        <div class="text-center mb-3">
            <video id="video" width="300" height="250" autoplay style="border-radius: 15px; background: #ccc;"></video>
            <canvas id="canvas" width="300" height="250" style="display: none;"></canvas>
        </div>

        <?php if ($statusAbsensi == 'buka'): ?>
            <div class="text-center">
                <button type="button" class="btn btn-success rounded-pill px-4 m-1 abs-btn" data-status="hadir">✅ Hadir</button>
                <button type="button" class="btn btn-warning rounded-pill px-4 m-1 abs-btn" data-status="izin">🟡 Izin</button>
                <button type="button" class="btn btn-danger rounded-pill px-4 m-1 abs-btn" data-status="sakit">🔴 Sakit</button>
            </div>
        <?php endif; ?>
    </form>
</div>

<!-- Modal Keterangan -->
<div class="modal fade" id="ketModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="ketTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <label>Keterangan:</label>
                <textarea id="ketInputModal" class="form-control" rows="3" required></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="submitKetBtn">Kirim</button>
            </div>

        </div>
    </div>
</div>

<style>
    #video,
    #canvas {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<script>
    <?php if ($statusAbsensi == 'buka'): ?>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const fotoInput = document.getElementById('foto');
        const statusInput = document.getElementById('status');
        const ketInput = document.getElementById('keterangan');
        const buttons = document.querySelectorAll('.abs-btn');

        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(error => {
                alert('Kamera tidak dapat diakses: ' + error);
            });

        let selectedStatus = null;
        let modal;

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                selectedStatus = btn.dataset.status;
                statusInput.value = selectedStatus;

                const context = canvas.getContext('2d');
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                const imageData = canvas.toDataURL('image/png');
                fotoInput.value = imageData;

                canvas.style.display = 'block';
                video.style.display = 'none';

                if (selectedStatus === 'hadir') {
                    document.getElementById('absenForm').submit();
                    return;
                }

                document.getElementById('ketTitle').innerText =
                    (selectedStatus === 'izin') ? 'Keterangan Izin' : 'Keterangan Sakit';

                modal = new bootstrap.Modal(document.getElementById('ketModal'));
                modal.show();
            });
        });

        document.getElementById('submitKetBtn').addEventListener('click', () => {
            const ketValue = document.getElementById('ketInputModal').value;
            if (!ketValue.trim()) {
                alert("Keterangan wajib diisi.");
                return;
            }
            ketInput.value = ketValue;
            modal.hide();
            document.getElementById('absenForm').submit();
        });
    <?php endif; ?>
</script>

<?= $this->endSection(); ?>