<?php 
try
{
$pdo = new PDO('mysql:host=localhost;dbname=Soelberg', 'root', 'root');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include $_SERVER['DOCUMENT_ROOT'] .'/php/error.html.php';
  exit();
}

/*

godaddy.com
username: MichaelTSoelberg
pass: Christian1

database
name: Soelberg
username: Soelberg
pass: Michael#1

*/