<?= $this->extend("layout/template") ?>
<?= $this->section("konten") ?>

<div class="container">
    <div class="card mt-4" style="width: auto; border-radius: 1em;">
        <div class="card-header">
            <h1 class="pt-5 mt-1">Data Absen <?= $users['nama']; ?></h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="tb_absen3">
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

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($absen as $u) :
                    ?>
                        <tr>
                            <td style="display:none;"><?php echo $u['id_absen'] ?></td>
                            <td><?php echo date("d M Y", strtotime($u['tanggal'])) ?></td>
                            <td><?php echo $u['clock_in'] ?></td>
                            <td><?php echo $u['clock_out'] ?></td>
                            <td>
                                <?php
                                $awal  = new DateTime($u['clock_in']);
                                $akhir = new DateTime($u['clock_out']); // Waktu sekarang
                                $diff  = $awal->diff($akhir);
                                $hari  = new DateTime($u['tanggal']);

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
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalListAktivitas<?= $u['id_absen'] ?>">
                                    Aktivitas
                                </button>
                            </td>
                        </tr>

                        <!--Modal List Aktivitas-->
                        <div class="modal fade" id="ModalListAktivitas<?= $u['id_absen'] ?>" tabindex="-1" aria-labelledby="ModalListAktivitasLabel" aria-hidden="true">
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
                                            <?php if ($akt['id_absen'] == $u['id_absen']) { ?>
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

                    <?php endforeach; ?>
                </tbody>
            </table>

            <!--End Card-->
        </div>
        <!--End Container-->
    </div>
</div>
<?= $this->endSection() ?>