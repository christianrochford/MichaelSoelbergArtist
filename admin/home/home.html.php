<?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/helpers.inc.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Michael Soelberg | Home Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/modernizr.custom.71203.js"></script>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/adminheader.inc.php'; ?>
  <section class="admin" id="home">
   <div class="content_text">
    <h2>Manage Homepage</h2>
    <p>Select background image</p>
    <form action="" method="post">
      <select name="background">
        <?php foreach ($paintings as $painting): ?>
        <option value="<?php echo $painting['filename']; ?>"><?php echo $painting['filename']; ?></option>
        <?php endforeach; ?>
      </select>
      <input type="submit" name="set" value="Set" class="css3button">
    </form>
    <p><a href="../index.php">Return to admin home.</a></p>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/admin/logout.inc.html.php'; ?>
   </div>
  </section>
</body>
</html>