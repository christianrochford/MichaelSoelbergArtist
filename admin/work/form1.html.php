<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/helpers.inc.php'; 
?>
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
    
    <section class="admin" id="<?php htmlout($action); ?>">
      <div class="content_text">
        <h2><?php htmlout($pageTitle); ?></h2>
        <p>Files must be JPEG format.<br>
                Optimal width: 600px.</p>
        <form action="?<?php htmlout($action); ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="filename">Name:</label>
                <input type="text" name="filename" id="filename" value="<?php htmlout($filename); ?>">
            </div>
            <div>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="<?php htmlout($description); ?>">
            </div>
            <div>
                <input type="hidden" name="id" value="<?php htmlout($id); ?>">
            </div>
            <div>
                <label for="file">Filename:</label>
                <input type="file" name="file" id="file"><br>
                <input type="submit" id="addPainting" class="css3button" value="<?php htmlout($button); ?>">
            </div>
        </form>
        <p><a href="../index.php">Return to admin home.</a></p>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/admin/logout.inc.html.php'; ?>
      </div>
    </section>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/footer.inc.php'; ?>
    
</body>
</html>