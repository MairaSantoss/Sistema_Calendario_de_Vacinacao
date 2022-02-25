<?php

include("verificarSessao.php");
include("database.php");

$dose1 = ( isset($_POST['adulto_hepatite_1']) ) ? 1 : 0;
$dose2 = ( isset($_POST['adulto_hepatite_2']) ) ? 1 : 0;
$dose3 = ( isset($_POST['adulto_hepatite_3']) ) ? 1 : 0;
$vacina = "hepa";

echo $dose1;
echo $dose2;   
echo $dose3;


 $sessao = $_SESSION["loguin_email"];
 echo "<br> $sessao";

                             

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
           
          //VERIFICANDO SE JA EXISTE A VACINA PARA DECIDIR SE ALTERA OU INSERE

          $stmt = $conn->prepare("SELECT Vacina, user, codigo FROM adulto"); 
          $stmt->execute();

          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
          foreach($stmt->fetchAll() as $k=>$v) 
                { 
                    if ($v["Vacina"] == $vacina && $v["user"] == $cod_user )    
                        {               
                        $proc_linhaBD = 0; 
                        $codigo = $v["codigo"];                    
                        }   
                      else
                        {
                          $proc_linhaBD = 1; 
                        }
                  }   

           /* INSERT*/
          if ($proc_linhaBD == 1)
                   {
                    echo " <br> NAO EXISTE ";
                    $sql = "INSERT INTO adulto (Vacina, dose1, dose2, dose3, codigo, user)

                    VALUES ('$vacina','$dose1', '$dose2 ', '$dose3',NULL, '$cod_user')";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    echo "<br>Novo Registro Inserido com sucesso!<br>";
                   }

             /* UPDATE*/
           if ($proc_linhaBD == 0)
                   {
                    echo "  <br> JA EXISTE";

                    $sql = "UPDATE adulto SET dose1='$dose1', dose2='$dose2', dose3='$dose3' WHERE codigo=$codigo";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute();

                    echo $stmt->rowCount() . "<br>Registro atualizado com sucesso<br>";
                    
                    }                 

    }


catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
                            }
                     $conn = null; 
 

  ?>








