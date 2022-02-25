
<?php

include("verificarSessao.php");
include("database.php");


$nome = $_GET["nome"];
$ano = $_GET["ano"];
$cor = $_GET["cor"];
$dose = $_GET["dose"];
$id = $_GET["escondido"];


echo $id, $nome, $ano, $cor, $dose;

try {


       $sql = "UPDATE cadastroadulto SET nome='$nome', qtdDose='$dose', ano='$ano', cor='$cor' WHERE cod=$id";

          $stmt = $conn->prepare($sql);

          $stmt->execute();

          echo $stmt->rowCount() . "<br>Registro atualizado com sucesso<br>";
                    
                                     

    }


catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
                            }
                     $conn = null; 
 
                     header('Location: a_usuario.php');
  ?>








