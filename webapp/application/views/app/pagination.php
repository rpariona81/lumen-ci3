<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter 3 Pagination Example</title>
    <!-- Include Bootstrap CSS for styling (optional) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com">
</head>
<body>

<div class="container">
    <h1>My Results</h1>
    <ul>
        <?php foreach ($records as $row): ?>
            <li><?php echo $row->ebook_alias; ?></li> <!-- Replace 'name' with your actual column name -->
        <?php endforeach; ?>
    </ul>

    <!-- Display the pagination links -->
    <nav aria-label="Page navigation">
        <?php echo $pagination; ?>
    </nav>
</div>

</body>
</html>
