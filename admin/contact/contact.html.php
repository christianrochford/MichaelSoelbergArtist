<?php include '../../php/inc/helpers.inc.php'; ?>
<?php include '../../php/inc/db.inc.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | Contact Admin</title>
    
    <meta name="description" content="Contact artist Michael Soelberg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
    
    <script src="../../js/modernizr.custom.71203.js"></script>
</head>
<body>
    
    <?php include '../../php/inc/adminheader.inc.php'; ?>
    
    <section class="admin" id="contact">
      <h2>Manage Contact Details</h2>
      <?php foreach ($details as $detail): ?>
      <form action="" method="post">
        <div>
          <p><?php htmlout($detail['email']); ?></p>
          <input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
          <?php endforeach; ?>
          <input type="submit" name="action" class="css3button" value="Edit">
        </div>
      </form>
      
      <p><a href="../index.php">Return to admin home.</a></p>
    </section>
    
  </body>
</html>