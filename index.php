<?php

include 'php/inc/db.inc.php';

try {
  $result = $pdo->query('SELECT id, filename FROM home ORDER BY id DESC LIMIT 1');
}
catch (PDOException $e)
{
  $error = 'Error fetching image from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $paintings[] = array('filename' => $row['filename'] );
}

include 'php/inc/helpers.inc.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | Artist</title>
    <meta name="description" content="The work of artist Michael Soelberg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr.custom.71203.js"></script>
</head>
<body>
    <?php include 'php/inc/header.inc.php'; ?>
    <section>
        <?php foreach ($paintings as $painting): ?>
        <img src="img/<?php htmlout($painting['filename']); ?>.jpg" id="fullscreen">
        <?php endforeach; ?>
    </section>
    <?php include 'php/inc/footer.inc.php'; ?>
</body>
</html>
<?php?>
