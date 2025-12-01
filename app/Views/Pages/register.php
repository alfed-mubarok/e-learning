<?php $this->extend('Layout/templates'); ?>

<?php $this->section('content'); ?>

<div class="container-fluid white">
    <!-- Outer Row -->
    <div class="row justify-content-center p-3" style="margin-top: 3rem;margin-bottom:3rem;">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5 rounded-5">
                <div class="card-body p-3">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">

                        <div class="col-lg ">
                            <div>
                                <div class="text-center">
                                    <h1 class="text-gray-900 pt-3">Register</h1>

                                    <p class="pt-3 ms-5 me-5">Untuk siswa baru yang belum mempunyai akun dan siswa yang sudah memiliki akun tetapi lupa sandi silahkan hubungi admin atau guru melalui narahubung dibawah ini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<div class="container-fluid bg-white">
    <div class="row justify-content-center">
        <div class="col-lg-10">


            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center" style="margin-top: 10rem; margin-bottom:10rem;">

                <div class="col-lg">

                    <div class="text-center">
                        <img src="<?php echo base_url('assets/instagram.png') ?>" alt="imgs" width="100vw">
                        <h2 class="text-gray-900 mb-4">@dekaverse_</h2>
                    </div>

                </div>
                <div class="col-lg">

                    <div class="text-center">
                        <img src="<?php echo base_url('assets/phone.png') ?>" alt="imgs" width="100vw">
                        <h2 class="text-gray-900 mb-4">+62 11111111111</h2>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

</div>

<?php $this->endSection(); ?>