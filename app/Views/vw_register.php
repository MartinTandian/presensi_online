<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Martin Tandian">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Halaman Login</title>

    <!-- Favicons -->
    <link href="<?= base_url('/assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('/assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('/assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <div class="card mx-auto mt-3 mb-4" style="width: auto;">
        <div class="card-body">
            <div class="text-center mb-2">
                <img alt="Logo" src="<?= base_url() ?>/assets/img/inti.svg" class="h-45px logo pt-4" />
                <h1 class="mt-3 mb-2">Register</h1>
            </div>

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show success-alert mt-2 mb-2" id="success-alert" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>


            <form method="post" id="registerForm" action="<?= base_url('/register/process'); ?>">
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="mb-4">
                    <label for="id_divisi" class="form-label">Divisi</label>
                    <select class="form-select" aria-label="Default select example" name="id_divisi">
                        <?php foreach ($divisi as $d) : ?>
                            <option value="<?= $d->id_divisi ?>"><?= $d->nama_divisi ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4 d-none">
                    <label for="id_role" class="form-label">Role</label>
                    <input type="hidden" class="form-control" id="id_role" name="id_role" value="2">
                </div>
                <div class="mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-4">
                    <label for="password_conf" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_conf" name="password_conf">
                </div>
                <div class="mb-4">
                    <label for="asal" class="form-label">Asal Sekolah / Kampus</label>
                    <input type="text" class="form-control" id="asal" name="asal">
                </div>
                <div class="mb-4">
                    <label for="asal" class="form-label">Program</label><br>
                    <input type="radio" name="pilih" id="internship" value="Internship" />
                    <label for="internship">Internship</label>
                    <input type="radio" name="pilih" id="pkl" value="PKL" style="margin-left: 10px; margin-right: 3px" />
                    <label for="pkl">PKL</label>
                </div>
                <div class="mb-4">
                    <label for="NIPEG" class="form-label">Pembimbing</label>
                    <select class="form-select" aria-label="Default select example" name="NIPEG">
                        <?php foreach ($pembimbing as $p) : ?>
                            <option value="<?= $p->NIPEG ?>"><?= $p->NAMA ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanggal_mulai" class="form-label">Tanggal mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                </div>
                <div class="mb-4">
                    <label for="tanggal_selesai" class="form-label">Tanggal selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                </div>
                <div class="mb-5">
                    <button type="submit" id="submit-btn" class="btn btn-primary me-2">Register</button>
                    <a href="<?= base_url(); ?>" class="btn btn-light">Back</a>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-light mt-2">
        <div class="container">
            <span class="text-muted"></span>
        </div>
    </footer>
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