<?= $this->extend("layout/template") ?>
<?= $this->section("konten") ?>
<div class="container">
    <div class="card mt-4" style="width: auto; border-radius: 1em;">
        <div class="card-header">
            <h1 class="pt-5 mt-1">Tambah Aktivitas</h1>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show success-alert" id="success-alert" role="alert">
                    <h4>Coba isi kembali</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <table class="table table-bordered" id="tb_absen2">
                <thead>
                    <tr>
                        <th>
                            <h5>Tanggal</h5>
                        </th>
                        <th>
                            <h5>Aktivitas</h5>
                        </th>
                        <th>
                            <h5>Aksi</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($absen2 as $ab2) : ?>
                        <?php if ($ab2['id_user'] == session()->id_user) { ?>
                            <tr>
                                <td>
                                    <?php echo date("d M Y", strtotime($ab2['tanggal'])) ?>
                                </td>

                                <td class="mb-1">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalListAktivitas<?= $ab2['id_absen'] ?>">
                                        Aktivitas
                                    </button>
                                </td>
                                <td class="text-start">
                                    <?php if ($ab2['tanggal'] == date('Y-m-d') && empty($aktivitas_kosong)) { ?>
                                        <button type="button" class="btn-sm btn btn-bg-white btn-primary" data-bs-toggle="modal" data-bs-target="#Modaltambah_aktivitas<?= $ab2['id_absen'] ?>">Tambah Aktivitas</button>
                                    <?php } else if ($ab2['tanggal'] == date('Y-m-d') && !empty($aktivitas_kosong)) { ?>
                                        <button type="button" class="btn-sm btn btn-bg-white btn-warning" data-bs-toggle="modal" data-bs-target="#Modaledit_aktivitas<?= $ab2['id_absen'] ?>">Edit Aktivitas</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>

                        <!-- Modal Tambah Aktivitas-->
                        <div class="modal fade" id="Modaltambah_aktivitas<?= $ab2['id_absen'] ?>" aria-labelledby="Modaltambah_aktivitasLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Modaltambah_aktivitasLabel">Form Aktivitas </h5>
                                        <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="alertmessage" class="d-none alert alert-info"></div>
                                        <form action="<?= site_url('/tambah_aktivitas') ?>" method="post" id="formaktivitas">
                                            <?php csrf_field(); ?>
                                            <!-- KALAU ERROR -->
                                            <div class="alert alert-danger error" role="alert" style="display: none;">
                                            </div>
                                            <!-- KALAU SUKSES -->
                                            <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                            </div>
                                            <!-- FORM INPUT DATA -->
                                            <input type="hidden" class="form-control" name="absen" id="absen" value="<?= $ab2['id_absen'] ?>">
                                            <input type="hidden" class="form-control" name="users" id="users" value="<?= session()->id_user ?>">
                                            <input type="hidden" id="inputId">
                                            <div class="mb-3 row" id="aktivitas-group">
                                                <label for="inputAktivitas" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                    <h5>Aktivitas</h5>
                                                </label>
                                                <div class="col-sm-9 ms-5">
                                                    <input type="text" class="form-control" name="aktivitas" id="aktivitas">
                                                </div>
                                            </div>
                                            <div class="mb-3 row" id="deskripsi-group">
                                                <label for="inputDeskripsi" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                    <h5>Deskripsi</h5>
                                                </label>
                                                <div class="col-sm-9 ms-5">
                                                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" id="submit-btn" class="btn btn-primary tombolSimpan">Simpan</button>
                                        </form>
                                    </div>
                                    <!--End Modal Content-->
                                </div>
                                <!--End Modal Dialog-->
                            </div>
                            <!--End Modal Aktivitas-->
                        </div>
                        <!--Modal Tampil Aktivitas-->
                        <div class="modal fade" id="ModalListAktivitas<?= $ab2['id_absen'] ?>" tabindex="-1" aria-labelledby="ModalListAktivitasLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalListAktivitasLabel">Aktivitas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="alertmessage" class="d-none alert alert-info">
                                        </div>
                                        <?php foreach ($aktivitas2 as $akt) : ?>
                                            <?php if ($akt['id_absen'] == $ab2['id_absen']) { ?>
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

                        <!-- Modal Edit Aktivitas-->
                        <?php foreach ($aktivitas2 as $akt) : ?>
                            <?php if ($akt['id_absen'] == $ab2['id_absen']) { ?>
                                <div class="modal fade" id="Modaledit_aktivitas<?= $ab2["id_absen"] ?>" aria-labelledby="Modaledit_aktivitasLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="Modaledit_aktivitasLabel">Edit Aktivitas</h5>
                                                <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="<?= site_url('/edit_aktivitas/' . $ab2["id_absen"]) ?>" method="post" id="editAktivitas">
                                                    <?php csrf_field(); ?>
                                                    <!-- KALAU ERROR -->
                                                    <div class="alert alert-danger error" role="alert" style="display: none;">
                                                    </div>
                                                    <!-- KALAU SUKSES -->
                                                    <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                    </div>
                                                    <!-- FORM INPUT DATA -->

                                                    <input type="hidden" class="form-control" name="absen" id="absen" value="<?= $ab2['id_absen'] ?>">
                                                    <input type="hidden" class="form-control" name="users" id="users" value="<?= session()->id_user ?>">
                                                    <input type="hidden" id="inputId">
                                                    <div class="mb-3 row" id="aktivitas-group">
                                                        <label for="inputAktivitas" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                            <h5>Aktivitas</h5>
                                                        </label>
                                                        <div class="col-sm-9 ms-5">
                                                            <input type="text" class="form-control" name="aktivitas" value="<?= $akt['aktivitas'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row" id="deskripsi-group">
                                                        <label for="inputDeskripsi" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;">
                                                            <h5>Deskripsi</h5>
                                                        </label>
                                                        <div class="col-sm-9 ms-5">
                                                            <textarea class="form-control" name="deskripsi"><?= $akt['deskripsi'] ?></textarea>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary" id="update-btn">Update</button>
                                                <div class="response-message ms-3"></div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endforeach ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <script>
                function change2() {
                    document.getElementById('tanggal_keluar').valueAsDate = new Date();
                    // document.getElementById("tanggal_keluar").value = "<?= date("d/m/Y"); ?>";
                    document.getElementById("jam_keluar").value = "<?= date("H:i:s"); ?>";
                };
            </script>

            <script>
                function change() {
                    document.getElementById('tanggal_masuk').valueAsDate = new Date();
                    // document.getElementById("tanggal_masuk").value = "<?= date("d/m/Y"); ?>";
                    document.getElementById("jam_masuk").value = "<?= date("H:i:s"); ?>";
                };
            </script>
            <!--End Card-->
        </div>
        <!--End Container-->
    </div>


    <?= $this->endSection() ?>