<div class="align-items-md-stretch mt-5">
    <div class="card">
        <div class="card-header bg-light">
            <h4 class="card-title text-dark">Actualización de usuario:&nbsp;<?= $usuario->username ?></h4>
        </div>
        <?= my_validation_errors(validation_errors()); ?>
        <div class="card-body">
            <?php
            $username = array(
                'name' => 'username',
                'class' => 'form-control m-top-10',
                'type' => 'hidden',
                'id' => 'username',
                'value' => $usuario->username
            );

            $firstname = array(
                'name' => 'firstname',
                'class' => 'form-control m-top-10',
                'type' => 'text',
                'id' => 'firstname',
                'value' => $usuario->firstname,
                'placeholder' => 'Nombres',
            );

            $lastname = array(
                'name' => 'lastname',
                'class' => 'form-control m-top-10',
                'type' => 'text',
                'id' => 'lastname',
                'value' => $usuario->lastname,
                'placeholder' => 'Apellidos',
            );

            $email = array(
                'name' => 'email',
                'class' => 'form-control m-top-10',
                'type' => 'email',
                'id' => 'email',
                'value' => $usuario->email,
                'placeholder' => 'Email'
            );

            $pword = array(
                'name' => 'password',
                'class' => 'form-control m-top-10',
                'type' => 'password',
                'id' => 'txtPassword',
                'value' => base64_decode($usuario->remember_token)
            );

            $change_user = array(
                'name' => 'change_user',
                'class' => 'btn btn-primary m-top-10',
                'value' => 'Actualizar datos',
                'id' => 'change_user',
                'type' => 'submit'
            );

            echo form_open('admin/user/update', array('class' => 'needs-validation')); ?>
            <div class="row col-lg-6 col-md-8 col-xs-12">
                <div class="fv-row mb-5">
                    <label for="firstname">Nombres</label>
                    <?php echo form_input($username); ?>
                    <?php echo form_input($firstname);
                    echo '<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">' . form_error('firstname') . '</div>'; ?>
                </div>
                <div class="fv-row mb-5">
                    <label for="lastname">Apellidos</label>
                    <?php echo form_input($lastname);
                    echo '<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">' . form_error('lastname') . '</div>'; ?>
                </div>
                <div class="fv-row mb-5">
                    <label for="email">Correo electrónico</label>
                    <?php echo form_input($email);
                    echo '<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">' . form_error('email') . '</div>'; ?>
                </div>
                <div class="fv-row mb-5">
                    <label for="password">Contraseña</label>
                    <div class="input-group has-validation">
                        <?php echo form_input($pword); ?>
                        <button id="show_password" class="btn btn-secondary mb-0" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                        <?php echo '<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">' . form_error('password') . '</div>'; ?>
                    </div>
                </div>
                <div class="row pt-3">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <p class='alert alert-success'> <?= $this->session->flashdata('success') ?> </p>
                    <?php endif ?>
                </div>
                <div class="row pt-3">
                    <div class="col-md-4 mx-auto">
                        <div class="d-grid mb-10">
                            <!--end::Wrapper-->
                            <?php echo form_submit($change_user); ?>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
                <hr />
                <p class="mt-9 fs-6">
                    <muted>Usuario desde <?= $usuario->created_at->diffForHumans() ?></muted><br />
                    <muted>Último acceso: <?= isset($usuario->last_login_at) ? $usuario->last_login_at : 'Aún no accede al sistema.' ?></muted>
                </p>

            </div>
        </div>
    </div>
    <!--https://www.baulphp.com/3-formas-para-mostrar-y-ocultar-contrasenas/-->
    <script>
        function mostrarPassword() {
            var cambio = document.getElementById("txtPassword");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>

    <script>
        //$(document).ready(function() {
            $("#firstname").keydown(function(e) {
                if (e.keyCode === 13 || e.keyCode === 193)
                    document.getElementById('firstname').focus();
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.keyCode >= 48 && e.keyCode <= 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

            $("#lastname").keydown(function(e) {
                if (e.keyCode === 13 || e.keyCode === 193)
                    document.getElementById('lastname').focus();
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.keyCode >= 48 && e.keyCode <= 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

        //});
    </script>