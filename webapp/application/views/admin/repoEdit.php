<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">
    <!-- column -->
    <div class="col-12">
        <div class="card border shadow-xs mb-4">

            <div class="card-header border-bottom pb-0 bg-secondary">
                <h4 class="card-title">Información de repositorio seleccionado</h4>
            </div>
            <?= my_validation_errors(validation_errors()); ?>
            <div class="card-body">
                <?= form_open('admin/updaterepo', array('enctype' => 'multipart/form-data', 'id' => 'updateRepo')); ?>
                <input type="hidden" id="id" name="id" value="<?= $repo->id ?>">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <label for="repo_code">Código autogenerado (luego de actualizar)</label>
                        <input type="text" class="form-control" id="repo_title" name="repo_code" value="<?= $repo->repo_code ?>" disabled>

                    </div>
                    <div class="col-md-6">
                        <label for="repo_isbn">ISBN</label>
                        <input type="text" class="form-control" id="repo_isbn" name="repo_isbn" value="<?= $repo->repo_isbn ?>">

                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <label for="repo_title">Título</label>
                        <input type="text" class="form-control" id="repo_title" name="repo_title" value="<?= $repo->repo_title ?>">

                    </div>
                    <div class="col-md-6">
                        <label for="repo_display">Título a mostrar</label>
                        <input type="text" class="form-control" id="repo_display" name="repo_display" value="<?= $repo->repo_display ?>">

                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-4">
                        <label for="repo_author">Autor</label>
                        <input type="text" class="form-control" id="repo_author" name="repo_author" value="<?= ($repo->repo_author != NULL) ? $repo->repo_author : '' ?>">

                    </div>
                    <div class="col-md-4">
                        <label for="repo_editorial">Editorial</label>
                        <input type="text" class="form-control" id="repo_editorial" name="repo_editorial" value="<?= ($repo->repo_editorial != NULL) ? $repo->repo_editorial : '' ?>">

                    </div>
                    <div class="col-md-2">
                        <label for="repo_year">Año</label>
                        <input type="text" class="form-control" id="repo_year" name="repo_year" value="<?= ($repo->repo_year != NULL) ? $repo->repo_year : NULL ?>">

                    </div>
                    <div class="col-md-2">
                        <label for="repo_pages"># páginas</label>
                        <input type="text" class="form-control" id="repo_pages" name="repo_pages" value="<?= ($repo->repo_pages != NULL) ? $repo->repo_pages : '' ?>">

                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-md-12">
                        <label for="repo_tags">Etiquetas</label>
                        <textarea class="form-control" id="repo_tags" name="repo_tags"><?= ($repo->repo_tags != NULL) ? trim($repo->tags) : '' ?></textarea>
                    </div>
                </div>
                <br><br>
                <div class="row pt-3">
                    <br /><br />
                    <div class="col-md-4">

                        <label>Archivo actual</label>
                        <br>
                        <strong>Descarga:</strong>
                        <a class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="<?= ($repo->repo_file != NULL) ? $repo->repo_file : '' ?>" target="_blank"
                            download="<?= ($repo->repo_file != NULL) ? $repo->repo_file : '' ?>" href="<?= base_url('uploads/pdf/' . $repo->repo_file); ?>">
                            <i class="fa fa-file-pdf"></i>
                            <strong><?= $repo->repo_code ?></strong>
                        </a>

                    </div>
                    <div class="col-md-2">
                        <label>Actualizar archivo?</label>
                        <br>
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="checkFile" id="checkFile" value="1" />
                            <span class="form-check-label fw-bold text-gray-700 fs-6">Reemplazar</span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nuevo archivo</label>
                            <br>
                            <div class="custom-file">
                                <input type="file" class='file form-control' id="repo_file" name="repo_file" data-browse-on-zone-click='true' disabled />
                            </div>
                            <div id="alert-gral">
                                <!--<div class="alert">-->
                                <div id="alert-msg">
                                    <div id="alert-title">

                                    </div>
                                </div>
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>


                </div>
                <div class="row pt-3">
                    <?php if ($this->session->flashdata('flashSuccess')) : ?>
                        <p class='alert alert-success'> <?= $this->session->flashdata('flashSuccess') ?> </p>
                    <?php endif ?>
                    <?php if ($this->session->flashdata('flashError')) : ?>
                        <p class='alert alert-danger'> <?= $this->session->flashdata('flashError') ?> </p>
                    <?php endif ?>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6 mx-auto">
                        <div class="d-md-flex align-items-center">
                            <input class="btn btn-primary" type="submit" value="Actualizar datos" onclick="tinyMCE.triggerSave(true,true);"></input>
                            &nbsp;&nbsp;
                            <a class="btn btn-success" href="<?= base_url('admin/repository') ?>" type="button" value="Volver al listado">Volver al listado</a>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/plugins/pdfobject/jquery-3.7.1.min.js') ?>"></script>
<script>
    jQuery(document).ready(function() {
        $('#checkFile').on('change', function() {
            var selectCheck = $('input[name=checkFile]:checked', '#updateRepo').val();
            //alert(selectCheck);
            if (selectCheck !== null) {
                $('#repo_file').prop('disabled', false);
                $('#repo_file').prop('required', true);
            }
            if (selectCheck === undefined) {
                $('#repo_file').prop('disabled', true);
                $('#repo_file').prop('required', false);
            }
        });
    });
</script>

<script type="text/javascript">
    $('input[type="file"]').on('change', function() {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != '') {
            //if (ext != "pdf")
            //alert($(this).val()+'.....'+ext);
            //$(this).val('');
            if (ext == "pdf") {
                //alert("La extensión es: " + ext);
                if ($(this)[0].files[0].size > 687108864) {
                    console.log("El documento excede el tamaño máximo");
                    $('#alert-title').text('¡Precaución!');
                    $('#alert-msg').html("Se solicita un archivo no mayor a 20MB. Por favor verifica.");
                    $("#alert-gral").html();
                    $(this).val('');
                } else {
                    console.log("El documento esta permitido");
                    $('#alert-title').removeClass();
                    $("#alert-gral").hide();
                }
            } else {
                $(this).val('');
                //alert("Extensión no permitida: " + ext);
                $('#alert-title').addClass('text-danger');
                $('#alert-title').text("Extensión no permitida: " + ext);
            }
        }
    });
</script>