<?php include $_SERVER['DOCUMENT_ROOT'] ._once '/php/inc/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php htmlout($pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/adminheader.inc.php'; ?>
    <section class="admin contact" id="<?php htmlout($action); ?>">
      <div class="content_text">
        <h2><?php htmlout($pageTitle); ?></h2>
        <form action="?<?php htmlout($action); ?>" method="post">
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?php htmlout($email); ?>">
            </div>
            <div>
                <input type="hidden" name="id" value="<?php htmlout($id); ?>">
                <input type="submit" id="addPainting" class="css3button" value="<?php htmlout($button); ?>">
            </div>
        </form>
        <p><a href="../index.php">Return to admin home.</a></p>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/admin/logout.inc.html.php'; ?>
      </div>
    </section>
</body>
</html>