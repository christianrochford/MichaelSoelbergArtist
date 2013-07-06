<?php 

include 'php/inc/db.inc.php'; 

try {
  $result = $pdo->query('SELECT id, filename FROM work');
}
catch (PDOException $e)
{
  $error = 'Error fetching image from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $paintings[] = array('id' => $row['id'], 'filename' => $row['filename'] );
}

include 'php/inc/helpers.inc.php';

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
    
    <?php include 'php/inc/header.inc.php'; ?>
    
    <section id="gallery">
        <div id="container">
            <?php foreach ($paintings as $painting): ?>
            <a href="#" data-reveal-id="<?php htmlout($painting['id']); ?>">
                <div class="item">
                    <img src="img/<?php htmlout($painting['filename']); ?>.jpg">
                </div>
            </a>
            <?php endforeach; ?>
        </div><!--container-->
    </section>
    
    <?php include 'php/inc/footer.inc.php'; ?>
    
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

</body>
</html>
