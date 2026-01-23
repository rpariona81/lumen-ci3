<!DOCTYPE html>
<html lang="es">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title><?= getenv('APP_NAME') ?></title>
    <meta name="description" content="Servicios al estudiante." />
    <meta name="keywords" content="bolsa laboral, Biblioteca virtual, Portales web" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?= base_url() ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!-- Datatables css -->
    <link href="<?= base_url() ?>assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
    <script src="<?= base_url() ?>assets/plugins/tinymce/tinymce.min.js"></script>
    <script>
        /*tinymce.init({
        selector: '#detail'
      });*/
        tinymce
            .init({
                selector: 'textarea#ebook_details',
                plugins: "textcolor, lists code",
                toolbar: " undo redo | bold italic | alignleft aligncenter alignright alignjustify \n\
		              | bullist numlist outdent indent | forecolor backcolor table code"
            });
    </script>


</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid"></div>

        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
            data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
            data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
            data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            <!--begin::Brand-->
            <div class="aside-logo bg-light flex-column-auto" id="kt_aside_logo">
                <!--begin::Logo-->
                <a href="<?= base_url($this->session->userdata('User_guard')) ?>">
                    <!--<img alt="Logo" src="< ?= base_url() ?>assets/media/logos/logo-1-dark.svg" class="h-15px logo" />-->
                    <img alt="Logo"
                        src="<?php echo (ENVIRONMENT === 'development') ?  'assets/media/logos/escudo.jpeg'  : base_url() . getenv('APP_LOGO') ?>"
                        class="h-40px logo" />
                </a>
                <!--end::Logo-->
                <!--begin::Aside toggler-->
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                    data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                    data-kt-toggle-name="aside-minimize">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
                    <span class="svg-icon svg-icon-1 rotate-180">
                        <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/arrows/arr024.svg" alt="" />
                        <!--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                    fill="#000000" fill-rule="nonzero"
                                    transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                <path
                                    d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.5"
                                    transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                            </g>
                        </svg>-->
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside toggler-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside menu-->
            <div class="aside-menu flex-column-fluid">
                <!--begin::Aside Menu-->
                <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                    data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                    <!--begin::Menu-->
                    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                        id="#kt_aside_menu" data-kt-menu="true">
                        <div class="menu-item">
                            <a class="menu-link" href="<?= base_url('admin') ?>">
                                <span class="menu-icon">
                                    <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/general/gen001.svg" alt="" />
                                </span>
                                <span class="menu-title">Inicio</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-title text-muted text-uppercase fs-8 ls-1">Menú principal</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="<?= base_url('admin') . '/users' ?>">
                                <span class="menu-icon">
                                    <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/general/gen049.svg" alt="" />
                                </span>
                                <span class="menu-title">Usuarios</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="<?= base_url('admin') . '/requests' ?>">
                                <span class="menu-icon">
                                    <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/art/art002.svg" alt="" />
                                </span>
                                <span class="menu-title">Solicitudes</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="<?= base_url('admin') . '/catalogo' ?>">
                                <span class="menu-icon">
                                    <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/general/gen010.svg" alt="" />
                                </span>
                                <span class="menu-title">Catálogo</span>
                            </a>

                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="<?= base_url('admin') . '/repository' ?>">
                                <span class="menu-icon">
                                    <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/general/gen055.svg" alt="" />
                                </span>
                                <span class="menu-title">Repositorio</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-title text-muted text-uppercase fs-8 ls-1">Ajustes</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="<?= base_url('admin') . '/programas' ?>">
                                <span class="menu-icon">
                                    <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/general/gen011.svg" alt="" />
                                </span>
                                <span class="menu-title">Programas de estudios</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="<?= base_url('admin') . '/info' ?>">
                                <span class="menu-icon">
                                    <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/general/gen039.svg" alt="" />
                                </span>
                                <span class="menu-title">Información del instituto</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <div class="menu-content">
                                <div class="separator mx-1 my-4"></div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <img class="w-20px h-20px" src="<?= base_url() ?>/assets/media/icons/duotune/general/gen051.svg" alt="" />
                                </span>
                                <span class="menu-title">Versión v1.4</span>
                            </span>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Aside menu-->
            <!--begin::Footer-->
            <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
                <a href="/logout" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip"
                    data-bs-trigger="hover" data-bs-delay-show="8000"
                    title="Check out the complete documentation with over 100 components">
                    <span class="btn-label">Cerrar sesión</span>
                    <!--begin::Svg Icon | path: icons/duotone/General/Clipboard.svg-->
                    <span class="svg-icon btn-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                    fill="#000000" opacity="0.3" />
                                <path
                                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                    fill="#000000" />
                                <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" style="" class="header align-items-stretch">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Aside mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                        <div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                            <span class="svg-icon svg-icon-2x mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                                        <path
                                            d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Aside mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="index.html" class="d-lg-none">
                            <!--<img alt="Logo" src="<?= base_url() ?>assets/media/logos/logo-3.svg" class="h-30px" />-->
                            <img alt="Logo"
                                src="<?php echo (ENVIRONMENT === 'development') ?  'assets/media/logos/escudo.jpeg'  : base_url() . getenv('APP_LOGO') ?>"
                                class="h-30px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                        <!--begin::Navbar-->
                        <div class="d-flex align-items-stretch" id="kt_header_nav">
                            <!--begin::Menu wrapper-->
                            <div class="header-menu align-items-stretch" data-kt-drawer="true"
                                data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                                data-kt-place="true" data-kt-place-mode="prepend"
                                data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                <!--begin::Menu-->
                                <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                                    id="#kt_header_menu" data-kt-menu="true">
                                    <div class="menu-item me-lg-1">
                                        <a class="menu-link py-3"
                                            href="<?= base_url($this->session->userdata('user_rol')) ?>">
                                            <span class="menu-title">Inicio</span>
                                        </a>
                                    </div>

                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::Navbar-->
                        <!--begin::Topbar-->
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex align-items-stretch flex-shrink-0">

                                <!--begin::User-->
                                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">

                                        <a href="#"
                                            class="fw-bolder text-hover-primary fs-6"><?= $this->session->userdata('Role') ?></a>
                                        <img src="<?= base_url() ?>assets/media/avatars/blank.png" alt="metronic" />
                                    </div>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    <img alt="Logo"
                                                        src="<?= base_url() ?>assets/media/avatars/blank.png" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                                        <?= $this->session->userdata('user_name') ?>

                                                    </div>
                                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-6">Mi
                                                        perfil</a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="/logout" class="menu-link px-5 fs-6">Cerrar sesión</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::User -->

                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid mt-10" id="kt_content">



                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <?php $this->load->view($content); ?>
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
                        <!-- <span class="text-muted fw-bold me-1">2021©</span>
                        <a href="" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a> -->
                        <img alt="LogoEmpresa" src="/assets/property/logoEmpresa.png" class="h-48px h-lg-60px" />
                    </div>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <!-- <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                        <li class="menu-item">
                            <a href="https://keenthemes.com/faqs" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                        </li>
                    </ul> -->
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


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="<?= base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/apps/chat/chat.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/modals/create-app.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/modals/upgrade-plan.js"></script>
    <!--end::Page Custom Javascript-->

    <!-- Datatables js -->
    <script src="<?= base_url() ?>assets/js/vendor/responsive.bootstrap5.min.js"></script>

    <script src="<?= base_url() ?>assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/dataTables.checkboxes.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/dataTables.keyTable.min.js"></script>

    <script src="<?= base_url() ?>assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/buttons.colVis.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/jszip.min.js"></script>


    <script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

    <script>
        //document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        // https://datatables.net/reference/button/excelHtml5

        //https://www.youtube.com/watch?v=j59H9xnyCBs
        $(document).ready(function() {
            /**https://datatables.net/forums/discussion/43723/how-can-i-remove-default-button-class-of-datatable-btn-default */
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-md btn-primary border-0';
            var mytable = $("#datatable").DataTable({
                deferRender: true,
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                //scrollH: true,
                //scrollX: true,
                order: [],
                //stateSave: true,
                language: {
                    url: '<?= base_url('assets/plugins/i18n/es-ES.json') ?>',
                    paginate: {
                        previous: "<<",
                        next: ">>",
                        first: "<",
                        last: ">"
                    },
                }
            });

            new $.fn.dataTable.Buttons(mytable, {
                buttons: [
                    'copy',
                    {
                        extend: 'pdf',
                        orientation: 'landscape'
                    }, 'print',
                    {
                        extend: 'excel',
                        text: 'Excel',
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            //Para ver los estilos de formato https://datatables.net/reference/button/excelHtml5
                            $('row c[r^="A"]', sheet).attr('n', '7');
                            $('row c[r^="B"]', sheet).attr('s', '57');
                            //Para que la columna se muestre como texto https://datatables.net/forums/discussion/73814/export-to-excel-with-format-text-for-column-b-c-and-d
                            $('row c[r^="C"]', sheet).attr('s', '50');
                        }
                    }
                ]
            });

            mytable.buttons().container().appendTo($('tr th.heading', mytable.table().container()));

        });
    </script>


</body>
<!--end::Body-->

</html>