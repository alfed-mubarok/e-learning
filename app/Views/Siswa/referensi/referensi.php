<?= $this->extend('siswa/layout/templatemurid') ?>
<?= $this->section('isi') ?>

<div class="px-4">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Daftar Referensi</h2>

    <?php if (empty($referensi)) : ?>
        <div class="text-gray-500 italic">Belum ada referensi yang tersedia untuk materi ini.</div>
    <?php else : ?>
        <div class="space-y-3">
            <?php foreach ($referensi as $ref) : ?>
                <div class="p-3 border border-gray-200 rounded-xl shadow-sm bg-white hover:shadow-md transition">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <div>
                            <h3 class="font-semibold text-gray-800 flex items-center gap-2 whitespace-normal">
                                <?= !empty($ref['file']) ? '📄' : '🔗' ?>
                                <?= esc($ref['nama_referensi']) ?>
                            </h3>
                            <p class="text-sm text-gray-500 ml-4">Jenis: <?= !empty($ref['file']) ? 'File' : 'Link' ?></p>
                        </div>
                        <div class="mt-1 sm:mt-0">
                            <?php if (!empty($ref['file'])) : ?>
                                <a href="<?= base_url('materi/referensi/' . $ref['file']) ?>" download target="_blank"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-500 text-black text-sm rounded hover:bg-blue-600 transition ml-2">
                                    ⬇️ Unduh
                                </a>
                            <?php elseif (!empty($ref['link'])) : ?>
                                <a href="<?= esc($ref['link']) ?>" target="_blank"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-500 text-black text-sm rounded hover:bg-green-600 transition ml-2">
                                    🌐 Buka
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>