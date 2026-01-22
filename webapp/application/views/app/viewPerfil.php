<div class="align-items-md-stretch mt-2 mb-4">
    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <h4 class="card-title">
                <muted>Usuario: <?= $perfil->username ?></muted>
            </h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home" type="button" role="tab"
                        aria-controls="home" aria-selected="true">
                        Información de usuario
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#profile" type="button" role="tab"
                        aria-controls="profile" aria-selected="false">
                        Cambio de contraseña
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel"
                    aria-labelledby="home-tab">
                    <!--< ?= my_validation_errors(validation_errors()); ?>-->
                    <div class="card-body">
                        <?php
                        $firstname = array(
                            'name' => 'firstname',
                            'class' => 'form-control m-top-10',
                            'type' => 'text',
                            'id' => 'firstname',
                            'value' => $perfil->firstname,
                            'placeholder' => 'Nombres',
                        );

                        $lastname = array(
                            'name' => 'lastname',
                            'class' => 'form-control m-top-10',
                            'type' => 'text',
                            'id' => 'lastname',
                            'value' => $perfil->lastname,
                            'placeholder' => 'Apellidos',
                        );

                        $email = array(
                            'name' => 'email',
                            'class' => 'form-control m-top-10',
                            'type' => 'email',
                            'id' => 'email',
                            'value' => $perfil->email,
                            'placeholder' => 'Email',
                            'disabled' => true
                        );

                        $change_profile = array(
                            'name' => 'change_profile',
                            'class' => 'btn btn-primary m-top-10',
                            'value' => 'Actualizar datos',
                            'id' => 'change_profile',
                            'type' => 'submit'
                        );

                        echo form_open('user/updateProfile', array('class' => 'needs-validation')); ?>
                        <div class="row col-lg-4 col-md-6 col-xs-12">
                            <div class="fv-row mb-5">
                                <label for="firstname">Nombres</label>
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
                        </div>
                        <hr />
                        <p class="mt-9 fs-6">
                            <muted>Usuario desde <?= $perfil->created_at->diffForHumans() ?></muted><br />
                            <muted>Último acceso <?= $perfil->last_login_at ?></muted>
                        </p>
                        <div class="row pt-3">
                            <?php if ($this->session->flashdata('flashSuccess')) : ?>
                                <p class='alert alert-success'> <?= $this->session->flashdata('flashSuccess') ?> </p>
                            <?php endif ?>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3 mx-auto">
                                <div class="d-grid mb-10">
                                    <!--end::Wrapper-->
                                    <?php echo form_submit($change_profile); ?>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <!-- < ?= my_validation_errors(validation_errors()); ?>-->
                    <div class="card-body">
                        <h5>
                            Puede actualizar su contraseña en esta sección.
                        </h5></br>
                        <?php
                        $clave_act = array(
                            'name' => 'clave_act',
                            'class' => 'form-control m-top-10',
                            'type' => 'password',
                            'id' => 'clave_act',
                            'placeholder' => 'Contraseña actual',
                        );

                        $clave_new = array(
                            'name' => 'clave_new',
                            'class' => 'form-control m-top-10',
                            'type' => 'password',
                            'id' => 'clave_new',
                            'placeholder' => 'Nueva contraseña',
                        );

                        $clave_rep = array(
                            'name' => 'clave_rep',
                            'class' => 'form-control m-top-10',
                            'type' => 'password',
                            'id' => 'clave_rep',
                            'placeholder' => 'Repita nueva contraseña',
                        );

                        $change_password = array(
                            'name' => 'change_password',
                            'class' => 'btn btn-primary m-top-10',
                            'value' => 'Cambiar contraseña',
                            'id' => 'change_password'
                        );
                        echo form_open('user/updatePassword', array('class' => 'needs-validation')); ?> 
                        <div class="row col-lg-4 col-md-6 col-xs-12">
                            <div class="fv-row mb-5">
                                <?php echo form_input($clave_act);
                                echo '<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">' . form_error('clave_act') . '</div>'; ?>
                            </div>
                            <div class="fv-row mb-5">
                                <?php echo form_input($clave_new);
                                echo '<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">' . form_error('clave_new') . '</div>'; ?>
                            </div>
                            <div class="fv-row mb-5">
                                <?php echo form_input($clave_rep);
                                echo '<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">' . form_error('clave_rep') . '</div>'; ?>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <?php if ($this->session->flashdata('flashSuccess')) : ?>
                                <p class='alert alert-success'> <?= $this->session->flashdata('flashSuccess') ?> </p>
                            <?php endif ?>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3 mx-auto">
                                <div class="d-grid mb-10">
                                    <!--end::Wrapper-->
                                    <?php echo form_submit($change_password); ?>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>