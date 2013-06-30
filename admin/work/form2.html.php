<?php include_once '../../php/inc/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php htmlout($pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">

</head>
<body>

    <?php include '../../php/inc/adminheader.inc.php'; ?>
    
    <section class="admin" id="<?php htmlout($action); ?>">
        <h2><?php htmlout($pageTitle); ?></h2>
        <form action="?<?php htmlout($action); ?>" method="post">
            <div>
                <label for="filename">Name: <input type="text" name="filename" id="filename" value="<?php htmlout($filename); ?>"></label>
            </div>
            <div>
                <label for="description">Description: <input type="text" name="description" id="description" value="<?php htmlout($description); ?>"></label>
            </div>
            <div>
                <input type="hidden" name="id" value="<?php htmlout($id); ?>">
                <input type="submit" id="addPainting" class="css3button" value="<?php htmlout($button); ?>">
            </div>
        </form>
        <p><a href="../index.php">Return to admin home.</a></p>
    </section>
    
    <?php include '../../php/inc/footer.inc.php'; ?>
    
</body>
</html>