<div class="card-header border-bottom pt-2">
    <h3 class="fw-bolder me-5 my-1 pt-5">
        <p>Resultados: <?= $total_row ?></p>
    </h3>
    <div class="py-3 px-3 d-flex align-items-center">
        <?php if ($resultFlag) {
            echo $pagination;
        } ?>
    </div>
</div>
<div class="card-body">
    <div class="row gy-5 g-xl-8">
        <?php if ($resultFlag) { ?>
        <?php foreach ($records as $item) { ?>
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
                        <img class="mw-100 mh-300px card-rounded-bottom" alt="portada"
                            src="<?= $item->ebook_front_page ?? base_url('assets/media/books/portada_amarilla.png') ?>" />
                    </div>
                    <ul class="list-unstyled mt-0 mb-4">
                        <li>
                            <i class="fa fa-graduation-cap" style="height: 20px; width: 20px; text-align: center;"></i>
                            <span>&nbsp;<?= $item->ebook_title . ' [Cód. ' . str_pad($item->ebook_code, 6, '0', STR_PAD_LEFT) . ']'; ?></span>
                        </li>
                        <li>
                            <i class="fa fa-users" style="height: 20px; width: 20px; text-align: center;"></i>
                            <!-- <span>&nbsp;< ?= $item->catalog_name ?></span>-->
                             <?php
                                $catalog_names = explode(',', $item->ebook_tags);
                                //$catalog_names = array();
                                foreach ($catalog_names as $catalog) {
                                    echo "<span class='badge badge-primary'>".$catalog ."</span>&nbsp";
                                }
                                ?>
                        </li>
                    </ul>
                    <!-- <input type="hidden" id="book_id" name="book_id" value="<?= $item->id ?>"> -->

                    <button type="button" id="btn-show-ebook"
                        onclick="verLibro('<?= $item->ebook_display ?>','<?= $item->ebook_file ?>','<?= $item->id ?>')"
                        class="align-self-end btn btn-lg btn-block btn-danger" style="margin-top: auto;"
                        data-bs-toggle="modal" data-bs-target="#modal_ebook">
                        <strong>Ver libro</strong>
                    </button>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <h6 class="ml-5">
            <font color="red"><em>No hay resultados para su búsqueda, por favor intente con otro valor.</em></font>
        </h6>
        <?php } ?>
    </div>
</div>
<div class="border-top py-3 mb-5 px-3 d-flex align-items-center">
    <!--Tampilkan pagination-->
    <?php if ($resultFlag) {
        echo $pagination;
    } ?>
</div>


<script>
function verLibro(info, label, book_id) {
    console.log(info + '---' + label + "--" + book_id);
    let titulo = info;
    $('.modal-title').html(titulo);
    if (!(label == '')) {
        var url = "<?= base_url('uploads/pdf/') ?>" + label;
        var options = {
            fallbackLink: "<p>Este navegador no soporta PDFs en línea, puede descargar el libro desde <a href='" +
                url + "'>este enlace</a></p>"
        };

        PDFObject.embed("<?= base_url('uploads/pdf/') ?>" + label, "#my-pdf", options);
        /*jQuery.post("<?= base_url('appcontroller/addViewEbook/') ?>", {
            "book_id": book_id
        })*/
        $.post("<?= base_url('user/addview') ?>", {
                book_id: book_id
            },
            function(data, status) {
                console.log("Data: " + data + "\nStatus: " + status);
            });
    } else {
        $('#my-pdf').empty();
        $('#my-pdf').removeClass();
        $('#my-pdf').removeAttr();
        $('#info-breve').html('Libro no disponible.');
        $(this).removeData('bs.modal');
    }
}
</script>

<script>
// $(document).ready(function() {
//     $("#btn-show-ebook").click(function() {
//         var book_id = $("input[name='book_id']").val();
//         console.log('val :' + book_id); // do something
//         $.ajax({
//             url: "< ?= base_url('appcontroller/addViewEbook/') ?>",
//             type: "POST",
//             dataType: 'json',
//             data: {book_id: book_id},
//             success: function(data) {
//                 console.log('funciona ' + book_id); // do something
//             },
//             error: function(data) {
//                 console.log(book_id + ' error');
//             }
//         });
//         $("input[name='book_id']").val('');
//     });
// });
</script>


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
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-success">Agregar a favoritos</button> -->
            </div>
        </div>
    </div>
</div>