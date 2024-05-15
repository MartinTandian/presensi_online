<!--begin::Header-->
<div id="kt_header" class="header align-items-stretch">
	<!--begin::Container-->
	<div class="container-fluid d-flex align-items-stretch justify-content-between" id="atas">
		<!--begin::Aside mobile toggle-->
		<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
			<div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
				<!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
				<span class="svg-icon svg-icon-2x mt-1">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
							<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
						</g>
					</svg>
				</span>
				<!--end::Svg Icon-->
			</div>
		</div>
		<!--end::Aside mobile toggle-->
		<!--begin::Mobile logo-->
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="<?= base_url(); ?>" class="d-lg-none">
				<img alt="Logo" src="<?= base_url('/assets/img/inti.svg') ?>" class="h-30px" />
			</a>
		</div>
		<!--end::Mobile logo-->
		<!--begin::Wrapper-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
			<!--begin::Navbar-->
			<div class="d-flex align-items-stretch" id="kt_header_nav">
				<!--begin::Menu wrapper-->
				<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
					<!--begin::Menu-->
					<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
						<div class="menu-item me-lg-1">
						</div>
					</div>
					<!--end::Menu-->
				</div>
				<!--end::Menu wrapper-->
			</div>
			<!--end::Navbar-->
			<!--begin::Topbar-->
			<!--begin::Topbar-->
			<div class="d-flex align-items-stretch flex-shrink-0" id="menu_atas">
				<!--begin::Toolbar wrapper-->
				<div class="d-flex align-items-stretch flex-shrink-0">
					<!--begin::User-->
					<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
						<!--begin::Menu wrapper-->
						<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
							<img src="<?= base_url('/assets/img/user.png') ?>" alt="profil" />
						</div>
						<!--begin::Menu-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<div class="menu-content d-flex align-items-center px-3">
									<!--begin::Avatar-->
									<div class="symbol symbol-50px me-2">
										<img alt="Logo" src="<?= base_url('/assets/img/user.png') ?>" />
									</div>
									<!--end::Avatar-->
									<!--begin::Username-->
									<div class="d-flex flex-column">
										<div class="fw-bolder d-flex align-items-center fs-5"><?= session()->nama; ?></div>
										<div class="fw-bold text-muted text-hover-primary fs-7"><?= session()->email; ?></div>
										<?php if (session()->role == 2) { ?>
											<div class="fw-bold text-muted text-hover-primary fs-7"><?= session()->asal; ?></div>
										<?php } ?>
									</div>
									<!--end::Username-->
								</div>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu separator-->
							<div class="separator my-2"></div>
							<!--end::Menu separator-->
							<!--begin::Menu item-->
							<!-- <div class="menu-item px-5">
													<a href="#" class="menu-link px-3">My Profile</a>
												</div> -->
							<!--end::Menu item-->

							<!--begin::Menu separator-->

							<!--end::Menu separator-->

							<!--begin::Menu item-->
							<div class="menu-item px-5">
								<?php if (session()->role == 4) { ?>
									<a href="<?= site_url('/gantipass') ?>" class="menu-link px-3">Change Password</a>
								<?php } ?>
								<?php if (session()->role == 1 || session()->role == 2 || session()->role == 3) { ?>
									<a href="<?= site_url('/gantipassuser') ?>" class="menu-link px-3">Change Password</a>
								<?php } ?>
								<a href="<?= site_url('/logout') ?>" class="menu-link px-3">Sign Out</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu-->
						<!--end::Menu wrapper-->
					</div>
					<!--end::User -->
					<!--begin::Heaeder menu toggle-->

					<!--end::Heaeder menu toggle-->
				</div>
				<!--end::Toolbar wrapper-->
			</div>
			<!--end::Topbar-->
			<!--end::Topbar-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->