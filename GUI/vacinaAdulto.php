<?php

include("verificarSessao.php");
include("database.php");


$sessao = $_SESSION["loguin_email"];

$hdose1 = ( isset($_POST['adulto_hepatite_1']) ) ? 1 : 0;
$hdose2 = ( isset($_POST['adulto_hepatite_2']) ) ? 1 : 0;
$hdose3 = ( isset($_POST['adulto_hepatite_3']) ) ? 1 : 0;

$fdose1 = ( isset($_POST['adulto_febreamarela_1']) ) ? 1 : 0;
$fdose2 = 0;
$fdose3 = 0;

$ddose1 = ( isset($_POST['adulto_duplaadulto_1']) ) ? 1 : 0;
$ddose2 = ( isset($_POST['adulto_duplaadulto_2']) ) ? 1 : 0;
$ddose3 = 0;

$tdose1 = ( isset($_POST['adulto_tripliceviral_1']) ) ? 1 : 0;
$tdose2 = ( isset($_POST['adulto_tripliceviral_2']) ) ? 1 : 0;
$tdose3 = 0;


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

             //ADULTO
            $i = 1;
            while($i <= 4) 
            {        
                if ($i == 1) { $vacina = "hepatite"; $dose1 = $hdose1; $dose2 = $hdose2; $dose3 = $hdose3; }
                if ($i == 2) { $vacina = "febre amarela"; $dose1 = $fdose1; $dose2 = $fdose2; $dose3 = $fdose3; }
                if ($i == 3) { $vacina = "triplice viral"; $dose1 = $tdose1; $dose2 = $tdose2; $dose3 = $tdose3; }
                if ($i == 4) { $vacina = "dupla adulto"; $dose1 = $ddose1; $dose2 = $ddose2; $dose3 = $ddose3; }
                                         
                $stmt = $conn->prepare("SELECT Vacina, user, codigo FROM adulto"); 
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach($stmt->fetchAll() as $k=>$v) 
                        { 
                            if ($v["Vacina"] == $vacina && $v["user"] == $cod_user )    
                                {                        
                                $codigo = $v["codigo"];  

                                $sql = "UPDATE adulto SET dose1='$dose1', dose2='$dose2', dose3='$dose3' WHERE codigo=$codigo";

                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                                echo $stmt->rowCount() . "<br>Registro atualizado com sucesso<br>";                
                                }   
                        
                        }   
              $i++;              
            }        
                 
            header('Location: a_adulto.php');
        }


                    catch(PDOException $e) {
                                echo $sql . "<br>" . $e->getMessage();
                                                }
                                        $conn = null; 
 

  ?>








