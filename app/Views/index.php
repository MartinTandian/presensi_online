<?= $this->extend("layout/template") ?>
<?= $this->section("konten") ?>

<style>
    @import 'https://fonts.googleapis.com/css?family=Work+Sans';

    .container {
        width: 100%;
        height: 100%;
        display: flex;
        /* justify-content: space-around;
        align-items: center; */
    }

    .pc3 {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
        font-family: 'Work Sans', Sans-serif;
        letter-spacing: -2px;
        font-weight: bold;
    }

    .pc3 svg:before {
        content: #dfd0d8;
        display: block;
    }

    .pc3 svg {
        width: 120px;
        height: 120px;
        transform: rotate(-90deg);
    }

    .pc3 svg .percent-circle-inner {
        fill: #00ADEE;
        stroke: #0FFFFF;
        stroke-width: 10px;
        stroke-dasharray: 0 376.9908px;
        transition: stroke-dasharray 0.6s ease-out;
    }

    .pc3:after {
        content: attr(data-percent) ' / 35 jam';
        display: block;
        width: 110px;
        height: 110px;
        background: #fff;
        position: absolute;
        top: 5px;
        left: 5px;
        border-radius: 50%;
        color: #00ADEE;
        text-align: center;
        line-height: 110px;
        font-size: 17px;
    }

    .hidden {
        display: none;
    }

    .bg-grad {
        background: linear-gradient(to right, #00ADEE, #0FFFFF);
        color: white;
    }
</style>

<div class="w-100">
    
    <div class="card mx-5 mt-4 bg-grad" style="border-radius: 1em;">
        <div class="card-body">
            <?php if (session()->role == 2) { ?>
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="d-flex rounded mt-4">
                            <div class="symbol symbol-50px me-2">
                                <img alt="Logo" src="<?= base_url('/assets/img/user.png') ?>" />
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <span class="fw-bold text-light py-1">Selamat Datang</span>
                                <span class="text-light fw-boldest d-block fs-2"><?= session()->nama; ?></span>
                            </div>
                        </div>
                        <div class="separator mx-1 my-4"></div>
                        <div class="position-relative pe-6 my-1">
                            <div class="fw-boldest text-start text-light fs-5"> <?= session()->asal; ?></div>

                            <div class="fw-semibold text-light fs-6">
                                <div class="fw-semibold text-start text-light"> Email: <b><?= session()->email; ?></b></div>
                            </div>
                            <div class="fw-semibold text-light fs-6">Pembimbing:  <b><?= ucwords(strtolower(session()->pembimbing)); ?></b>
                            </div>
                        </div>

                    </div>
                    <div class="col-5">
                        <div class="card mt-4" style="border-radius: 1em;">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <div class="me-6">
                                            <?php foreach ($absen2 as $ab2) : ?>
                                                <?php if ($ab2['clock_out'] != NULL) { ?>
                                                    <div class="percent-circle pc3" data-percent=<?= $total_jam ?>>
                                                        <svg>
                                                            <use class="percent-circle-inner" xlink:href="#percent-circle-svg"></use>
                                                        </svg>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="percent-circle pc3" data-percent=<?= $total_jam_tanpa_hari_ini ?>>
                                                        <svg>
                                                            <use class="percent-circle-inner" xlink:href="#percent-circle-svg"></use>
                                                        </svg>
                                                    </div>
                                                <?php } ?>
                                            <?php endforeach; ?>


                                            <svg class="hidden">
                                                <circle id="percent-circle-svg" cx="50%" cy="50%" r="50%" stroke-alignment="inner"></circle>
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="mt-3">
                                            <h4 class="card-title align-item-start flex-column text-dark mb-4">
                                                <span class="card-label fw-bolder text-dark">
                                                    <?php
                                                    $date =  date("m/d/Y");
                                                    $hari =  date('l', strtotime($date));
                                                    $bulan = date('F', strtotime($date));

                                                    if (date('l', strtotime($date)) == "Monday") {
                                                        $hari = "Senin";
                                                    }
                                                    if (date('l', strtotime($date)) == "Tuesday") {
                                                        $hari = "Selasa";
                                                    }
                                                    if (date('l', strtotime($date)) == "Wednesday") {
                                                        $hari = "Rabu";
                                                    }
                                                    if (date('l', strtotime($date)) == "Thursday") {
                                                        $hari = "Kamis";
                                                    }
                                                    if (date('l', strtotime($date)) == "Friday") {
                                                        $hari = "Jumat";
                                                    }
                                                    if (date('l', strtotime($date)) == "Saturday") {
                                                        $hari = "Sabtu";
                                                    }
                                                    if (date('l', strtotime($date)) == "Sunday") {
                                                        $hari = "Minggu";
                                                    }
                                                    if (date('F', strtotime($date)) == "January") {
                                                        $bulan = "Januari";
                                                    }
                                                    if (date('F', strtotime($date)) == "February") {
                                                        $bulan = "Februari";
                                                    }
                                                    if (date('F', strtotime($date)) == "March") {
                                                        $bulan = "Maret";
                                                    }
                                                    if (date('F', strtotime($date)) == "April") {
                                                        $bulan = "April";
                                                    }
                                                    if (date('F', strtotime($date)) == "May") {
                                                        $bulan = "Mei";
                                                    }
                                                    if (date('F', strtotime($date)) == "June") {
                                                        $bulan = "Juni";
                                                    }
                                                    if (date('F', strtotime($date)) == "July") {
                                                        $bulan = "Juli";
                                                    }
                                                    if (date('F', strtotime($date)) == "August") {
                                                        $bulan = "Agustus";
                                                    }
                                                    if (date('F', strtotime($date)) == "September") {
                                                        $bulan = "September";
                                                    }
                                                    if (date('F', strtotime($date)) == "October") {
                                                        $bulan = "Oktober";
                                                    }
                                                    if (date('F', strtotime($date)) == "November") {
                                                        $bulan = "November";
                                                    }
                                                    if (date('F', strtotime($date)) == "December") {
                                                        $bulan = "Desember";
                                                    }
                                                    echo $hari . ", " . date("d ") . $bulan . date(" Y");

                                                    // echo date('l', strtotime($date)).", ". date("d F Y");
                                                    ?>
                                                </span>
                                            </h4>
                                            <div class="position-relative pe-6 my-1">
                                                <div class="fw-bolder text-start text-dark">Periode <?= ucwords(session()->pilih); ?> Anda dari</div>

                                                <div class="fw-semibold text-dark fs-7">
                                                    <span id="output" style="display: inline-block;"></span> - <span id="output2" style="display: inline-block;"></span>
                                                </div>
                                            </div>
                                            <?php foreach ($absen2 as $ab2) : ?>
                                                <?php if ($ab2['tanggal'] != date('Y-m-d') && session()->role == 2) { ?>
                                                    <h4 class="fs-5 badge badge-light-success mt-1">Silakan absen</h4>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (session()->role == 1) { ?>
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="d-flex rounded mt-4">
                            <div class="symbol symbol-50px me-2">
                                <img alt="Logo" src="<?= base_url('/assets/img/user.png') ?>" />
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <span class="fw-bold text-light py-1">Selamat Datang</span>
                                <span class="text-light fw-boldest d-block fs-2"><?= session()->nama; ?></span>
                            </div>
                        </div>
                        <div class="separator mx-1 my-4"></div>
                        <div class="row align-items-start">
                            <!--begin::Col-->
                            <div class="col-3">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch bg-light-danger">
                                    <!--begin::Col-->
                                    <div class="col  px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-danger fw-bold fs-6">Data PKL Tahun Ini</span><br>
                                        <p class="text-danger fw-bold fs-6"><?= $jumlah_pkl_tahun_ini ?> orang</p>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-3">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch bg-light-primary">
                                    <!--begin::Col-->
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-primary fw-bold fs-6">Data PKL Aktif Bulan Ini</span><br>
                                        <p class="text-primary fw-bold fs-6"><?= $jumlah_pkl_aktif ?> orang</p>
                                    </div>
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->
                            <div class="col-3">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch bg-light-info">
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-info fw-bold fs-6">Data Internship Tahun Ini</span><br>
                                        <p class="text-info fw-bold fs-6"><?= $jumlah_intern_tahun_ini ?> orang</p>
                                    </div>
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->
                            <div class="col-3">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch bg-light-success">
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-success fw-bold fs-6">Data Internship Aktif Bulan Ini</span><br>
                                        <p class="text-success fw-bold fs-6"><?= $jumlah_intern_aktif ?> orang</p>
                                    </div>
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->

                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (session()->role == 3) { ?>
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="d-flex rounded mt-4">
                            <div class="symbol symbol-50px me-2">
                                <img alt="Logo" src="<?= base_url('/assets/img/user.png') ?>" />
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <span class="fw-bold text-light py-1">Selamat Datang</span>
                                <span class="text-light fw-boldest d-block fs-2"><?= session()->nama; ?></span>
                            </div>
                        </div>
                        <div class="separator mx-1 my-4"></div>
                        <div class="row align-items-start">
                            <!--begin::Col-->
                            <div class="col-3">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch bg-light-danger">
                                    <!--begin::Col-->
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-danger fw-bold fs-6">Data PKL Tahun Ini</span><br>
                                        <span class="text-danger fw-bold fs-6"><?= getNamaDivisi(session()->divisi); ?> : </span><br>
                                        <br>
                                        <p class="text-danger fw-bold fs-6"><?= $jumlah_pkl_divisi_tahun_ini ?> orang</p>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-3">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch bg-light-primary">
                                    <!--begin::Col-->
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-primary fw-bold fs-6">Data PKL Aktif Bulan Ini</span><br>
                                        <span class="text-primary fw-bold fs-6"><?= getNamaDivisi(session()->divisi); ?> : </span><br>
                                        <br>
                                        <p class="text-primary fw-bold fs-6"><?= $jumlah_pkl_divisi_aktif ?> orang</p>
                                    </div>
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->
                            <div class="col-3">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch bg-light-info">
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-info fw-bold fs-6">Data Internship Tahun Ini</span><br>
                                        <span class="text-info fw-bold fs-6"><?= getNamaDivisi(session()->divisi); ?> : </span><br>
                                        <br>
                                        <p class="text-info fw-bold fs-6"><?= $jumlah_intern_divisi_tahun_ini ?> orang</p>
                                    </div>
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->
                            <div class="col-3">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch bg-light-success">
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-success fw-bold fs-6">Data Internship Aktif Bulan Ini</span><br>
                                        <span class="text-success fw-bold fs-6"><?= getNamaDivisi(session()->divisi); ?> : </span><br>
                                        <br>
                                        <p class="text-success fw-bold fs-6"><?= $jumlah_intern_divisi_aktif ?> orang</p>
                                    </div>
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->

                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (session()->role == 4) { ?>
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="d-flex rounded mt-4">
                            <div class="symbol symbol-50px me-2">
                                <img alt="Logo" src="<?= base_url('/assets/img/user.png') ?>" />
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <span class="fw-bold text-light py-1">Selamat Datang</span>
                                <span class="text-light fw-boldest d-block fs-2"><?= session()->nama; ?></span>
                            </div>
                        </div>
                        <div class="separator mx-1 my-4"></div>
                        <div class="row align-items-start">
                            <div class="col-3">
                                <div class="card card-xxl-stretch bg-light-danger">
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-danger fw-bold fs-6">Data PKL Tahun Ini</span><br>
                                        <br>
                                        <p class="text-danger fw-bold fs-6"><?= $jumlah_pkl_pembimbing_tahun_ini ?> orang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-xxl-stretch bg-light-primary">
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-primary fw-bold fs-6">Data PKL Aktif Bulan Ini</span><br>
                                        <br>
                                        <p class="text-primary fw-bold fs-6"><?= $jumlah_pkl_pembimbing_aktif ?> orang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-xxl-stretch bg-light-info">
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-info fw-bold fs-6">Data Internship Tahun Ini</span><br>
                                        <br>
                                        <p class="text-info fw-bold fs-6"><?= $jumlah_intern_pembimbing_tahun_ini ?> orang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-xxl-stretch bg-light-success">
                                    <div class="col px-6 py-8 rounded-2 mt-5 mb-5">
                                        <span class="text-success fw-bold fs-6">Data Internship Aktif Bulan Ini</span><br>
                                        <br>
                                        <p class="text-success fw-bold fs-6"><?= $jumlah_intern_pembimbing_aktif ?> orang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <?php if (session()->role == 2) { ?>
            <div class="col-12">
                <div class="card" style="width: auto; border-radius: 1em;">
                    <div class="card-header">
                        <h1 class="pt-5 mt-1">Daftar Absen</h1>
                        <div class="card-toolbar">
                            <?php if (empty($absen2) && session()->role == 2) { ?>
                                <form action="<?= base_url('/clock_in') ?>" method="post" id="formabsen">
                                    <input type="hidden" class="form-control" name="user" id="user" value="<?= session()->id_user ?>">
                                    <input type="hidden" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo date('Y-m-d') ?>">
                                    <input type="hidden" class="form-control" name="jam_masuk" id="jam_masuk" value="<?php echo date("H:i:s") ?>">
                                    <button type="submit" id="submit-btn" class="btn btn-primary">Clock In</button>
                                </form>
                            <?php } ?>
                            <?php foreach ($absen2 as $ab2) : ?>
                                <?php if ($ab2['tanggal'] != date('Y-m-d') && session()->role == 2) { ?>
                                    <form action="<?= base_url('/clock_in') ?>" method="post" id="formabsen">
                                        <input type="hidden" class="form-control" name="user" id="user" value="<?= session()->id_user ?>">
                                        <input type="hidden" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo date('Y-m-d') ?>">
                                        <input type="hidden" class="form-control" name="jam_masuk" id="jam_masuk" value="<?php echo date("H:i:s") ?>">
                                        <button type="submit" id="submit-btn" class="btn btn-primary">Clock In</button>
                                    </form>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if (session()->role == 2) { ?>
                        <div class="card-body">
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-warning alert-dismissible fade show success-alert" id="success-alert" role="alert">
                                    <h4>Coba isi kembali</h4>
                                    </hr />
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered" id="tb_absen">
                                <thead>
                                    <tr>
                                        <th style="display:none;">
                                            <h5>No</h5>
                                        </th>
                                        <th>
                                            <h5>Tanggal</h5>
                                        </th>
                                        <th>
                                            <h5>Clock In</h5>
                                        </th>
                                        <th>
                                            <h5>Clock Out</h5>
                                        </th>
                                        <th>
                                            <h5>Jumlah Jam Masuk</h5>
                                        </th>
                                        <th>
                                            <h5>Aktivitas</h5>
                                        </th>
                                        <th>
                                            <h5 class="ps-5">Aksi</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($absen as $a) : ?>
                                        <?php if ($a['id_user'] == session()->id_user) { ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $a['id_absen'] ?></td>
                                                <td><?php echo date('d M Y', strtotime($a['tanggal'])) ?></td>
                                                <td><?php echo $a['clock_in'] ?></td>
                                                <td><?php echo $a['clock_out'] ?></td>
                                                <td>
                                                    <?php
                                                    $awal  = new DateTime($a['clock_in']);
                                                    $akhir = new DateTime($a['clock_out']); // Waktu sekarang
                                                    $diff  = $awal->diff($akhir);
                                                    $hari  = new DateTime($a['tanggal']);

                                                    // jika absennya bernilai 0 menit
                                                    if ($diff->i == 0) {
                                                        $diff_jam = $diff->h . ' jam';
                                                    } else {
                                                        $diff_jam = $diff->h  +  ($diff->i / 60) . ' jam';
                                                    }

                                                    if ($hari->format('l') == "Monday") {
                                                        $nama_hari = "Senin";
                                                    }
                                                    if ($hari->format('l') == "Tuesday") {
                                                        $nama_hari = "Selasa";
                                                    }
                                                    if ($hari->format('l') == "Wednesday") {
                                                        $nama_hari = "Rabu";
                                                    }
                                                    if ($hari->format('l') == "Thursday") {
                                                        $nama_hari = "Kamis";
                                                    }
                                                    if ($hari->format('l') == "Friday") {
                                                        $nama_hari = "Jumat";
                                                    }
                                                    if ($hari->format('l') == "Saturday") {
                                                        $nama_hari = "Sabtu";
                                                    }
                                                    if ($hari->format('l') == "Sunday") {
                                                        $nama_hari = "Minggu";
                                                    }

                                                    echo "Hari " . $nama_hari . " Anda masuk selama " . $diff->h . ' jam, ' . $diff->i . ' menit ';
                                                    ?>
                                                </td>
                                                <td class="mb-1">
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalListAktivitas<?= $a['id_absen'] ?>">
                                                        Aktivitas
                                                    </button>
                                                </td>
                                                <!--Modal List Aktivitas-->
                                                <div class="modal fade" id="ModalListAktivitas<?= $a['id_absen'] ?>" tabindex="-1" aria-labelledby="ModalListAktivitasLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalListAktivitasLabel">Aktivitas</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="alertmessage" class="d-none alert alert-info">
                                                                </div>
                                                                <?php foreach ($aktivitas as $akt) : ?>
                                                                    <?php if ($akt['id_absen'] == $a['id_absen']) { ?>
                                                                        <form id="formlistaktivitas">
                                                                            <?php csrf_field(); ?>
                                                                            <!-- KALAU ERROR -->
                                                                            <div class="alert alert-danger error" role="alert" style="display: none;">
                                                                            </div>
                                                                            <!-- KALAU SUKSES -->
                                                                            <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                                            </div>
                                                                            <!-- FORM INPUT DATA -->
                                                                            <div class="mb-3 row" id="aktivitas-group">
                                                                                <label for="inputAktivitas" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                                                    <h5>Aktivitas</h5>
                                                                                </label>
                                                                                <div class="col-sm-9 ms-5">
                                                                                    <label type="text" class="form-control" name="aktivitas" id="aktivitas"><?= $akt['aktivitas'] ?></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 row" id="deskripsi-group">
                                                                                <label for="inputDeskripsi" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                                                    <h5>Deskripsi</h5>
                                                                                </label>
                                                                                <div class="col-sm-9 ms-5">
                                                                                    <textarea readonly class="form-control" name="deskripsi" id="deskripsi"><?= $akt['deskripsi'] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    <?php endforeach ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End Modal List Aktivitas-->

                                                <td class="text-start">
                                                    <?php if ($a['tanggal'] == date('Y-m-d') && !empty($aktivitas2)) { ?>
                                                        <form action="<?= base_url('/clock_out/' . $a["id_absen"]) ?>" method="post" id="formabsen2">
                                                            <input type="hidden" class="form-control" name="user" id="user" value="<?= session()->id_user ?>">
                                                            <input type="hidden" class="form-control" name="tanggal_keluar" id="tanggal_keluar" value="<?php echo date('Y-m-d') ?>">
                                                            <input type="hidden" class="form-control" name="jam_keluar" id="jam_keluar" value="<?php echo date("H:i:s") ?>">
                                                            <input type="hidden" class="form-control" name="total_jam" id="total_jam" value="<?php echo $diff->h . ' jam ' . $diff->i . ' menit' ?>">
                                                            <button type="submit" id="submit-btn2" class="btn-sm btn btn-bg-white btn-primary">Clock Out</button>
                                                        </form>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!--End Card-body-->
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <!--End konten role 2-->

        <?php if (session()->role == 1 || session()->role == 3 || session()->role == 4) { ?>
            <div class="col-6">
                <div class="card" style="width: auto; border-radius: 1em;">
                    <div class="card-header">
                        <h1 class="pt-5 mt-1">List PKL / Internship</h1>
                        <div class="card-toolbar">
                        </div>
                    </div>

                    <?php if (session()->role == 1) { ?>
                        <div class="card-body">
                            <!--<div class="mb-3">
                            <label for="filterPilih" class="form-label">Filter Pilih:</label>
                            <select class="form-select" id="filterPilih">
                                <option value="all">Semua</option>
                                <option value="pkl">PKL</option>
                                <option value="internship">Internship</option>
                            </select>
                        </div>-->

                            <table class="table" id="tb_absen">
                                <thead>
                                    <tr>
                                        <th style="display:none;">
                                            <h5>No</h5>
                                        </th>
                                        <th>
                                            <h5>Nama</h5>
                                        </th>
                                        <th>
                                            <h5>Divisi</h5>
                                        </th>
                                        <th>
                                            <h5>Pilih</h5>
                                        </th>
                                        <th class="ps-2">
                                            <h5>Periode</h5>
                                        </th>
                                        <th>
                                            <h5>Asal</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all_aktif as $a) : ?>
                                        <tr>
                                            <td style="display:none;"><?php echo $a['id_user'] ?></td>
                                            <td><?php echo $a['nama'] ?></td>
                                            <td><?php echo getNamaDivisi($a['id_divisi']) ?></td>
                                            <td><?php echo $a['pilih'] ?></td>
                                            <td><?php echo date('d M Y', strtotime($a['tanggal_mulai'])) . " - " . date('d M Y', strtotime($a['tanggal_selesai'])) ?></td>
                                            <td><?php echo $a['asal'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!--End Card-->
                        </div>
                    <?php } ?>
                    <?php if (session()->role == 3) { ?>
                        <div class="card-body">
                            <!--<div class="mb-3">
                            <label for="filterPilih" class="form-label">Filter Pilih:</label>
                            <select class="form-select" id="filterPilih">
                                <option value="all">Semua</option>
                                <option value="pkl">PKL</option>
                                <option value="internship">Internship</option>
                            </select>
                        </div>-->

                            <table class="table" id="tb_absen">
                                <thead>
                                    <tr>
                                        <th style="display:none;">
                                            <h5>No</h5>
                                        </th>
                                        <th>
                                            <h5>Nama</h5>
                                        </th>
                                        <th>
                                            <h5>Pilih</h5>
                                        </th>
                                        <th>
                                            <h5>Periode</h5>
                                        </th>
                                        <th>
                                            <h5>Asal</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($divisi_aktif as $a) : ?>
                                        <tr>
                                            <td style="display:none;"><?php echo $a['id_user'] ?></td>
                                            <td><?php echo $a['nama'] ?></td>
                                            <td><?php echo $a['pilih'] ?></td>
                                            <td><?php echo date('d M Y', strtotime($a['tanggal_mulai'])) . " - " . date('d M Y', strtotime($a['tanggal_selesai'])) ?></td>
                                            <td><?php echo $a['asal'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!--End Card-body-->
                        </div>
                    <?php } ?>
                    <?php if (session()->role == 4) { ?>
                        <div class="card-body">
                            <table class="table" id="tb_absen">
                                <thead>
                                    <tr>
                                        <th style="display:none;">
                                            <h5>No</h5>
                                        </th>
                                        <th>
                                            <h5>Nama</h5>
                                        </th>
                                        <th>
                                            <h5>Pilih</h5>
                                        </th>
                                        <th>
                                            <h5>Periode</h5>
                                        </th>
                                        <th>
                                            <h5>Asal</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pembimbing_aktif as $a) : ?>
                                        <tr>
                                            <td style="display:none;"><?php echo $a['id_user'] ?></td>
                                            <td><?php echo $a['nama'] ?></td>
                                            <td><?php echo $a['pilih'] ?></td>
                                            <td><?php echo date('d M Y', strtotime($a['tanggal_mulai'])) . " - " . date('d M Y', strtotime($a['tanggal_selesai'])) ?></td>
                                            <td><?php echo $a['asal'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php if (session()->role == 1) { ?>
                <div class="col-6">
                    <div class="card" style="border-radius: 1em;">
                        <div class="card-header">
                            <h1 class="pt-5 mt-1">Daftar Hadir</h1>
                        </div>
                        <div class="card-body">
                            <table class="table" id="tb_absen3">
                                <thead>
                                    <tr>
                                        <th style="display:none;">
                                            <h5>No</h5>
                                        </th>
                                        <th>
                                            <h5>Nama</h5>
                                        </th>
                                        <th>
                                            <h5>Tanggal</h5>
                                        </th>
                                        <th>
                                            <h5>Clock In</h5>
                                        </th>
                                        <th>
                                            <h5>Clock Out</h5>
                                        </th>
                                        <th>
                                            <h5>Aktivitas</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($absen_today as $a) : ?>
                                        <tr>
                                            <td style="display:none;"><?php echo $a['id_user'] ?></td>
                                            <td><?php echo $a['nama'] ?></td>
                                            <td><?php echo date('d M Y', strtotime($a['tanggal'])) ?></td>
                                            <td><?php echo $a['clock_in'] ?></td>
                                            <td><?php echo $a['clock_out'] ?></td>
                                            <td class="mb-1">
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalListAktivitas<?= $a['id_absen'] ?>">
                                                    Aktivitas
                                                </button>
                                            </td>
                                            <!--Modal List Aktivitas-->
                                            <div class="modal fade" id="ModalListAktivitas<?= $a['id_absen'] ?>" tabindex="-1" aria-labelledby="ModalListAktivitasLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalListAktivitasLabel">Aktivitas</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="alertmessage" class="d-none alert alert-info">
                                                            </div>
                                                            <?php foreach ($aktivitas as $akt) : ?>
                                                                <?php if ($akt['id_absen'] == $a['id_absen']) { ?>
                                                                    <form id="formlistaktivitas">
                                                                        <?php csrf_field(); ?>
                                                                        <!-- KALAU ERROR -->
                                                                        <div class="alert alert-danger error" role="alert" style="display: none;">
                                                                        </div>
                                                                        <!-- KALAU SUKSES -->
                                                                        <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                                        </div>
                                                                        <!-- FORM INPUT DATA -->
                                                                        <div class="mb-3 row" id="aktivitas-group">
                                                                            <label for="inputAktivitas" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                                                <h5>Aktivitas</h5>
                                                                            </label>
                                                                            <div class="col-sm-9 ms-5">
                                                                                <label type="text" class="form-control" name="aktivitas" id="aktivitas"><?= $akt['aktivitas'] ?></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row" id="deskripsi-group">
                                                                            <label for="inputDeskripsi" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                                                <h5>Deskripsi</h5>
                                                                            </label>
                                                                            <div class="col-sm-9 ms-5">
                                                                                <textarea readonly class="form-control" name="deskripsi" id="deskripsi"><?= $akt['deskripsi'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                <?php endforeach ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Modal List Aktivitas-->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!--End Card-->
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (session()->role == 3) { ?>
                <div class="col-6">
                    <div class="card" style="border-radius: 1em;">
                        <div class="card-header">
                            <h1 class="pt-5 mt-1">Daftar Hadir</h1>
                        </div>
                        <div class="card-body">
                            <table class="table" id="tb_absen3">
                                <thead>
                                    <tr>
                                        <th style="display:none;">
                                            <h5>No</h5>
                                        </th>
                                        <th>
                                            <h5>Nama</h5>
                                        </th>
                                        <th>
                                            <h5>Tanggal</h5>
                                        </th>
                                        <th>
                                            <h5>Clock In</h5>
                                        </th>
                                        <th>
                                            <h5>Clock Out</h5>
                                        </th>
                                        <th>
                                            <h5>Aktivitas</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($absen_today_2 as $a) : ?>
                                        <tr>
                                            <td style="display:none;"><?php echo $a['id_user'] ?></td>
                                            <td><?php echo $a['nama'] ?></td>
                                            <td><?php echo date('d M Y', strtotime($a['tanggal'])) ?></td>
                                            <td><?php echo $a['clock_in'] ?></td>
                                            <td><?php echo $a['clock_out'] ?></td>
                                            <td class="mb-1">
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalListAktivitas<?= $a['id_absen'] ?>">
                                                    Aktivitas
                                                </button>
                                            </td>
                                            <!--Modal List Aktivitas-->
                                            <div class="modal fade" id="ModalListAktivitas<?= $a['id_absen'] ?>" tabindex="-1" aria-labelledby="ModalListAktivitasLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalListAktivitasLabel">Aktivitas</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="alertmessage" class="d-none alert alert-info">
                                                            </div>
                                                            <?php foreach ($aktivitas as $akt) : ?>
                                                                <?php if ($akt['id_absen'] == $a['id_absen']) { ?>
                                                                    <form id="formlistaktivitas">
                                                                        <?php csrf_field(); ?>
                                                                        <!-- KALAU ERROR -->
                                                                        <div class="alert alert-danger error" role="alert" style="display: none;">
                                                                        </div>
                                                                        <!-- KALAU SUKSES -->
                                                                        <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                                        </div>
                                                                        <!-- FORM INPUT DATA -->
                                                                        <div class="mb-3 row" id="aktivitas-group">
                                                                            <label for="inputAktivitas" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                                                <h5>Aktivitas</h5>
                                                                            </label>
                                                                            <div class="col-sm-9 ms-5">
                                                                                <label type="text" class="form-control" name="aktivitas" id="aktivitas"><?= $akt['aktivitas'] ?></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row" id="deskripsi-group">
                                                                            <label for="inputDeskripsi" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                                                <h5>Deskripsi</h5>
                                                                            </label>
                                                                            <div class="col-sm-9 ms-5">
                                                                                <textarea readonly class="form-control" name="deskripsi" id="deskripsi"><?= $akt['deskripsi'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                <?php endforeach ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Modal List Aktivitas-->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!--End Card-->
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (session()->role == 4) { ?>
                <div class="col-6">
                    <div class="card" style="border-radius: 1em;">
                        <div class="card-header">
                            <h1 class="pt-5 mt-1">Daftar Hadir</h1>
                        </div>
                        <div class="card-body">
                            <table class="table" id="tb_absen3">
                                <thead>
                                    <tr>
                                        <th style="display:none;">
                                            <h5>No</h5>
                                        </th>
                                        <th>
                                            <h5>Nama</h5>
                                        </th>
                                        <th>
                                            <h5>Tanggal</h5>
                                        </th>
                                        <th>
                                            <h5>Clock In</h5>
                                        </th>
                                        <th>
                                            <h5>Clock Out</h5>
                                        </th>
                                        <th>
                                            <h5>Aktivitas</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($absen_today_3 as $a) : ?>
                                        <tr>
                                            <td style="display:none;"><?php echo $a['id_user'] ?></td>
                                            <td><?php echo $a['nama'] ?></td>
                                            <td><?php echo date('d M Y', strtotime($a['tanggal'])) ?></td>
                                            <td><?php echo $a['clock_in'] ?></td>
                                            <td><?php echo $a['clock_out'] ?></td>
                                            <td class="mb-1">
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalListAktivitas<?= $a['id_absen'] ?>">
                                                    Aktivitas
                                                </button>
                                            </td>
                                            <div class="modal fade" id="ModalListAktivitas<?= $a['id_absen'] ?>" tabindex="-1" aria-labelledby="ModalListAktivitasLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalListAktivitasLabel">Aktivitas</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="alertmessage" class="d-none alert alert-info">
                                                            </div>
                                                            <?php foreach ($aktivitas as $akt) : ?>
                                                                <?php if ($akt['id_absen'] == $a['id_absen']) { ?>
                                                                    <form id="formlistaktivitas">
                                                                        <?php csrf_field(); ?>
                                                                        <div class="alert alert-danger error" role="alert" style="display: none;">
                                                                        </div>
                                                                        <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                                        </div>
                                                                        <div class="mb-3 row" id="aktivitas-group">
                                                                            <label for="inputAktivitas" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                                                <h5>Aktivitas</h5>
                                                                            </label>
                                                                            <div class="col-sm-9 ms-5">
                                                                                <label type="text" class="form-control" name="aktivitas" id="aktivitas"><?= $akt['aktivitas'] ?></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row" id="deskripsi-group">
                                                                            <label for="inputDeskripsi" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                                                <h5>Deskripsi</h5>
                                                                            </label>
                                                                            <div class="col-sm-9 ms-5">
                                                                                <textarea readonly class="form-control" name="deskripsi" id="deskripsi"><?= $akt['deskripsi'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                <?php endforeach ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>

<script>
    (function() {
        /**
         * Draws the outline of the svg circle to the percent set in data attr
         */
        function drawCharts() {

            var circles = document.querySelectorAll('.percent-circle');

            circles.forEach(function(el) {
                //pull the percentage and turn it into a fraction
                var percent = el.dataset.percent / 35;
                //work out the circumference from the width
                var diameter = el.offsetWidth;
                var circumference = Math.ceil(diameter * Math.PI);
                //now we have the circumference, we know how long the ouline should be
                var stroke = Math.ceil(circumference * percent);
                //also workout how long the line doesn't exist for
                var diff = circumference - stroke;

                //now add the strok dash array for the first two values
                //TODO : could this all be done with css?
                el.querySelector('.percent-circle-inner').style.strokeDasharray = stroke + 'px ' + diff + 'px';
            });
        }

        document.addEventListener('DOMContentLoaded', drawCharts);
    })();
</script>

<script>
    $(document).ready(function() {
        $('#filterPilih').change(function() {
            const selectedOption = $(this).val();
            $('#tb_absen tbody tr').hide();
            if (selectedOption === 'all') {
                // Show all rows if "All" is selected
                $('#tb_absen tbody tr').show();
            } else {
                // Show rows based on selected option
                $(`#tb_absen tbody tr td:nth-child(4):contains('${selectedOption}')`).parent().show();
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"></script>
<script>
    moment.locale('id');

    const tanggalMulai = moment("<?= session()->tanggal_mulai ?>");
    const tanggalMulaiFormatted = tanggalMulai.format('D MMMM YYYY');

    const output = `<div class="fw-semibold text-dark fs-7">${tanggalMulaiFormatted}</div>`;

    document.getElementById("output").innerHTML = output;
</script>
<script>
    moment.locale('id');

    const tanggalSelesai = moment("<?= session()->tanggal_selesai ?>");
    const tanggalSelesaiFormatted = tanggalSelesai.format('D MMMM YYYY');

    const output2 = `<div class="fw-semibold text-dark fs-7">${tanggalSelesaiFormatted}</div>`;

    document.getElementById("output2").innerHTML = output2;
</script>
<script>
    moment.locale('id');

    const tanggalSelesai = moment("<?= session()->tanggal_selesai ?>");
    const tanggalSelesaiFormatted = tanggalSelesai.format('D MMMM YYYY');

    const output2 = `<div class="fw-semibold text-dark fs-7">${tanggalSelesaiFormatted}</div>`;

    document.getElementById("output2").innerHTML = output2;
</script>
<?= $this->endSection() ?>