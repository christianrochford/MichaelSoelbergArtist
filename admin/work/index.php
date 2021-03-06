<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/magicquotes.inc.php'; 
require_once '../access.html.php';
if (!userIsLoggedIn()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/login.php';
    exit(); 
}

// Add a new painting
if (isset($_GET['add'])) {
  $pageTitle = 'New Painting';
  $action = 'addform';
  $filename = '';
  $description = '';
  $id = '';
  $button = 'Add Painting';
  include $_SERVER['DOCUMENT_ROOT'] . '/admin/work/form1.html.php';
exit();
}

if (isset($_GET['addform']) && ($_POST['filename'] == "")) {
  $error = 'Please compelte the form and upload a photo.';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
} elseif (isset($_GET['addform']) && ($_POST['filename'] != "")) {
  include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';
try {
    $sql = 'INSERT INTO work SET
        filename = :filename,
        description = :description';
    $s = $pdo->prepare($sql);
    $s->bindValue(':filename', $_POST['filename']);
    $s->bindValue(':description', $_POST['description']);
    $s->execute();
  }
  catch (PDOException $e) {
    $error = 'Error adding submitted painting.';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
    exit();
  }

// Upload jpeg to root/img directory

$allowedExts = array("jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ( isset( $_FILES["file"] ) and $_FILES["file"]["error"] == UPLOAD_ERR_OK ) {
  if ((($_FILES["file"]["type"] !== "image/jpeg")
  || ($_FILES["file"]["type"] !== "image/jpg")
  || ($_FILES["file"]["type"] !== "image/pjpeg")
  || ($_FILES["file"]["type"] !== "image/x-png")
  || ($_FILES["file"]["type"] !== "image/png"))
  && ($_FILES["file"]["size"] < 40000)
  && in_array($extension, $allowedExts))
   {
    echo "<p>JPEG or PNG photos only, thanks!</p>";
    } elseif ( !move_uploaded_file( $_FILES["file"]["tmp_name"], "../../img/" . basename( $_POST["filename"]) . "." . $extension ) ) {
    echo "<p>Sorry, there was a problem uploading the photo. please try again.</p>" . $_FILES["file"]["error"] ;
    } else {
    header('Location: .');
    exit();
    }
  } else {
  switch( $_FILES["file"]["error"] ) {
    case UPLOAD_ERR_INI_SIZE:
      $error = 'The file size is too big.';
      break;
    case UPLOAD_ERR_FORM_SIZE:
      $error = 'The photo is larger than the script allows.';
      break;
    case UPLOAD_ERR_NO_FILE:
      $error = "No file was uploaded. Make sure you choose a file to upload.";
      break;
    default:
      $message = "Please contact your server administrator for help.";
  }
  $error =  "<p>Sorry, there was a problem uploading the image. $error</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
  }
header('Location: .');
exit(); }

// Delete existing painting
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';
  // Get paintings
  try
  {
    $sql = 'SELECT id, filename FROM work WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
}
catch (PDOException $e)
{
  $error = 'Error getting paintings to delete.';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
}
$result = $s->fetchAll();
echo $_POST['filename'];
// Delete painting entries
try
{
  $sql = 'DELETE FROM work WHERE id = :id';
  $s = $pdo->prepare($sql);
  // For each painting
  foreach ($result as $row)
  {
    $paintingId = $row['id'];
    $s->bindValue(':id', $paintingId);
    $s->execute();
} }
catch (PDOException $e)
{
  $error = 'Error deleting paintings.';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
}
header('Location: .');
exit(); }

// Display all paintings in database

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';

try {
  $result = $pdo->query('SELECT id, filename, description FROM work');
}
catch (PDOException $e)
{
  $error = 'Error fetching paintings from the database!';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $paintings[] = array('id' => $row['id'], 'name' => $row['filename'], 'description' => $row['description']);
}

include $_SERVER['DOCUMENT_ROOT'] . '/admin/work/work.html.php';

?>