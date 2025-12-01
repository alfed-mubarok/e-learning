<?php $this->extend('Layout/templates'); ?>

<?php $this->section('content'); ?>

<div class="container-fluid white">
    <!-- Outer Row -->
    <div class="row justify-content-center p-4">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5 p-3 rounded-4">
                <div class="card-body p-2">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">

                        <div class="col-lg ">
                            <div class="p-3">
                                <div class="text-center">
                                    <h1 class="text-gray-900 mb-3">Log In</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('/login') ?>">
                                    <?php if (session()->getFlashdata('error')): ?>
                                        <div class="alert alert-danger">
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($validation)): ?>
                                        <div class="alert alert-danger">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="id_user" name="id_user"
                                            aria-describedby="id_usernameHelp"
                                            placeholder="Masukkan Id User anda.."
                                            value="<?= old('id_user') ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password"
                                            aria-describedby="passwordHelp"
                                            placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-user btn-block mb-3">
                                        Login
                                    </button>
                                </form>

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
        <div class="col-lg-6 mb-5">
            <div class="card o-hidden border-0  p-5">
                <div class="card-body p-4">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">

                        <div class="col-lg ">
                            <div class="pt-1">
                                <div class="text-center">
                                    <h1 class="text-gray-900 mb-4">E-Learning Desain Komunikasi Visual</h1>
                                    <p>E-learning ini dibuat untuk meningkatkan kompetensi jurusan Desain Komunikasi Visual SMKN 1 Kamal dalam hal mengikuti perkembangan teknologi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?php $this->endSection(); ?>