<?php $this->extend('Layout/templates'); ?>

<?php $this->section('content'); ?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col">
            <div class=" my-4">
                <div class="card-body p-3">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-sm-7">
                            <div style="margin-top: 3.5rem; margin-right: 3.5rem">
                                <div>
                                    <h1 class="fs-1 text-white pt-3 mb-3">Alfed Mubarok</h1>
                                    <p class="fs-5 text-white mb-1">Saya mahasiswa Program Studi Pendidikan Informatika Fakultas Keguruan dan Ilmu Pendidikan Universitas Trunojoyo. E-learning ini dibuat selain untuk jurusan Desain Komunikasi Visual juga untuk memenuhi tugas akhir dari mahasiswa yaitu Skripsi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 d-flex justify-content-center align-items-center">
                            <img src="<?php echo base_url('assets/pengembang.png') ?>" alt="imgs" width="275vw">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?php $this->endSection(); ?>