<?php

include '../../php/inc/db.inc.php'; 

// Set Homepage background
if (isset($_POST['set'])) {
  try {
      $sql = 'INSERT INTO home SET
          filename = :filename';
      $s = $pdo->prepare($sql);
      $s->bindValue(':filename', $_POST['background']);
      $s->execute();
    }
    catch (PDOException $e) {
      $error = 'Error selecting painting from database.';
      include '../../php/error.html.php';
      exit();
    }
}

// Display image options

include '../../php/inc/db.inc.php'; 

try {
  $result = $pdo->query('SELECT id, filename FROM work');
}
catch (PDOException $e)
{
  $error = 'Error fetching paintings from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $paintings[] = array('id' => $row['id'], 'filename' => $row['filename']);
}
include 'home.html.php';

?>