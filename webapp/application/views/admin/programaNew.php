<div class="align-items-md-stretch mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Nuevo programa de estudios</h4>
        </div>
        <?= my_validation_errors(validation_errors()); ?>
        <div class="card-body">
            <?= form_open('admin/createProgram', array('class' => 'row g-3 needs-validation')); ?>

            <div class="col-md-4">
                <label for="career_offered_code" class="form-label">Código de programa (opcional)</label>
                <input type="text" class="form-control" id="career_offered_code" name="career_offered_code" value="<?= set_value('career_offered_code') ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="career_offered" class="form-label">Nombre del programa (*)</label>
                <input type="text" class="form-control" id="career_offered" name="career_offered" value="<?= set_value('career_offered') ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-12">
                <div class="float-end">
                    <a href="<?= base_url('/admin/programas') ?>" class="btn btn-danger" type="button">Cancelar</a>
                    <input class="btn btn-primary" type="submit" value="Crear programa"></input>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#career_offered").keydown(function(e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('career_offered').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.keyCode >= 48 && e.keyCode <= 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

    });
</script>