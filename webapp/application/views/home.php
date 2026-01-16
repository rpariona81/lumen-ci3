<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Home Page</h1>
        <?php if ($this->session->flashdata('Solicitud recibida con éxito, se activará su cuenta dentro de las próximas 24 hrs.')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('Solicitud recibida con éxito, se activará su cuenta dentro de las próximas 24 hrs.') ?>
            </div>
        <?php endif; ?>
        <p>This is a sample home page.</p>
        <p><?= my_success($this->session->flashdata('success')) ?></p>
</body>
</html>