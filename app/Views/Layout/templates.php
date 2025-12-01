<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?= $title; ?> </title>

    <!-- Custom fonts for this template-->
    <base href="<?php echo base_url('assets') ?>/">
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">

</head>

<body style="background-color: E4D476;">
    <img class="bg-img" src="<?php echo base_url('assets/coraklogin2.png') ?>" alt="imgs">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparant pt-4">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="<?php echo base_url('assets/logosmk.png') ?>" alt="imgs" width="50 rem">
            </a>
            <a class="navbar-brand" style="font-size: 1.3rem;" href="#">SMK Negeri 1 Kamal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-5 ">
                        <a class="nav-link" href="/">Login</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="/pages/register">Register</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="/pages/about">About</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <?= $this->renderSection('content'); ?>

    <footer class="sticky-footer position-absolute bottom-0 w-100" style="height: 75px; background-color: #4F4747;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto text-white fs-6">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/sb-admin-2.min.js"></script>
</body>

</html>