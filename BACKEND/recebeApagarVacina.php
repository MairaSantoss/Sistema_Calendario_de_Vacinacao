
<?php

include("verificarSessao.php");
include("database.php");



$id = $_GET["escondido"];


  
try {
  $stmt = $conn->prepare("DELETE FROM cadastroadulto WHERE cod=$id"); 
  $stmt->execute();
 
  } 
catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();

    }

    header('Location: a_usuario.php'); 


  ?>








