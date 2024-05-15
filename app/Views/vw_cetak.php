<?= $this->extend("layout/template") ?>
<?= $this->section("konten") ?>

<style>
    .box {
        height: 160px;
        width: 150px;
        margin-bottom: 1px;
        border: 2px white;
    }

    .box2 {
        height: 40px;
        width: 100px;
        margin-bottom: 1px;
        border: 2px white;
    }

    .box3 {
        height: 40px;
        width: 80px;
        margin-bottom: 1px;
        border: 2px white;
    }

    .card-header {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        padding: 20px 0;
    }

    .table {
        border: 3px solid black;
    }
</style>

<div class="container">
    <div class="card mt-4" style="width: auto; border-radius: 1em;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="mt-5 mb-0">LAPORAN ABSEN MINGGUAN</h1>
            <button onclick="window.print()" class="btn btn-light text-dark" id="tombol_print" style="margin-left: auto;">Print</button>
        </div>

        <div class="card-body">
            <span class="fs-3"><b>Nama Mahasiswa :</b> <?= session()->nama; ?></span></br>
            <span class="fs-3"><b>Asal Sekolah / Kampus :</b> <?= session()->asal; ?></span></br>
            <span class="fs-3"><b>Periode : </b>
                <?php if ($awal == '' && $akhir == '') { ?>
                    <?= "-" ?>
                <?php } else { ?>
                    <?php echo date('d F Y', strtotime($awal)) ?> - <?= date('d F Y', strtotime($akhir)) ?>
                <?php } ?>
            </span>
            <span class="fs-3">
                <form method="post" id="filter_absen" action="<?= base_url('/filter_absen') ?>">
                    <label for="tanggal_awal" id="tanggal_awal_label">Tanggal Awal:</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal">
                    <label for="tanggal_akhir" id="tanggal_akhir_label">Tanggal Akhir:</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir">
                    <button type="submit" id="btn-filter" class="btn btn-light text-dark">Filter</button>
                </form>
            </span>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: auto; border-radius: 1em;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered border-dark">
                            <thead>
                                <tr class="baris border-3 border-dark">
                                    <th style="display:none;">
                                        <h5>No</h5>
                                    </th>
                                    <th>
                                        <h5 class="box3 text-center mb-3 mt-1">Tanggal</h5>
                                    </th>
                                    <th>
                                        <h5 class="box2 text-center mb-3 mt-1">Jam Datang</h5>
                                    </th>
                                    <th>
                                        <h5 class="box2 text-center mb-3 mt-1">Jam Pulang</h5>
                                    </th>
                                    <th>
                                        <h5 class="mb-10 text-center mt-1">Aktivitas</h5>
                                    </th>
                                    <th>
                                        <h5 class="text-center mb-5 mt-1 me-2">Evaluasi dan Paraf <br>Pembimbing Lapangan</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($absen_mingguan as $a) : ?>
                                    <?php if ($a['id_user'] == session()->id_user) { ?>
                                        <tr class="baris border-3 border-dark">
                                            <td style="display:none;"><?php echo $a['id_absen'] ?></td>
                                            <td class="mx-3"><?php echo date('d M Y', strtotime($a['tanggal'])) ?></td>
                                            <td class="mx-3"><?php echo $a['clock_in'] ?></td>
                                            <td class="mx-3"><?php echo $a['clock_out'] ?></td>
                                            <td class="mx-3">
                                                <?php foreach ($aktivitas as $akt) : ?>
                                                    <?php if ($akt['id_absen'] == $a['id_absen']) { ?>
                                                        <form id="formlistaktivitas">
                                                            <label type="text" class="mb-3 fs-6" name="aktivitas" id="aktivitas"><?= $akt['aktivitas'] ?></label>
                                                            <p type="text" class="fs-7" name="deskripsi" id="deskripsi">Deskripsi : <?= $akt['deskripsi'] ?></p>
                                                        </form>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="mx-3">

                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <!--End Card-body-->
                </div>

            </div>
        </div>
    </div>
</div>

<!--End konten role 2-->


<?= $this->endSection() ?>