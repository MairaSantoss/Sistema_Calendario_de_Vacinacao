<?php

include("database.php");

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
                echo $cod_user;              
                }  
        }  
    }

catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
                                }
           $conn = null; 



?>