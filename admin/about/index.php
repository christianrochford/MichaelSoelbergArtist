<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/magicquotes.inc.php'; 
require_once '../access.html.php';
if (!userIsLoggedIn()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/login.php';
    exit(); 
}
// Edit existing profile
if (isset($_POST['action']) and $_POST['action'] == 'Edit') {
  include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';
try {
    $sql = 'SELECT id, heading, information FROM about WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e) {
    $error = 'Error fetching profile.';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
    exit();
  }
$row = $s->fetch();
  $pageTitle = 'Edit Profile';
  $action = 'editform';
  $heading= $row['heading'];
  $information = $row['information'];
  $id = $row['id'];
  $button = 'Update Profile';
  include $_SERVER['DOCUMENT_ROOT'] . '/admin/about/form.html.php';
exit(); }

if (isset($_GET['editform'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';
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
    include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
    exit();
}
header('Location: .');
exit(); }

// Display current profile

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php'; 

try {
  $result = $pdo->query('SELECT id, heading, information FROM about');
}
catch (PDOException $e)
{
  $error = 'Error fetching profile from the database!';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $about[] = array('id' => $row['id'], 'heading' => $row['heading'], 'information' => $row['information']);
}
include $_SERVER['DOCUMENT_ROOT'] . '/admin/about/about.html.php';

?>