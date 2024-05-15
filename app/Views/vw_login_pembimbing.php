<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Halaman Login</title>

    <link href="<?= base_url('/assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('/assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('/assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!-- <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style> -->

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="card mx-auto mt-20" style="width: 30rem">
        <div class="card-body">
            <main class="form-signin">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" id="success-alert" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= site_url(); ?>/login/process_pembimbing">
                    <?= csrf_field(); ?>
                    <img alt="Logo" src="<?= base_url() ?>/assets/img/inti.svg" class="h-45px logo" />
                    <h1 class="card-title h3 mb-4 mt-4 fw-normal text-dark">Presensi Online <br> Login Sebagai Pembimbing</h1>
                    <input type="text" name="username" id="username" placeholder="Username or Email" class="form-control mb-3" autocomplete="off" required autofocus>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-4" required>
                    <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>

                </form>
                <a href="<?= site_url(); ?>/register" class="w-100 btn btn-lg btn-primary mt-2 mb-2">Register</a>
                <hr>
                <a href="<?= site_url(); ?>/login">Login sebagai user</a>
                <p class="mt-5 mb-3 text-muted">Copyright 2023</p>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#success-alert").alert('close');
            }, 5000);
        });
    </script>

</body>

</html>