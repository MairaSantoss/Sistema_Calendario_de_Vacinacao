<?php

include("verificarSessao.php");
include("database.php");


$sessao = $_SESSION["loguin_email"];

$hdose1 = ( isset($_POST['gestante_hepatite_1']) ) ? 1 : 0;
$hdose2 = ( isset($_POST['gestante_hepatite_2']) ) ? 1 : 0;
$hdose3 = ( isset($_POST['gestante_hepatite_3']) ) ? 1 : 0;


$ddose1 = ( isset($_POST['gestante_duplaadulto_1']) ) ? 1 : 0;
$ddose2 = ( isset($_POST['gestante_duplaadulto_2']) ) ? 1 : 0;
$ddose3 = ( isset($_POST['gestante_duplaadulto_2']) ) ? 1 : 0;

$dtdose1 = ( isset($_POST['gestante_dtpa_1']) ) ? 1 : 0;
$dtdose2 = 0;
$dtdose3 = 0;



$idose1 = ( isset($_POST['gestante_influenza_1']) ) ? 1 : 0;
$idose2 = 0;
$idose3 = 0;


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
                            
             //alterar base de dados que foi cadastrada no formulario cadastro user

             //GESTANTE
            $i = 1;
            while($i <= 4) 
            {        
                if ($i == 1) { $vacina = "hepatite"; $dose1 = $hdose1; $dose2 = $hdose2; $dose3 = $hdose3; }
                if ($i == 2) { $vacina = "dupla adulto"; $dose1 = $ddose1; $dose2 = $ddose2; $dose3 = $ddose3; }
                if ($i == 3) { $vacina = "dtpa"; $dose1 = $dtdose1; $dose2 = $dtdose2; $dose3 = $dtdose3; }
                if ($i == 4) { $vacina = "influenza"; $dose1 = $idose1; $dose2 = $idose2; $dose3 = $idose3; }
                                         
                $stmt = $conn->prepare("SELECT Vacina, user, codigo FROM gestante"); 
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach($stmt->fetchAll() as $k=>$v) 
                        { 
                            if ($v["Vacina"] == $vacina && $v["user"] == $cod_user )    
                                {                        
                                $codigo = $v["codigo"];  

                                $sql = "UPDATE gestante SET dose1='$dose1', dose2='$dose2', dose3='$dose3' WHERE codigo=$codigo";

                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                                echo $stmt->rowCount() . "<br>Registro atualizado com sucesso<br>";                
                                }   
                        
                        }   
              $i++;              
            }        
                 
            header('Location: a_gestante.php');
        }


                    catch(PDOException $e) {
                                echo $sql . "<br>" . $e->getMessage();
                                                }
                                        $conn = null; 
 

  ?>

