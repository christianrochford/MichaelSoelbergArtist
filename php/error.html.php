<?php?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | Script Error</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
    
    <script src="js/modernizr.custom.71203.js"></script>
</head>
<body>

    <?php include 'inc/adminheader.inc.php'; ?>

    <section id="error">
        <h2>There was an error</h2>
        <p>
        <?php echo $error; ?>
        </p>
        <p><a href="../../admin/index.php">Return to admin home.</a></p>
    </section>
</body>
</html>
<?php?>
