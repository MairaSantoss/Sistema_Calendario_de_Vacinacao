<?php

include("verificarSessao.php");
include("database.php");


$sessao = $_SESSION["loguin_email"];

$nome = $_POST["nomec"];
$ano = $_POST["anoc"];
$cor = $_POST["corc"];
$qtddose = $_POST["dosec"];

echo $nome, $ano;

echo $cor;

try {
    // procurando id do usuario
    $stmt = $conn->prepare("SELECT Id, Email FROM usuario"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach($stmt->fetchAll() as $k=>$v) 
        { 
            if ($v["Email"] == $sessao )    
                {             
                $cod_user = $v["Id"];                      
                }  
        } 
               
        $sql = "INSERT INTO cadastroadulto 
        (nome, qtdDose, user, cod, ano, cor) 
        VALUES ('$nome','$qtddose','$cod_user', null, '$ano', '$cor')";
    
        $stmt = $conn->prepare($sql); 
        $stmt->execute();


    }

catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
                                }
           $conn = null; 


            header('Location: a_usuario.php');
?>



    