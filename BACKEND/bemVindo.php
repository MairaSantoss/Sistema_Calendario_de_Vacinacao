<?php
include("verificarSessao.php");

include("database.php");


$Email = $_SESSION["loguin_email"]; 
global $nomeUser;    
try
   {
           //Verificando se ja existe email cadastrado no banco antes de inserir novo usuario

         $stmt = $conn->prepare("SELECT Id, Email, Nome FROM usuario"); 
          $stmt->execute();

          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
          $aux = 0;
          foreach($stmt->fetchAll() as $k=>$v) 
          { 
              if ($v["Email"] == $Email ) 
                 {                 
                      $nomeUser = $v["Nome"];           
                     echo $nomeUser;          
                 }    
          }
        }

          catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
                                  }
             $conn = null; 
  
  ?>