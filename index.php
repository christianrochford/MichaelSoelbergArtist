<?php

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';

try {
  $result = $pdo->query('SELECT id, filename FROM home ORDER BY id DESC LIMIT 1');
}
catch (PDOException $e)
{
  $error = 'Error fetching image from the database!';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $paintings[] = array('filename' => $row['filename'] );
}

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/helpers.inc.php';

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
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/header.inc.php'; ?>
    <section id="home_image">
        <?php foreach ($paintings as $painting): ?>
        <img src="img/<?php htmlout($painting['filename']); ?>.jpg" class="centered">
        <?php endforeach; ?>
    </section>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/footer.inc.php'; ?>
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42363213-1', 'michaeltsoelberg.com');
  ga('send', 'pageview');

</script>

</body>
</html>
<?php?>
