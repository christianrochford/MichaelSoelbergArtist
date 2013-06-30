<?php include '../../php/inc/db.inc.php'; 
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
  $paintings[] = array('id' => $row['id'], 'name' => $row['filename']);
}
include 'home.html.php';

?>