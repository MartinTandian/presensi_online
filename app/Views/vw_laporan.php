<?= $this->extend("layout/template") ?>
<?= $this->section("konten") ?>

<div class="container">
    <div class="card mt-4" style="width: auto; border-radius: 1em;">
        <div class="card-header">
            <h1 class="pt-5 mt-1">Data Absen User</h1>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show success-alert" id="success-alert" role="alert">
                    <h4>Coba isi kembali</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <table class="table table-bordered" id="tb_absen4">
                <thead>
                    <tr>
                        <th>
                            <h5>No</h5>
                        </th>
                        <th>
                            <h5>Nama</h5>
                        </th>
                        <th>
                            <h5>Divisi</h5>
                        </th>
                        <th>
                            <h5>Asal Sekolah / Kampus</h5>
                        </th>
                        <th>
                            <h5>Tanggal Mulai</h5>
                        </th>
                        <th>
                            <h5>Tanggal Selesai</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (session()->role == 1) { ?>
                        <?php
                        $nomor = 1;
                        foreach ($users as $u) : ?>
                            <tr>
                                <td><?php echo $nomor++ ?></td>
                                <td><a href="<?= base_url('/laporan_user/' . $u["id_user"]) ?>"><?php echo $u['nama'] ?></a></td>
                                <td><?php echo $u['nama_divisi'] ?></td>
                                <td><?php echo $u['asal'] ?></td>
                                <td><?php echo date('d M Y', strtotime($u['tanggal_mulai']))?></td>
                                <td><?php echo date('d M Y', strtotime($u['tanggal_selesai']))?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else if (session()->role == 3) { ?>
                        <?php
                        $nomor = 1;
                        foreach ($users2 as $u) : ?>
                            <tr>
                                <td><?php echo $nomor++ ?></td>
                                <td><a href="<?= base_url('/laporan_user/' . $u["id_user"]) ?>"><?php echo $u['nama'] ?></a></td>
                                <td><?php echo $u['nama_divisi'] ?></td>
                                <td><?php echo $u['asal'] ?></td>
                                <td><?php echo date('d M Y', strtotime($u['tanggal_mulai']))?></td>
                                <td><?php echo date('d M Y', strtotime($u['tanggal_selesai']))?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else if (session()->role == 4) { ?>
                        <?php
                        $nomor = 1;
                        foreach ($users3 as $u) : ?>
                            <tr>
                                <td><?php echo $nomor++ ?></td>
                                <td><a href="<?= base_url('/laporan_user/' . $u["id_user"]) ?>"><?php echo $u['nama'] ?></a></td>
                                <td><?php echo $u['nama_divisi'] ?></td>
                                <td><?php echo $u['asal'] ?></td>
                                <td><?php echo date('d M Y', strtotime($u['tanggal_mulai']))?></td>
                                <td><?php echo date('d M Y', strtotime($u['tanggal_selesai']))?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } ?>

                </tbody>
            </table>

            <!--End Card-->
        </div>
        <!--End Container-->
    </div>
</div>
<?= $this->endSection() ?>