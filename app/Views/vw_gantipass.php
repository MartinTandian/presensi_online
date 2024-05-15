<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Ganti Password</title>

    <link href="<?= base_url('/assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('/assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('/assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body>
    <div class="card" style="width: 55rem">
        <div class="card-body">
            <?php
            if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" id="success-alert" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= site_url('/ganti_password') ?>" method="post" id="gantipass">
                <?php csrf_field(); ?>
                <!-- KALAU ERROR -->
                <div class="alert alert-danger error" role="alert" style="display: none;">
                </div>
                <!-- KALAU SUKSES -->
                <div class="alert alert-primary sukses" role="alert" style="display: none;">
                </div>
                <!-- FORM INPUT DATA -->
                <div class="row" data-kt-password-meter="true">
                    <label for="PassLama" class="col-sm-3 col-form-label">Password Lama</label>
                    <div class="col-sm-9">
                        <div class="input-group position-relative">
                            <input type="password" class="form-control form-control-solid mb-3" name="PassLama" autocomplete="off">
                            <span class="input-group-text btn btn-sm position-absolute end-0" data-kt-password-meter-control="visibility" onclick="togglePassword('PassLamaInput')">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                    </div>
                    <label for="PassBaru" class="col-sm-3 col-form-label">Password Baru</label>
                    <div class="col-sm-9">
                        <div class="input-group position-relative">
                            <input type="password" class="form-control form-control-solid mb-3" name="PassBaru" id="PassBaruInput" autocomplete="off">
                            <span class="input-group-text btn btn-sm position-absolute end-0" data-kt-password-meter-control="visibility" onclick="togglePassword('PassBaruInput')">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                    </div>
                    <label for="ConfPassBaru" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-9">
                        <div class="input-group position-relative">
                            <input type="password" class="form-control form-control-solid mb-3" name="ConfPassBaru" id="ConfPassBaruInput" autocomplete="off">
                            <span class="input-group-text btn btn-sm position-absolute end-0" data-kt-password-meter-control="visibility" onclick="togglePassword('ConfPassBaruInput')">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <div class="col-4">
                        <button type="button" onclick="window.location.href='<?= site_url('/') ?>'" class="btn btn-light ms-4 me-5">Back</button>
                        <button type="submit" class="btn btn-primary ml-auto" id="ganti_pass_btn">Update</button>
                    </div>
                </div>
        </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#success-alert").alert('close');
            }, 5000);
        });
    </script>

    <script>
        function togglePassword(inputId) {
            var input = document.getElementById(inputId);
            var toggleBtn = document.querySelector('[data-kt-password-meter-control="visibility"][onclick*="' + inputId + '"]');

            if (input.type === 'password') {
                input.type = 'text';
                toggleBtn.innerHTML = '<i class="bi bi-eye fs-2 "></i>';
            } else {
                input.type = 'password';
                toggleBtn.innerHTML = '<i class="bi bi-eye-slash fs-2"></i><i class="bi bi-eye fs-2 d-none"></i>';
            }
        }
    </script>


    <script src="<?= base_url('/assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('/assets/js/scripts.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom/authentication/password-reset/new-password.js') ?>"></script>
</body>

</html>