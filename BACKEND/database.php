<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "vacina";


//CONECTANDO COMO BANCO
try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  /*echo "Jesus";*/
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>