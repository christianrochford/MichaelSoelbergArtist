<?php

include $_SERVER['DOCUMENT_ROOT'] .'/php/inc/db.inc.php';

try {
  $result = $pdo->query('SELECT id, filename FROM work');
}
catch (PDOException $e)
{
  $error = 'Error fetching image from the database!';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $paintings[] = array('id' => $row['id'], 'filename' => $row['filename'] );
}

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/helpers.inc.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | Gallery</title>
    <meta name="description" content="The work of artist Michael Soelberg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr.custom.71203.js"></script>
</head>
<body id="work-content">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/header.inc.php'; ?>
    <section id="work">
      <div id="gallery">
        <div id="container">
            <?php foreach ($paintings as $painting): ?>
            <a href="#" data-reveal-id="<?php htmlout($painting['id']); ?>">
            <div class="item">
                <img src="img/<?php htmlout($painting['filename']); ?>.jpg">
            </div>
            </a>
            <?php endforeach; ?>
        </div><!--container-->
      </div><!--gallery-->
    </section>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/footer.inc.php'; ?>
    <!--modals-->
    <div class="modal-content">
        <?php foreach ($paintings as $painting): ?>
        <div id="<?php htmlout($painting['id']); ?>" class="reveal-modal">
            <h1><?php htmlout($painting['filename']); ?></h1>
            <img src="img/<?php htmlout($painting['filename']); ?>.jpg">
            <a class="close-reveal-modal">&#215;</a>
        </div>
        <?php endforeach; ?>
    </div><!--modal-content-->

    <script src="js/jquery1.10.1.js"></script>
    <script src="js/jQueryMigrate1.2.1.js"></script>
    <script src="js/jquery.reveal.js"></script>
    <script src="js/masonry2.1.08.js"></script>

    <script>

        $(window).load(function(){
            $('#container').masonry({
                // options
                itemSelector : '.item',
                columnWidth : 200
            });
        });


    </script>
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