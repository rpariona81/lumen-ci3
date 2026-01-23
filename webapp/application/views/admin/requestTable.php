<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">
    <!-- column -->
    <div class="col-12">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0 bg-secondary">
                <!-- <div class="d-sm-flex align-items-center"> -->
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12 align-self-center">
                        <div class="mb-3">
                            <h5 class="card-title text-dark">Solicitudes de nuevos usuarios</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <!--<table id="datatable" name="datatablesSimple" class="table display nowrap table-hover table-bordered mb-0 border-top text-sm" style="width:100%">-->
                    <table id="datatable" name="datatablesSimple" class="table table-striped nowrap dataTable no-footer dtr-inline" style="width:100%">
                        <thead>
                            <tr>
                                <th colspan="10" class="heading"></th>
                            </tr>
                            <tr class="table-primary">
                                <th>Usuario</th>
                                <th>Nombres y apellidos</th>
                                <th>Condición</th>
                                <th>Acciones</th>
                                <th>Última actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $item) : ?>
                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex flex-column">
                                            <strong class="text-gray-800 text-hover-primary mb-1"><?= $item->username ?></strong>
                                            <span><?= $item->email ?></span>
                                        </div>
                                    </td>
                                    <!-- <td></td> -->
                                    <td>
                                        <div class="d-flex flex-column">
                                            <strong class="text-hover-primary mb-1"><?= $item->firstname . ' ' . $item->lastname ?></strong>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        if ($item->enabled) {
                                            echo '<span class="badge bg-warning border text-white">No aceptado</span>';
                                        } else {
                                            echo '<span class="badge bg-danger border text-white">Nueva solicitud</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php
                                                echo form_open('admin/activaRequest');
                                                echo '<input type="hidden" id="username" name="username" value="' . $item->username . '">';
                                                echo '<button type="submit" id="showtoast" name="submit" class="btn btn-outline-primary btn-sm display-inline" data-bs-toggle="tooltip" data-bs-placement="left" title="Aceptar"><i class="fa fa-check"></i></button>';
                                                echo form_close();
                                                echo "&nbsp;";
                                                echo form_open('admin/desactivaRequest');
                                                echo '<input type="hidden" id="username" name="username" value="' . $item->username . '">';
                                                echo '<button type="submit" id="showtoast" name="submit" class="btn btn-outline-danger btn-sm display-inline" data-bs-toggle="tooltip" data-bs-placement="left" title="Rechazar"><i class="fa fa-times"></i></button>';
                                                echo form_close();
                                                
                                            ?>
                                        </div>
                                    </td>

                                    <td><?= $item->updated_at ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/plugins/pdfobject/jquery-3.7.1.min.js') ?>"></script>
<script>
    jQuery(document).ready(function() {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        <?php if ($this->session->flashdata('success')) { ?>
            //$('.toast').toast('show');
            toastr.info("<?= $this->session->flashdata('success') ?>");
            console.log("<?= $this->session->flashdata('success') ?>");
        <?php } else if ($this->session->flashdata('error')) {  ?>
            toastr.error("<?= $this->session->flashdata('error') ?>");
        <?php } else if ($this->session->flashdata('flashSuccess')) { ?>
            toastr.success("<?= $this->session->flashdata('flashSuccess') ?>");
        <?php } ?>
    });
</script>