<div class="modal fade" id="Modalabsen2<?= $a["id_absen"]?>" aria-labelledby="Modalabsen2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Modalabsen2Label">Form Absen Clock Out </h5>
                                <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        <div class="modal-body">
                            <div id="alertmessage" class="d-none alert alert-info"></div>
                            <!-- KALAU ERROR -->
                                    <div class="alert alert-danger error" role="alert" style ="display: none;">
                                    </div>
                            <!-- KALAU SUKSES -->
                                    <div class="alert alert-primary sukses" role="alert" style ="display: none;">
                                    </div>
                            <!-- FORM INPUT DATA -->
                                    <input type = "hidden" id = "inputId">
                                        <div class="mb-3 row" id="tanggal-group">
                                            <label for="inputTanggal" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;"><h5>Tanggal</h5></label>
                                                <div class="col-sm-9 ms-5">
                                                    <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar" value ="<?php echo date('Y-m-d') ?>">
                                                </div>
                                        </div>
                                        <div class="mb-3 row" id="tanggal-group">
                                            <label for="inputTanggal" class="col-sm-2 col-form-label px-3" style="white-space: nowrap;"><h5>Clock Out</h5></label>
                                                <div class="col-sm-9 ms-5">
                                                    <input type="text" class="form-control" name="jam_keluar" id="jam_keluar" placeholder="Format jam:menit:detik">
                                                </div>
                                       </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" id="absenKeluar" onclick="change2()" class="btn btn-success absenKeluar" name="absenKeluar">Absen</button>
                            <button type="submit" id="submit-btn" class="btn btn-primary tombolSimpan">Simpan</button>
                        </div>
                        </form>
                        <!--End Modal Content-->
                        </div>
                    <!--End Modal Dialog-->
                    </div>
            <!--End Modal Absen 2--> 
                </div>


                <!-- TOMBOL TITIK TIGA MENU DROPDOWN-->
                <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
								<i class="bi bi-three-dots fs-3"></i>
							</button>
							<!--begin::Menu 3-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
								<!--begin::Heading-->
																<div class="menu-item px-3">
																	<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Menu</div>
																</div>
																<!--end::Heading-->
																<!--begin::Menu item-->
																<!-- <div class="menu-item px-3">
																	<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#Modalabsen1">Clock In</a>
																</div> -->
																<!--end::Menu item-->
																<!--begin::Menu item-->
																
																<!--end::Menu item-->
																<!--begin::Menu item-->
																
																<!--end::Menu item-->
								</div>    

                                <!-- Modal Delete halaman edit-->
                        
                        <!-- <div class="modal fade" id="ModalDelete<?= $u["id_user"]?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action ="<?= base_url('/hapus/' .$u["id_user"])?>" method ="post" id="registrationForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Delete User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                <p> Yakin ingin menghapus <b><?= $u['nama']?></b> ?</p>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                            </div>
                            </div>
                        </div>
                        </div> -->

						<!--Modal List Aktivitas Lama-->
						<div class="modal fade" id="ModalListAktivitas<?= $a['id_absen'] ?>" aria-labelledby="ModalListAktivitasLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ModalListAktivitasLabel">List Aktivitas</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-9">
                                                            <div class="col-md-4 col-lg-12 col-xl-2">
                                                                <div class="mb-3">
                                                                    <div class="d-flex flex-stack">
                                                                        <div class="fw-bolder fs-4">No</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-lg-12 col-xl-4">
                                                                <div class="mb-3">
                                                                    <div class="d-flex flex-stack">
                                                                        <div class="fw-bolder fs-4">Aktivitas</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-lg-12 col-xl-5">
                                                                <div class="mb-3">
                                                                    <div class="d-flex flex-stack">
                                                                        <div class="fw-bolder fs-4">Deskripsi</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($aktivitas as $akt) : ?>
                                                                <?php if ($akt['id_absen'] == $a['id_absen']) { ?>

                                                                    <div class="col-md-3 col-lg-12 col-xl-2">
                                                                        <div class="mb-1">
                                                                            <div class="d-flex flex-stack">
                                                                                <div class="fs-5"><?= $no++ ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-lg-12 col-xl-4">
                                                                        <div class="mb-1">
                                                                            <div class="d-flex flex-stack">
                                                                                <div class="fs-5"><?= $akt['aktivitas'] ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-lg-12 col-xl-5">
                                                                        <div class="mb-1">
                                                                            <div class="d-flex flex-stack">
                                                                                <div class="fs-5"><?= $akt['deskripsi'] ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<!--End Modal List Aktivitas Lama-->

                        <!--Navbar Menu-->
                        <a href="/" class="btn btn-hover-bg-primary btn-text-primary btn-hover-text-white border-0 font-weight-bold mr-2 me-3">
													<span class="menu-title">Home</span>
												</a>													
												<a href="<?= base_url('/absen')?>" class="btn btn-hover-bg-primary btn-text-primary btn-hover-text-white border-0 font-weight-bold mr-2">
													<span class="menu-title">Add Activity</span>
												</a>
												<?php if(session()->role == 1){ ?> 
												<a href="<?= base_url('/users')?>" class="btn btn-hover-bg-primary btn-text-primary btn-hover-text-white border-0 font-weight-bold mr-2 me-3">
													<span class="menu-title">User</span>
												</a>
												<!--Menu Tambahan-->
												<!-- <a href="<?= base_url('/divisi')?>" class="btn btn-hover-bg-primary btn-text-primary btn-hover-text-white border-0 font-weight-bold mr-2 me-3">
													<span class="menu-title">Divisi</span>
												</a>
												<a href="<?= base_url('/role')?>" class="btn btn-hover-bg-primary btn-text-primary btn-hover-text-white border-0 font-weight-bold mr-2 me-3">
													<span class="menu-title">Role</span>
												</a> -->
												<?php } ?>

            <!--Script Halaman Register  -->
                                                <!-- <script>
			if($("#registerForm").length > 0){
				$("#registerForm").validate({
					rules: {
						nama: {
							required: true,
							minlength: 4,
							maxlength: 80,
						},
						email: {
							required: true,
							minlength: 4,
							maxlength: 80,
							email: true,
						},
						username: {
							required: true, 
							minlength: 4,
							maxlength: 50,
						},
                        password: {
							required: true, 
							minlength: 4,
							maxlength: 50,
						},
                        password_conf: {
							required: true, 
                            equalTo: "#password",
						},
					},
					messages: {
						nama: {
							required: "Nama harus diisi",
							minlength: "Panjang minimal 4 karakter",
							maxlength: "Panjang maksimal 80 karakter"
						},
						email: {
							required: "Email harus diisi",
							minlength: "Panjang minimal 4 karakter",
							maxlength: "Panjang maksimal 80 karakter",
							email: "Masukkan email yang valid",
						},
						username: {
							required: "Username harus diisi",
							minlength: "Panjang minimal 4 karakter",
							maxlength: "Panjang maksimal 50 karakter",
						},
                        password: {
							required: "Password harus diisi",
							minlength: "Panjang minimal 4 karakter",
							maxlength: "Panjang maksimal 50 karakter",
						},
                        password_conf: {
							required: "Konfirmasi password harus diisi",
							equalTo: "Konfirmasi password tidak sesuai dengan password"
						},
					},

					submitHandler: function(form){
						$('.response-message').removeClass('d-none');
						$.ajax({
							url: "",
							type: "POST",
							data: $('#registerForm').serialize(),
							dataType: "json",
							success: function(response){
							$('#submit-btn').html('Submit');
								$('.response-message').html(response?.message);
								response?.status === 'success' && $('.response-message').addClass('text-success') || $('.response-message').addClass('text-danger');
								$('.response-message').show();
								$('.response-message').removeClass('d-none');

								document.getElementById("registerForm").reset();
								setTimeout(function(){
									$('.response-message').hide();
								}, 5000);
							}
						});
						form.preventDefault();
					}
				})
			}
		</script> -->