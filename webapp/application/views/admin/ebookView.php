<style>
.pdfobject-container {
    width: 100%;
    height: 80vh;
    height: 60dvh;
    border: 1px solid #ccc;
}
</style>

<div class="row mt-9">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">

            <!--begin::Customer-->
            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="fw-bolder"><?= $book->ebook_display ?></h2>
                    </div>
                    <!--begin::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Description-->
                    <div class="text-gray-500 fw-bold fs-5 mb-5"><?= $book->ebook_editorial ?></div>
                    <!--end::Description-->
                    <div class="separator separator-dashed"></div>

                    <!--begin::Selected customer-->
                    <div class="d-flex align-items-center p-3 mb-2" id="book_view">
                        <!--begin::Avatar-->
                        <!--begin::Name-->
                        <!-- <embed src="< ?= base_url('uploads/pdf/' . $book->ebook_file) ?>" frameborder="0" width="100%"
                            height="600px"> -->

                        <!--end::Info-->
                    </div>
                    <!--end::Selected customer-->
                    <!--begin::Notice-->
                    <div
                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6">
                        <ul class="list-unstyled mt-0 mb-4">
                        <li>
                            <i class="fa fa-graduation-cap" style="height: 20px; width: 20px; text-align: center;"></i>
                            <span>&nbsp;<?= $book->ebook_title . ' [Cód. ' . str_pad($book->ebook_code, 6, '0', STR_PAD_LEFT) . ']'; ?></span>
                        </li>
                        <li>
                            <i class="fa fa-users" style="height: 20px; width: 20px; text-align: center;"></i>
                            <!-- <span>&nbsp;< ?= $item->catalog_name ?></span>-->
                             <?php
                                $catalog_names = explode(',', $book->ebook_tags);
                                //$catalog_names = array();
                                foreach ($catalog_names as $catalog) {
                                    echo "<span class='badge badge-primary'>".$catalog ."</span>&nbsp";
                                }
                                ?>
                        </li>
                    </ul>
                        <!--begin::Wrapper-- >
                        <div class="d-flex flex-stack flex-grow-1">
                            < !--begin::Content-- >
                            <div class="fw-bold">
                                < ?= html_entity_decode($book->ebook_details??'Sin información') ?>
                            </div>
                            < !--end::Content-- >
                        </div>
                        < !--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Customer-->

        </div>
        <!--end::Content-->
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
            <!--begin::Card-->
            <div class="card card-flush pt-3 mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary"
                data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}"
                data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false"
                data-kt-sticky-zindex="95">
                <!--begin::Card header-->
                <!--<div class="card-header">
                    < !--begin::Card title-- >
                    <div class="card-title">
                        <h2>< ?= $book->client_ebook_tags ?></h2>
                    </div>
                    < !--end::Card title-- >
                </div>-->
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 fs-6">

                    <!--begin::Seperator-->
                    <div class="separator separator-dashed mb-7"></div>
                    <!--end::Seperator-->
                    <!--begin::Section-->
                    <div class="mb-7">
                        <!--begin::Title-->
                        <?php if ($book->ebook_author != NULL) {
                            echo '<h5 class="mb-3"> Autor: ' . $book->ebook_author . '</h5>';
                        } else {
                        }
                        ?>
                        <!--end::Title-->
                        <!--begin::Details-->
                        <div class="mb-0">
                            <!--begin::Plan-->

                            <?php if ($book->ebook_year != NULL) {
                                echo '<span class="badge badge-light-info me-2">Año ' . $book->ebook_year . '</span>';
                            } else {
                            }
                            ?>
                            <!--end::Plan-->

                            <?php if ($book->ebook_pages != NULL) {
                                echo '<span class="badge badge-light-success">' . $book->ebook_pages . ' págs.';
                            } else {
                            }
                            ?>
                        </div>
                        <!--end::Details-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Seperator-->
                    <div class="separator separator-dashed mb-7"></div>
                    <!--end::Seperator-->
                    <!--begin::Actions-->
                    <div class="mb-0">
                        <a href="<?= base_url('admin/catalogo') ?>"
                            class="btn btn-primary btn-active-light-primary w-100">Volver al listado</a>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
    </div>
    <!--end::Layout-->
</div>
<script src="<?= base_url('assets/plugins/pdfobject/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfobject/pdfobject.min.js') ?>"></script>

<script>
var url = "<?= $book->ebook_url ?>";
var options = {
    fallbackLink: "<p>Este navegador no soporta PDFs en línea, puede descargar el libro desde <a href='" + url +
        "'>este enlace</a></p>"
};
PDFObject.embed("<?= $book->ebook_url ?>", "#book_view", options);
</script>