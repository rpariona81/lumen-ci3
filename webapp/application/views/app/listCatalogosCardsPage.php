<style>
    .pdfobject-container {
        width: 100%;
        height: 80vh;
        height: 60dvh;
        border: 1px solid #ccc;
    }
</style>

<!--begin::Card-->
<div class="card mb-7">
    <?= form_open('', array('id' => 'FRM_DATOS', 'class' => 'form-horizontal card-toolbar', 'onsubmit' => 'window.location.reload()')); ?>
    <!--< ?= form_open('', array('id' => 'FRM_DATOS', 'class' => 'form-horizontal card-toolbar', 'onsubmit' => "window.location.href = '/user/catalog'; return true;")) ?>-->
    <!--http://localhost:4000/user/catalog-->
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Compact form-->
        <div class="d-flex align-items-center">
            <!--begin::Input group-->
            <div class="position-relative w-md-400px me-md-2">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                    </svg>
                </span>
                <?= form_input(array('name' => 'search', 'value' => '', 'placeholder' => 'Buscar...', 'class' => 'form-control form-control-solid ps-10', 'id' => 'search', 'data-kt-search-element' => 'input')); ?>
            </div>
            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary me-5">Buscar</button>
            </div>
        </div>

    </div>
    <?= form_close() ?>
    <div class="border-top py-3 px-3 d-flex align-items-center">
        <?php echo $pagination; ?>
    </div>
</div>

<div class="row mb-5">
    <div class="g-5 gx-xxl-8">
        <div class="card card-xxl-stretch">
            <div class="card-header border-bottom pt-2">
                <h3 class="fw-bolder me-5 my-1 pt-5">
                    <p>Resultados: <?= $total_row ?></p>
                </h3>
            </div>
            <div class="card-body">
                <div class="row gy-5 g-xl-8">
                    <?php foreach ($records as $item) : ?>
                        <div class="col-md-6 col-xxl-4">
                            <div class="card card-stretch card-bordered mb-5 shadow-sm">
                                <div class="card-header border-0 py-5">
                                    <h2 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-2">
                                            <font color="blue"><?= $item->ebook_display ?></font>
                                        </span>
                                    </h2>
                                </div>
                                <div class="card-body d-flex flex-column text-sm">
                                    <div class="text-center px-4 mb-3">
                                        <img class="mw-100 mh-300px card-rounded-bottom" alt="portada" src="<?= $item->ebook_front_page ?? base_url('assets/media/books/portada_amarilla.png') ?>" />
                                    </div>
                                    <ul class="list-unstyled mt-0 mb-4">
                                        <li>
                                            <i class="fa fa-graduation-cap" style="height: 20px; width: 20px; text-align: center;"></i>
                                            <span>&nbsp;<?= $item->ebook_title . ' [Cód. ' . str_pad($item->ebook_code, 6, '0', STR_PAD_LEFT) . ']'; ?></span>
                                        </li>
                                        <li>
                                            <i class="fa fa-users" style="height: 20px; width: 20px; text-align: center;"></i>
                                            <span>&nbsp;<?= $item->catalog_name ?></span>
                                        </li>
                                    </ul>
                                    <button type="button" id="btn-show-ebook"
                                        onclick="verLibro('<?= $item->ebook_display ?>','<?= $item->ebook_file ?>')"
                                        class="align-self-end btn btn-lg btn-block btn-danger" style="margin-top: auto;"
                                        data-bs-toggle="modal" data-bs-target="#modal_ebook">
                                        <strong>Ver libro</strong>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="border-top py-3 mb-5 px-3 d-flex align-items-center">
                <!--Tampilkan pagination-->
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/plugins/pdfobject/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfobject/pdfobject.min.js') ?>"></script>

<script>
    function verLibro(info, label) {
        console.log(info + '---' + label);
        let titulo = info;
        $('.modal-title').html(titulo);
        if (!(label == '')) {
            PDFObject.embed("<?= base_url('uploads/pdf/') ?>" + label, "#my-pdf");
        } else {
            $('#my-pdf').empty();
            $('#my-pdf').removeClass();
            $('#my-pdf').removeAttr();
            $('#info-breve').html('Libro no disponible.');
            $(this).removeData('bs.modal');
        }
    }
</script>

<!-- <script>
    jQuery(document).ready(function($) {
        $("#btn-show-ebook").click(function() {
            let info = $(this).data('info');
            let info_breve = $(this).data('info-breve');
            let title = $(this).data('title');
            $('.modal-title').html(title);
            $('#info-breve').html(info_breve);
            PDFObject.embed("< ?  = base_url('uploads/pdf/') ?>" + info, "#my-pdf");
            //console.log(info);
        });
    });
    $(function() {
        // when the modal is closed
        $('#modal_ebook').on('hidden.bs.modal', function() {
            // remove the bs.modal data attribute from it
            $(this).removeData('bs.modal');
            // and empty the modal-content element
            $('#modal_ebook .modal-title').empty();
            $('#info-breve').empty();
            $('#my-pdf').empty();
        });
    });
</script> -->

<div class="modal fade" tabindex="-1" id="modal_ebook" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <!--<div class="modal-dialog">-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="info-breve">Libro disponible.</div>
                <div id="my-pdf"></div>
                <!-- <embed src="sample.pdf" frameborder="0" width="100%" height="400px"> -->
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>