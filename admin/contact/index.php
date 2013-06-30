<?php include '../../php/inc/db.inc.php'; 
try {
  $result = $pdo->query('SELECT name, surname FROM contact');
}
catch (PDOException $e)
{
  $error = 'Error fetching contact details from the database!';
  include '../../php/error.html.php';
  exit();
}
foreach ($result as $row)
{
  $details[] = array('name' => $row['name'], 'surname' => $row['surname'],  'email' => $row['email']);
}
include 'contact.html.php';

?>