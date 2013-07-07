<?php 
include '../../php/inc/helpers.inc.php'; 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/modernizr.custom.71203.js"></script>
</head>
<body>
    
    <?php include '../../php/inc/adminHeader.inc.php'; ?>
    <section id="login">
      <h2>Log In</h2>
      <p>Please log in to view the page that you requested.</p>
      <?php if (isset($loginError)): ?>
        <p><?php htmlout($loginError); ?></p>
      <?php endif; ?>
      <form action="" method="post" id="loginform">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="hidden" name="action" value="login">
        <input type="submit" value="Log in" class="css3button">
    </form>
    <p><a href="../index.php">Return to admin home.</a></p>
    </section>
    
</body>
</html>
    
