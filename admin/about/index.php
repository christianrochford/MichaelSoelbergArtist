<?php 

// Edit existing profile
if (isset($_POST['action']) and $_POST['action'] == 'Edit') {
  include '../../php/inc/db.inc.php';
try {
    $sql = 'SELECT id, heading, information FROM about WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e) {
    $error = 'Error fetching profile.';
    include '../../php/error.html.php';
    exit();
  }
$row = $s->fetch();
  $pageTitle = 'Edit Profile';
  $action = 'editform';
  $heading= $row['heading'];
  $information = $row['information'];
  $id = $row['id'];
  $button = 'Update Profile';
  include 'form.html.php';
exit(); }

if (isset($_GET['editform'])) {
  include '../../php/inc/db.inc.php';
try {
    $sql = 'UPDATE about SET
        heading = :heading,
        information = :information
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':heading', $_POST['heading']);
    $s->bindValue(':information', $_POST['information']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating profile.';
    include '../../php/error.html.php';
    exit();
}
header('Location: .');
exit(); }

// Display current profile

include '../../php/inc/db.inc.php'; 

try {
  $result = $pdo->query('SELECT id, heading, information FROM about');
}
catch (PDOException $e)
{
  $error = 'Error fetching profile from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $about[] = array('id' => $row['id'], 'heading' => $row['heading'], 'information' => $row['information']);
}
include 'about.html.php';

?>