<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: MetronicProduct Version: 8.2.7
Purchase: https://1.envato.market/Vm7VRE
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <title>Recursos bibliográficos</title>
    <meta charset="utf-8" />
    <meta name="description" content="Recursos bibliográficos para educación superior" />
    <meta name="keywords" content="Recursos bibliográficos, Educación superior" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="es_ES" />
    <link rel="shortcut icon" href="<?=base_url('assets/media/logos/favicon.ico')?>" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?=base_url('assets/plugins/global/plugins.bundle.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/style.bundle.css')?>" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
    h2 {
        text-shadow: 2px 0 #555, -2px 0 #555, 0 2px #555, 0 -2px #555,
            1px 1px #fff, -1px -1px #fff, 1px -1px #fff, -1px 1px #fff;
    }
    </style>

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank bg-white">

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">

        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">

                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <!--<div class="w-lg-500px p-10">-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <div class="col-12 text-center">
                            <img alt="Logo"
                                src="<?php echo (ENVIRONMENT === 'development') ?  base_url('assets/media/logos/escudo.jpeg')  : getenv('APP_LOGIN') ?>"
                                class="h-90px h-lg-120px" />
                        </div>
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator--><br>
                        <?php
                        $username = array(
                            'name' => 'username',
                            'class' => 'form-control m-top-10',
                            'type' => 'text',
                            'id' => 'username',
                            'autocomplete' => 'off',
                            'placeholder' => 'Usuario',
                        );

                        $password = array(
                            'name' => 'password',
                            'class' => 'form-control m-top-10',
                            'type' => 'password',
                            'id' => 'password',
                            'autocomplete' => 'off',
                            'placeholder' => 'Contraseña',
                        );

                        $login_submit = array(
                            'name' => 'login_submit',
                            'class' => 'btn btn-primary m-top-10',
                            'value' => 'Ingresar',
                            'id' => 'kt_sign_in_submit'
                        );

                        echo form_open('logon', array('class' => 'form w-100', 'id' => 'kt_sign_in_form')); ?>
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-gray-900 fw-bolder mb-3">
                                Iniciar sesión
                            </h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->

                        <div class="fv-row mb-8">
                            <?php echo form_input($username);
                            echo '<div class="error">' . form_error('login_email') . '</div>'; ?>
                        </div>
                        <div class="fv-row mb-3">
                            <?php echo form_input($password);
                            echo '<div class="error">' . form_error('login_password') . '</div>'; ?>
                        </div>
                        <p><?= my_error($this->session->flashdata('error')) ?></p>
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <!--begin::Link-->
                            <a href="#" class="link-primary">
                                Olvidó su contraseña?
                            </a>
                            <!--end::Link-->
                        </div>
                        <div class="d-grid mb-10">
                            <!--end::Wrapper-->
                            <?php echo form_submit($login_submit); ?>
                        </div>
                        <?php echo form_close();
                        ?>
                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            No tiene cuenta?

                            <a href="#" class="link-primary">
                                Regístrese
                            </a>
                        </div>
                        <!--end::Sign up-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

                <!--begin::Footer-->
                <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
                    <div></div>

                    <!--begin::Links-->
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a href="#" target="_blank">Términos y condiciones</a>

                        <a href="#" target="_blank">Contáctanos</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->

            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2 opacity-75"
                style="background-image: url('<?=base_url("assets/media/books/library-488690_1280.jpg")?>')">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <!--<a href="#" class="mb-0 mb-lg-12">-->
                    <!--<img alt="Logo" src="< ?=base_url('assets/media/logos/logo-2.svg')?>" class="h-60px h-lg-75px" />-->

                    <!--</a>-->
                    <!--end::Logo-->

                    <!--begin::Image-->
                    <!--<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                        src="< ?=base_url('assets/media/misc/auth-screens.png')?>" alt="" />-->
                    <!--end::Image-->

                    <!--begin::Title-->
                    <h2 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7 shadow">
                        Bienvenido a nuestra<br>
                        Biblioteca Virtual Institucional
                    </h2>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <!-- <div class="d-none d-lg-block text-white fs-base text-center">
                In this kind of post, <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a> 

                introduces a person they’ve interviewed <br/> and provides some background information about 
                
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a> 
                and their <br/> work following this is a transcript of the interview.  
            </div> -->
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->



    </div>
    <!--end::Root-->

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?=base_url('assets/plugins/global/plugins.bundle.js')?>"></script>
    <script src="<?=base_url('assets/js/scripts.bundle.js')?>"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Custom Javascript(used for this page only)-->
    <!--<script src="<?=base_url('assets/js/custom/authentication/sign-in/general.js')?>"></script>-->
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>