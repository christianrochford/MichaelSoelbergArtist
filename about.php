<?php

include 'php/inc/db.inc.php';

try {
  $result = $pdo->query('SELECT id, heading, information FROM about');
}
catch (PDOException $e)
{
  $error = 'Error fetching profile from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $about[] = array('id' => $row['id'], 'heading' => $row['heading'], 'information' => $row['information']);
}

include 'php/inc/helpers.inc.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | About</title>
    <meta name="description" content="The work of artist Michael Soelberg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr.custom.71203.js"></script>
</head>
<body id="about-content">
    <?php include 'php/inc/header.inc.php'; ?>
    <section id="about">
        <?php foreach ($about as $profile): ?>
        <h2><?php htmlout($profile['heading']); ?></h2>
        <p><?php htmlout($profile['information']); ?></p>
        <?php endforeach; ?>
    </section>
    <?php include 'php/inc/footer.inc.php'; ?>
</body>
</html>