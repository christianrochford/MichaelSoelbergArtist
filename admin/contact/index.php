<?php 

// Edit existing details
if (isset($_POST['action']) and $_POST['action'] == 'Edit') {
  include '../../php/inc/db.inc.php';
try {
    $sql = 'SELECT id, email FROM contact WHERE id = :id';
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
  $pageTitle = 'Edit Contact Details';
  $action = 'editform';
  $email = $row['email'];
  $id = $row['id'];
  $button = 'Update Contact Details';
  include 'form.html.php';
exit(); }

if (isset($_GET['editform'])) {
  include '../../php/inc/db.inc.php';
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
    include '../../php/error.html.php';
    exit();
}
header('Location: .');
exit(); }

// Show all details

include '../../php/inc/db.inc.php'; 
try {
  $result = $pdo->query('SELECT id, email FROM contact');
}
catch (PDOException $e)
{
  $error = 'Error fetching contact details from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $details[] = array('email' => $row['email'], 'id' => $row['id']);
}
include 'contact.html.php';

?>