<!DOCTYPE html>
<html lang="en">

<head>
	<base href="">
	<meta charset="utf-8" />
	<title>Program Absensi PKL</title>
	<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
	<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular 11, VueJs, React, Laravel, admin themes, web design, figma, web development, ree admin themes, bootstrap admin, bootstrap dashboard" />
	<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="<?= base_url('/assets/img/inti.svg') ?>" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?= base_url('/assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('/assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('/assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />

	<style>
		@media print {

			.aside,
			.header,
			.btn,
			.symbol,
			.menu,
			.menu-item,
			a#debug-icon-link,
			.wrapper,
			.toolbar,
			.container-fluid,
			#filter_absen,
			#tombol_print,
			#menu_atas {
				display: none;
			}

		}
	</style>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:0px;--kt-toolbar-height-tablet-and-mobile:0px">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<?= $this->include("layout/sidebar.php"); ?>
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?= $this->include("layout/header.php"); ?>
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Toolbar-->
					<div class="toolbar" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
							<!--begin::Page title-->
							<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
								<!--begin::Title-->
								<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<!--begin::Description-->
									<small class="text-muted fs-7 fw-bold my-1 ms-1"></small>
									<!--end::Description-->
								</h1>
								<!--end::Title-->
							</div>
							<!--end::Page title-->
							<!--begin::Actions-->

							<!--end::Actions-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->
					<!--begin::Post-->
					<div class="post d-flex flex-column-fluid" id="kt_post" style="margin-top: -30px;">
						<!--begin::Container-->
						<div id="kt_content_container" class="container">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-8">
								<!--begin::Col-->
								<?= $this->renderSection("konten"); ?>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Post-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
					<!--begin::Container-->
					<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
						<!--begin::Copyright-->
						<div class="text-dark order-2 order-md-1">

						</div>
						<!--end::Copyright-->
						<!--begin::Menu-->
						<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
							<!-- <li class="menu-item">
									<a href="https://keenthemes.com/faqs" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li> -->
						</ul>
						<!--end::Menu-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->
	<!--end::Main-->
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->

	<script src="<?= base_url('/assets/plugins/global/plugins.bundle.js') ?>"></script>
	<script src="<?= base_url('/assets/js/scripts.bundle.js') ?>"></script>
	<script src="<?= base_url('/assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
	<script src="<?= base_url('assets/js/custom/authentication/password-reset/new-password.js') ?>"></script>

	<!--end::Global Javascript Bundle-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="<?= base_url('/assets/js/custom/widgets.js') ?>"></script>
	<script src="<?= base_url('/assets/js/custom/apps/chat/chat.js') ?>"></script>
	<script src="<?= base_url('/assets/js/custom/modals/create-app.js') ?>"></script>
	<script src="<?= base_url('/assets/js/custom/modals/upgrade-plan.js') ?>"></script>

	<script>
		$("#tb_absen").DataTable({
			"language": {
				"lengthMenu": "Show _MENU_",
			},
			"order": [
				[0, 'desc']
			],

			"dom": "<'row'" +
				"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"


		});
	</script>

	<script>
		$("#tb_absen2").DataTable({
			"language": {
				"lengthMenu": "Show _MENU_",
			},
			"dom": "<'row'" +
				"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"

			"searching": false
		});
	</script>

	<script>
		$("#tb_absen3").DataTable({
			"language": {
				"lengthMenu": "Show _MENU_",
			},
			"order": [
				[0, 'desc']
			],
			"dom": "<'row'" +
				"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"


		});
	</script>
	<script>
		$("#tb_absen4").DataTable({
			"language": {
				"lengthMenu": "Show _MENU_",
			},

			"dom": "<'row'" +
				"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"


		});
	</script>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				$("#success-alert").alert('close');
			}, 5000);
		});
	</script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>