<?php

include 'php/inc/db.inc.php';

try {
  $result = $pdo->query('SELECT email FROM contact');
}
catch (PDOException $e)
{
  $error = 'Error fetching details from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $details[] = array('email' => $row['email'] );
}

include 'php/inc/helpers.inc.php';

?>
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
    <section id="contact">
        <?php foreach ($details as $detail): ?>
        <h2>Contact Me:</h2>
        <p>For enquiries please feel free to send me a message</p>
        <p>Send me an <a href="<?php htmlout($detail['email']); ?>">email</a>.</p>
        <?php endforeach; ?>
    </section>
    <?php include 'php/inc/footer.inc.php'; ?>
</body>
</html>