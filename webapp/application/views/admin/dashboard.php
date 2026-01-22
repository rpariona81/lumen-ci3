<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">
    <!--begin::Col-->
    <div class="col-xxl">
        <!--begin::Mixed Widget 2-->
        <div class="card card-xxl-stretch">
            <!--begin::Header-->
            <div class="card-header border-0 bg-danger py-5">
                <h3 class="card-title fw-bolder text-white">Panel de administración</h3>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0">

                <div class="card-p mb-5">
                    <!--begin::Row-->
                    <div class="row g-0">
                        <!--begin::Col-->
                        <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                <img width="48" height="48" src="<?= base_url() ?>/assets/media/icons/duotune/general/gen032.svg" alt="" />
                                <?= $cantUsers ?>
                            </span>
                            <a href="<?= base_url('admin') . '/users' ?>"
                                class="text-warning fw-bold fs-6">Usuarios activos</a>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                <img width="48" height="48" src="<?= base_url() ?>/assets/media/icons/duotune/finance/fin006.svg" alt="" />
                                <?= $cantBooks ?>
                            </span>
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <!--<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                        fill="black"></path>
                                    <path
                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                        fill="black"></path>
                                </svg>&nbsp;
                            </span>-->
                            <!--end::Svg Icon-->
                            <a href="<?= base_url('admin') . '/catalogo' ?>" class="text-primary fw-bold fs-6">Libros
                                disponibles</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-0">
                        <!--begin::Col-->
                        <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                <img width="48" height="48" src="<?= base_url() ?>/assets/media/icons/duotune/abstract/abs027.svg" alt="" />
                                <?= $cantCareers ?>
                            </span>
                            <a href="<?= base_url('admin') . '/programas' ?>"
                                class="text-danger fw-bold fs-6 mt-2">Programas de estudios</a>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col bg-light-success px-6 py-8 rounded-2">
                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                <img width="48" height="48" src="<?= base_url() ?>/assets/media/icons/duotune/communication/com010.svg" alt="" />
                                <?= getenv('CLIENT_EMAIL') ?? '' ?>
                            </span>
                            <a href="<?= base_url('admin') . '/info' ?>"
                                class="text-success fw-bold fs-6 mt-2">Información del Instituto</a>
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">

    <!--</div>-->
    <!---- ULTIMAS PUBLICACIONES --->
    <!--<div class="row">-->
    <div class="col-12 col-lg-12 col-xl-6 d-flex">
        <div class="card flex-fill w-100 mb-4">
            <div class="card-header bg-light">
                <h5 class="card-title text-dark">Últimos libros solicitados</h5>
            </div>
            <div class="card-body">
                <?php
                //print_r($offersjobsLast);
                if (empty($booksLast)) {
                    echo '<p>No hay libros recientemente vistos</p>';
                } else {
                }
                ?>
                <div class="container-fluid">
                    <?php foreach ($booksLast as $book) : ?>
                        <!--begin::Item-->
                        <div class="d-flex align-items-center mb-10 border-bottom pb-3 mb-3">
                            <!--begin::Icon-->
                            <i class="fas fa-book-open text-primary fs-1 me-5"></i>
                            <!--end::SymIconbol-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column">
                                <h5 class="text-gray-800 fw-bolder">[Cód.
                                    <?= str_pad($book->ebook_code, 6, '0', STR_PAD_LEFT) ?>
                                    ]</span>&nbsp;<?= $book->ebook_display . ' <br>' ?> </h5>
                                <!--begin::Section-->
                                <div class="fw-bold">
                                    <!--begin::Desc-->
                                    <span class="text-muted"><?= $book->catalog_display ?></span>
                                    <!--end::Desc-->
                                </div>
                                <div class="fw-bold">
                                    <!--begin::Desc-->
                                    <span class="text-dark"><?= $book->ebook_pages ?>&nbsp;páginas</span>
                                    <!--end::Desc-->
                                </div>
                                <div class="fw-bold">
                                    <!--begin::Desc-->
                                    <span class="text-dark">Editorial: &nbsp;<?= $book->ebook_editorial ?></span>
                                    <!--end::Desc-->
                                </div>
                                <div class="fw-bold">
                                    <!--begin::Desc-->
                                    <span class="text-dark">Autores: &nbsp;<?= $book->ebook_author ?></span>
                                    <!--end::Desc-->
                                </div>
                                <div class="fw-bold">
                                    <!--begin::Desc-->
                                    <span class="text-dark">Año: &nbsp;<?= $book->ebook_year ?></span>
                                    <!--end::Desc-->
                                </div>
                                <div class="fw-bold">
                                    <!--begin::Desc-->
                                    <span class="text-dark">Temas:
                                        &nbsp;<!-- ?= substr(strip_tags(htmlspecialchars_decode($book->client_ebook_tags ?? 'Sin información'), "<div><b><br>"), 0, 100) ?></span>-->
                                        <?php
                                        $client_ebook_tags = explode(',', $book->client_ebook_tags);
                                        //$catalog_names = array();
                                        foreach ($client_ebook_tags as $catalog) {
                                            echo "<span class='badge badge-primary'>" . $catalog . "</span>&nbsp";
                                        }
                                        ?>
                                        <!--end::Desc-->
                                </div>
                                <!--end::Section-->
                            </div>

                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>