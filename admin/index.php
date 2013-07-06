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
        <h2>Site Management System</h2>
        <ul>
          <li><a href="home/">Manage Home Page</a></li>
          <li><a href="work/">Manage Work Page</a></li>
          <li><a href="about/">Manage About Page</a></li>
          <li><a href="contact/">Manage Contact Page</a></li>
        </ul>
    </section>
    
</body>
</html>
<?php?>