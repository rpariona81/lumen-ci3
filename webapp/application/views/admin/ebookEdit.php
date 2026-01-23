<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">
    <!-- column -->
    <div class="col-12">
        <div class="card border shadow-xs mb-4">

            <div class="card-header border-bottom pb-0 bg-secondary">
                <h4 class="card-title">Libro</h4>
            </div>
            <?= my_validation_errors(validation_errors()); ?>
            <div class="card-body">
                <?= form_open('admin/updateebook', array('id' => 'updateebook')); ?>
                <input type="hidden" id="id" name="id" value="<?= $book->id ?>">
                <div class="row pt-3">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="ebook_code">Código</label>
                            <input type="text" class="form-control" id="ebook_code" name="ebook_code" value="<?= $book->ebook_code ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-md-6">
                        <label for="ebook_title">Título</label>
                        <input type="text" class="form-control" id="ebook_title" name="ebook_title" value="<?= $book->ebook_title ?>" disabled>

                    </div>
                    <div class="col-md-6">
                        <label for="ebook_display">Título a mostrar</label>
                        <input type="text" class="form-control" id="ebook_display" name="ebook_display" value="<?= $book->ebook_display ?>" disabled>

                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-md-4">
                        <label for="ebook_author">Autor</label>
                        <input type="text" class="form-control" id="ebook_author" name="ebook_author" value="<?= ($book->ebook_author != NULL) ? $book->ebook_author : '' ?>" disabled>

                    </div>
                    <div class="col-md-4">
                        <label for="ebook_editorial">Editorial</label>
                        <input type="text" class="form-control" id="ebook_editorial" name="ebook_editorial" value="<?= ($book->ebook_editorial != NULL) ? $book->ebook_editorial : '' ?>" disabled>

                    </div>
                    <div class="col-md-2">
                        <label for="ebook_year">Año</label>
                        <input type="text" class="form-control" id="ebook_year" name="ebook_year" value="<?= ($book->ebook_year != NULL) ? $book->ebook_year : '' ?>" disabled>

                    </div>
                    <div class="col-md-2">
                        <label for="ebook_pages"># páginas</label>
                        <input type="text" class="form-control" id="ebook_pages" name="ebook_pages" value="<?= ($book->ebook_pages != NULL) ? $book->ebook_pages : '' ?>" disabled>

                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12">
                        <label for="client_ebook_tags">Etiquetas (coloque las etiquetas separadas por comas)</label>
                        <textarea class="form-control" id="client_ebook_tags" name="client_ebook_tags"><?= ($book->client_ebook_tags != NULL) ? trim($book->client_ebook_tags) : '' ?></textarea>
                    </div>
                </div>
                <br><br>
                
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
                            <input class="btn btn-primary" type="submit" value="Actualizar etiquetas" onclick="tinyMCE.triggerSave(true,true);"></input>
                            &nbsp;&nbsp;
                            <a class="btn btn-success" href="<?= base_url('admin/catalogo') ?>" type="button" value="Volver al listado">Volver al listado</a>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/plugins/pdfobject/jquery-3.7.1.min.js') ?>"></script>
