<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!--begin::Row-->
<div class="row g-5 g-xl-8 mt-9">
    <!-- column -->
    <div class="col-12">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header bg-secondary border-0 pt-1">
                        <h2 class="card-title">Repositorio institucional</h2>
                        <!-- <div class="d-sm-flex align-items-center"> -->
                        <!--< ?= form_open('', array('id' => 'FRM_DATOS', 'class' => 'w-100 position-relative mb-3', 'onsubmit' => 'window.location.reload()')); ?>-->
                        <!--begin::Card title-->
                        <!--<div class="card-title mx-1">
                            <div class="card-title fs-3 fw-bolder">Catálogo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            <div class="d-flex align-items-center position-relative my-1">
                                <div class="input-group">
                                    < ?= form_dropdown('catalog_id', $catalogs, $selectValue, 'class="form-select form-select-solid fw-bolder" id="catalog_id" required'); ?>
                                    &nbsp;
                                    <button class="btn btn-light-primary me-1" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end" type="submit">
                                        < !--<i class="ti-search"></i>
                                        <i class="fa fa-search"></i>&nbsp;Filtrar
                                        < !--<i class="fa fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-toolbar">
                                < !--begin::Toolbar
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    &nbsp;
                                    <a class="btn btn-light-primary me-3"
                                        href="< ?= base_url('/admin/catalogo') ?>">Limpiar
                                        filtro</a>
                                </div>
                            </div>
                        </div>
                        < ?= form_close() ?>-->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <!--<table id="datatable" name="datatablesSimple" class="table display nowrap table-hover table-bordered mb-0 border-top text-sm" style="width:100%">-->
                            <table id="datatable" name="datatablesSimple"
                                class="table table-striped nowrap dataTable no-footer dtr-inline" style="width:100%">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="heading"></th>
                                    </tr>
                                    <tr class="table-primary">
                                        <th class="px-2">Código</th>
                                        <th>Título</th>
                                        <th># páginas</th>
                                        <th>Etiquetas</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $repo) : ?>
                                        <tr class="align-middle">
                                            <td class="align-middle px-2">
                                                <?= $repo->repo_code?? 'Disponible para editar'?></td>
                                            <td class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-50px overflow-hidden me-3">
                                                    <div class="symbol-label">
                                                        <img src="<?=base_url('assets/media/books/portada_amarilla.png')?>"
                                                            alt="Portada" class="w-100" />
                                                    </div>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::User details-->
                                                <div class="d-flex flex-column">
                                                    <strong
                                                        class="text-hover-primary mb-1"><?= $repo->repo_display ?></strong>
                                                    
                                                </div>
                                                <!--begin::User details-->
                                            </td>
                                            <!-- <td></td> -->
                                            <td class="align-middle px-2">
                                                <?= str_pad((int)$repo->repo_pages, 5, '0', STR_PAD_LEFT); ?></td>
                                            <td>
                                                <?php
                                                $catalog_names = explode(',', $repo->repo_tags);
                                                //$catalog_names = array();
                                                foreach ($catalog_names as $catalog) {
                                                    echo "<span class='badge badge-primary'>" . $catalog . "</span>&nbsp";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <?php
                                                    if ($repo->repo_available) {
                                                        echo '<a name="Detalle" href="' . base_url('/admin/viewrepo/' . $repo->id) . '" class="btn btn-primary btn-sm display-inline" data-bs-toggle="tooltip" data-bs-placement="left" title="Ver detalles"><i class="fa fa-eye"></i></button></a>';
                                                    }
                                                    ?>

                                                    <a class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Editar"
                                                        href="<?= base_url('/admin/repo/' . $repo->id) ?>"><i
                                                            class="fa fa-edit"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>