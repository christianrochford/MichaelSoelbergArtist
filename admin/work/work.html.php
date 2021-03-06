<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/helpers.inc.php'; 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | Paintings Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/modernizr.custom.71203.js"></script>
</head>
<body>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/adminheader.inc.php'; ?>
    
    <section class="admin" id="work">
     <div class="content_text">
      <h2>Manage Paintings</h2>
      <p><a href="?add">Add new painting</a></p>
      <ul>
        <?php foreach ($paintings as $painting): ?>
         <li>
            <form action="" method="post">
              <div>
                <?php htmlout($painting['name']); ?>
                <input type="hidden" name="id" value="<?php
                    echo $painting['id']; ?>">
                <input type="submit" name="action" class="css3button" value="Delete">
              </div>
            </form>
          </li>
        <?php endforeach; ?>
      </ul>
      <p><a href="../index.php">Return to admin home.</a></p>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/admin/logout.inc.html.php'; ?>
     </div>
    </section>
    
  </body>
</html>