<?php 
include $_SERVER['DOCUMENT_ROOT'] ._once '/php/inc/helpers.inc.php'; 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | About Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">  
    <script src="../../js/modernizr.custom.71203.js"></script>
</head>
<body>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/adminheader.inc.php'; ?>
    
    <section class="admin" id="about">
     <div class="content_text">
      <h2>Manage Profile</h2>
      <form action="" method="post">
        <div>
          <?php foreach ($about as $profile): ?>
          <h2><?php htmlout($profile['heading']); ?></h2>
          <p><?php htmlout($profile['information']); ?></p>
          <input type="hidden" name="id" value="<?php echo $profile['id']; ?>">
          <?php endforeach; ?>
          <input type="submit" name="action" class="css3button" value="Edit">
        </div>
      </form>
      <p><a href="../index.php">Return to admin home.</a></p>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/admin/logout.inc.html.php'; ?>
     </div>
    </section>
    
  </body>
</html>