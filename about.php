<?php

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';

try {
  $result = $pdo->query('SELECT id, heading, information FROM about');
}
catch (PDOException $e)
{
  $error = 'Error fetching profile from the database!';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $about[] = array('id' => $row['id'], 'heading' => $row['heading'], 'information' => $row['information']);
}

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/helpers.inc.php';

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
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/header.inc.php'; ?>
    <section id="about">
      <div id="about_text">
        <?php foreach ($about as $profile): ?>
        <h2><?php htmlout($profile['heading']); ?></h2>
        <p><?php htmlout($profile['information']); ?></p>
        <?php endforeach; ?>
      </div>
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