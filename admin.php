<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Michael Soelberg | Contact</title>
    
    <meta name="description" content="The work of artist Michael Soelberg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    
    <script src="js/modernizr.custom.71203.js"></script>
</head>
<body>
    
    <?php include 'php/inc/header.inc.php'; ?>
    
    <?php

    $name = $_POST['name'];
    $password = $_POST['password'];

    if ((!isset($name)) || (!isset($password))){

    ?>
    
    <section id="login">
        <h2>Please Login:</h2>
        <form action="admin.php" method="post">
            <label for="name">Username:</label>
            <input  type="text" name="name">
            <label for="password">Password:</label>
            <input type="password" name="password">
            <input type="Submit" name="submit" value="Enter">
        </form>
    </section>
    
    <?php
    }else if(($name=="user") && ($password=="pass")){
    ?>
    <h2>Manage Content</h2>
    <?php
    }else{
    ?>
    <h2>Access Denied</h2>
    <p>Something went wrong with your login.<br>Please <a href="admin.php"try again</a>.</p>
    <?php
    }
    ?>
    
    <?php include 'php/inc/footer.inc.php'; ?>

</body>
</html>
