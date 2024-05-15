<?= $this->extend("layout/template") ?>
<?= $this->section("konten") ?>

<div class="container">
    <div class="card mt-4" style="width: auto; border-radius: 1em;">
        <div class="card-header">
            <h1 class="pt-5 mt-1">Data User</h1>
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
                            <h5>Email</h5>
                        </th>
                        <th>
                            <h5>Divisi</h5>
                        </th>
                        <th>
                            <h5>Jenis</h5>
                        </th>
                        <th>
                            <h5>Role</h5>
                        </th>
                        <th>
                            <h5>Aksi</h5>
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
                                <td><?php echo $u['nama'] ?></td>
                                <td><?php echo $u['email'] ?></td>
                                <td><?php echo $u['nama_divisi'] ?></td>
                                <td><?php echo ucwords($u['pilih']) ?></td> 
                                <td><?php echo $u['nama_role'] ?></td>
                                <td>
                                    <div class="me-0">
                                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                            <i class="bi bi-three-dots fs-3"></i>
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $u["id_user"] ?>">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#ModalGantiPassword<?= $u["id_user"] ?>">Ganti Password</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                    </div>
                                    <!-- <button type="button" class="btn btn-warning btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $u["id_user"] ?>">Edit</button> -->
                                    <!-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDelete<?= $u["id_user"] ?>">Delete</button> -->
                                </td>
                            </tr>

                            <!--Modal Ganti Password User-->
                            <div class="modal fade" id="ModalGantiPassword<?= $u["id_user"] ?>" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2>Ganti Password User</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                                            <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <form id="gantipassuser" method="post" action="<?= site_url('/ganti_password_edit') ?>">
                                                <?php csrf_field(); ?>
                                                <!-- KALAU ERROR -->
                                                <div class="alert alert-danger error" role="alert" style="display: none;">
                                                </div>
                                                <!-- KALAU SUKSES -->
                                                <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                </div>
                                                <!-- FORM INPUT DATA -->
                                                <input type="hidden" class="form-control form-control-solid mb-3" name="id_password" id="id_password" autocomplete="off" value="<?= $u["id_user"] ?>">
                                                <div class="row" data-kt-password-meter="true">
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
                                                    <div class="col-4">
                                                    </div>
                                                    <div class="col-8 text-end">
                                                        <button type="button" data-bs-dismiss="modal" class="btn btn-light ms-4 me-5">Back</button>
                                                        <button type="submit" class="btn btn-primary ml-auto" id="ganti_pass_btn">Update</button>
                                                    </div>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - New Card-->

                            <!-- Modal Edit-->
                            <div class="modal fade" id="ModalEdit<?= $u["id_user"] ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Edit User</h5>
                                            <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= site_url('/edit/' . $u["id_user"]) ?>" method="post" id="editForm">
                                                <?php csrf_field(); ?>
                                                <!-- KALAU ERROR -->
                                                <div class="alert alert-danger error" role="alert" style="display: none;">
                                                </div>
                                                <!-- KALAU SUKSES -->
                                                <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                </div>
                                                <!-- FORM INPUT DATA -->
                                                <input type="hidden" id="inputId">
                                                <div class="mb-3 row">
                                                    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nama" value="<?= $u["nama"] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="email" value="<?= $u["email"] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputDivisi" class="col-sm-2 col-form-label">Divisi</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example" name="divisi">
                                                            <?php foreach ($divisi as $d) : ?>
                                                                <?php if ($d["id_divisi"] == $u["id_divisi"]) { ?>
                                                                    <option selected value="<?= $d["id_divisi"] ?>"><?= $d["nama_divisi"] ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $d["id_divisi"] ?>"><?= $d["nama_divisi"] ?></option>
                                                                    <!-- <input type="text" class="form-control"  name="divisi" value="<?= $u["id_divisi"] ?>"> -->
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputJenis" class="col-sm-2 col-form-label">Jenis</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example" name="pilih">
                                                            <option <?= ($u['pilih'] == 'pkl') ? 'selected' : ''; ?> value="pkl">PKL</option>
                                                            <option <?= ($u['pilih'] == 'internship') ? 'selected' : ''; ?> value="internship">Internship</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example" name="role">
                                                            <?php foreach ($role as $r) : ?>
                                                                <?php if ($r["id_role"] == $u["id_role"]) { ?>
                                                                    <option selected value="<?= $r["id_role"] ?>"><?= $r["nama_role"] ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $r["id_role"] ?>"><?= $r["nama_role"] ?></option>

                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputNIPEG" class="col-sm-2 col-form-label">Pembimbing</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example" name="NIPEG">
                                                            <?php foreach ($pembimbing as $p) : ?>
                                                                <?php if ($p["NIPEG"] == $u["pembimbing"]) { ?>
                                                                    <option selected value="<?= $p["NIPEG"] ?>"><?= ucwords(strtolower($p["NAMA"])); ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $p["NIPEG"] ?>"><?= ucwords(strtolower($p["NAMA"])); ?></option>

                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
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
                            <?php endforeach; ?>
                        <?php } else if (session()->role == 3) { ?>
                            <?php
                            $nomor = 1;
                            foreach ($users2 as $u) : ?>
                                <tr>
                                    <td><?php echo $nomor++ ?></td>
                                    <td><?php echo $u['nama'] ?></td>
                                    <td><?php echo $u['email'] ?></td>
                                    <td><?php echo $u['nama_divisi'] ?></td>
                                    <td><?php echo $u['pilih'] ?></td>
                                    <td><?php echo $u['nama_role'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $u["id_user"] ?>">Edit</button>
                                        <!-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDelete<?= $u["id_user"] ?>">Delete</button> -->
                                    </td>
                                </tr>

                                <!--Modal Edit-->
                                <div class="modal fade" id="ModalEdit<?= $u["id_user"] ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Form Edit User</h5>
                                                <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= site_url('/edit/' . $u["id_user"]) ?>" method="post" id="editForm">
                                                    <?php csrf_field(); ?>
                                                    <!-- KALAU ERROR -->
                                                    <div class="alert alert-danger error" role="alert" style="display: none;">
                                                    </div>
                                                    <!-- KALAU SUKSES -->
                                                    <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                    </div>
                                                    <!-- FORM INPUT DATA -->
                                                    <input type="hidden" id="inputId">
                                                    <div class="mb-3 row">
                                                        <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nama" value="<?= $u["nama"] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="email" value="<?= $u["email"] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputDivisi" class="col-sm-2 col-form-label">Divisi</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-select" aria-label="Default select example" name="divisi">
                                                                <?php foreach ($divisi as $d) : ?>
                                                                    <?php if ($d["id_divisi"] == $u["id_divisi"]) { ?>
                                                                        <option selected value="<?= $d["id_divisi"] ?>"><?= $d["nama_divisi"] ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?= $d["id_divisi"] ?>"><?= $d["nama_divisi"] ?></option>
                                                                        <!-- <input type="text" class="form-control"  name="divisi" value="<?= $u["id_divisi"] ?>"> -->
                                                                    <?php } ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-select" aria-label="Default select example" name="role">
                                                                <?php foreach ($role as $r) : ?>
                                                                    <?php if ($r["id_role"] == $u["id_role"]) { ?>
                                                                        <option selected value="<?= $r["id_role"] ?>"><?= $r["nama_role"] ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?= $r["id_role"] ?>"><?= $r["nama_role"] ?></option>

                                                                    <?php } ?>
                                                                <?php endforeach; ?>
                                                            </select>
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
                            <?php endforeach; ?>

                        <?php } else if (session()->role == 4) { ?>
                            <?php
                            $nomor = 1;
                            foreach ($users3 as $u) : ?>
                                <tr>
                                    <td><?php echo $nomor++ ?></td>
                                    <td><?php echo $u['nama'] ?></td>
                                    <td><?php echo $u['email'] ?></td>
                                    <td><?php echo $u['nama_divisi'] ?></td>
                                    <td><?php echo $u['pilih'] ?></td>
                                    <td><?php echo $u['nama_role'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $u["id_user"] ?>">Edit</button>
                                        <!-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDelete<?= $u["id_user"] ?>">Delete</button> -->
                                    </td>
                                </tr>

                                <!--Modal Edit-->
                                <div class="modal fade" id="ModalEdit<?= $u["id_user"] ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Form Edit User</h5>
                                                <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= site_url('/edit/' . $u["id_user"]) ?>" method="post" id="editForm">
                                                    <?php csrf_field(); ?>
                                                    <!-- KALAU ERROR -->
                                                    <div class="alert alert-danger error" role="alert" style="display: none;">
                                                    </div>
                                                    <!-- KALAU SUKSES -->
                                                    <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                                    </div>
                                                    <!-- FORM INPUT DATA -->
                                                    <input type="hidden" id="inputId">
                                                    <div class="mb-3 row">
                                                        <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nama" value="<?= $u["nama"] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="email" value="<?= $u["email"] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputDivisi" class="col-sm-2 col-form-label">Divisi</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-select" aria-label="Default select example" name="divisi">
                                                                <?php foreach ($divisi as $d) : ?>
                                                                    <?php if ($d["id_divisi"] == $u["id_divisi"]) { ?>
                                                                        <option selected value="<?= $d["id_divisi"] ?>"><?= $d["nama_divisi"] ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?= $d["id_divisi"] ?>"><?= $d["nama_divisi"] ?></option>
                                                                        <!-- <input type="text" class="form-control"  name="divisi" value="<?= $u["id_divisi"] ?>"> -->
                                                                    <?php } ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-select" aria-label="Default select example" name="role">
                                                                <?php foreach ($role as $r) : ?>
                                                                    <?php if ($r["id_role"] == $u["id_role"]) { ?>
                                                                        <option selected value="<?= $u["id_role"] ?>"><?= $u["nama_role"] ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?= $r["id_role"] ?>"><?= $r["nama_role"] ?></option>

                                                                    <?php } ?>
                                                                <?php endforeach; ?>
                                                            </select>
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