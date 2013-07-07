<?php include '../php/inc/db.inc.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | Admin</title>
    
    <meta name="description" content="The work of artist Michael Soelberg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    
    <script src="../js/modernizr.custom.71203.js"></script>
</head>
<body>
    
    <?php include '../php/inc/adminTopHeader.inc.php'; ?>
    
    <section class="admin" id="admin">
        <form method="post" action="login.php">
          <label for="username">Username</label>
          <input type="text" name="username">
          <label for="password">Password</label>
          <input type="password" name="password">
          <input type="submit" value="Sign in">
        </form>
    </section>
    
</body>
</html>
<?php?>