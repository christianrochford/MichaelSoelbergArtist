<?php 
include '../../php/inc/magicquotes.inc.php'; 

// Add a new painting
if (isset($_GET['add']))
{
  $pageTitle = 'New Painting';
  $action = 'addform';
  $filename = '';
  $description = '';
  $id = '';
  $button = 'Add Painting';
  include 'form1.html.php';
exit(); }

if (isset($_GET['addform']))
{
  include '../../php/inc/db.inc.php';
try {
    $sql = 'INSERT INTO work SET
        filename = :filename,
        description = :description';
    $s = $pdo->prepare($sql);
    $s->bindValue(':filename', $_POST['filename']);
    $s->bindValue(':description', $_POST['description']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted painting.';
    include '../../php/error.html.php';
    exit();
}

// Upload file to tmp folder
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  } else {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }

// Set allowed file types
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000) // File must be smaller than 20Kb
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
    // Save file to root/img/ directory
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("../../img/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../img/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "../../img/" . $_FILES["file"]["name"];
      }
    }
  } else {
  echo "Invalid file";
  }

header('Location: .');
exit(); } 

// Edit existing painting
if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
  include '../../php/inc/db.inc.php';
try {
    $sql = 'SELECT id, filename, description FROM work WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching painting details.';
    include '../../php/error.html.php';
    exit();
}
$row = $s->fetch();
  $pageTitle = 'Edit Paintings';
  $action = 'editform';
  $filename = $row['filename'];
  $description = $row['description'];
  $id = $row['id'];
  $button = 'Update Painting';
  include 'form2.html.php';
exit(); }

if (isset($_GET['editform']))
{
  include '../../php/inc/db.inc.php';
try {
    $sql = 'UPDATE work SET
        filename = :filename,
        description = :description
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':filename', $_POST['filename']);
    $s->bindValue(':description', $_POST['description']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted painting.';
    include '../../php/error.html.php';
    exit();
}
header('Location: .');
exit(); }

// Delete existing painting
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  include '../../php/inc/db.inc.php';
  // Get paintings
  try
  {
    $sql = 'SELECT id FROM work WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
}
catch (PDOException $e)
{
  $error = 'Error getting paintings to delete.';
  include '../../php/error.html.php';
  exit();
}
$result = $s->fetchAll();
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
  include '../../php/error.html.php';
  exit();
}

  header('Location: .');
exit(); }

// Display all paintings in database

include '../../php/inc/db.inc.php';

try {
  $result = $pdo->query('SELECT id, filename, description FROM work');
}
catch (PDOException $e)
{
  $error = 'Error fetching paintings from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $paintings[] = array('id' => $row['id'], 'name' => $row['filename'], 'description' => $row['description']);
}

include 'work.html.php';

?>