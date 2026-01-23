<div class="align-items-md-stretch mt-5">
    <div class="card">
    <div class="card-header">
            <h4 class="card-title">Edición de programa de estudios</h4>
        </div>
        <?= my_validation_errors(validation_errors()); ?>
        <div class="card-body">
            <?= form_open('admin/updatePrograma', array('class' => 'row g-3 needs-validation')); ?>
            <input type="hidden" value="<?= $programa->id ?>" name="id" id="id">
            <div class="col-md-4">
                <label for="career_offered" class="form-label">Código del programa (opcional)</label>
                <input type="text" class="form-control" id="career_offered_code" name="career_offered_code" value="<?= $programa->career_offered_code ?>">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="career_offered" class="form-label">Nombre del programa (*)</label>
                <input type="text" class="form-control" id="career_offered" name="career_offered" value="<?= $programa->career_offered ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-12">
                <div class="float-end">
                    <a href="<?=base_url('/admin/programas')?>" class="btn btn-danger" type="button">Cancelar</a>
                    <input class="btn btn-primary" type="submit" value="Actualizar programa"></input>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
