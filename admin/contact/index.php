<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/magicquotes.inc.php'; 
require_once '../access.html.php';
if (!userIsLoggedIn()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/login.php';
    exit(); 
}
// Edit existing details
if (isset($_POST['action']) and $_POST['action'] == 'Edit') {
  include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';
try {
    $sql = 'SELECT id, email FROM contact WHERE id = :id';
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
  $pageTitle = 'Edit Contact Details';
  $action = 'editform';
  $email = $row['email'];
  $id = $row['id'];
  $button = 'Update Contact Details';
  include $_SERVER['DOCUMENT_ROOT'] . '/admin/contact/form.html.php';
exit(); }

if (isset($_GET['editform'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';
try {
    $sql = 'UPDATE contact SET
email = :email
WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':email', $_POST['email']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating contact details.';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
    exit();
}
header('Location: .');
exit(); }

// Show all details

include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';
try {
  $result = $pdo->query('SELECT id, email FROM contact');
}
catch (PDOException $e)
{
  $error = 'Error fetching contact details from the database!';
  include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $details[] = array('email' => $row['email'], 'id' => $row['id']);
}
include $_SERVER['DOCUMENT_ROOT'] . '/admin/contact/contact.html.php';

?>