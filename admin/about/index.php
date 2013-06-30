<?php include '../../php/inc/db.inc.php'; 
try {
  $result = $pdo->query('SELECT heading, information FROM about');
}
catch (PDOException $e)
{
  $error = 'Error fetching information from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $about[] = array('heading' => $row['heading'], 'info' => $row['information']);
}
include 'about.html.php';

?>