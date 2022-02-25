<?php

include("verificarSessao.php");
include("database.php");


$sessao = $_SESSION["loguin_email"];

$hdose1 = ( isset($_POST['senhor_hepatite_1']) ) ? 1 : 0;
$hdose2 = ( isset($_POST['senhor_hepatite_2']) ) ? 1 : 0;
$hdose3 = ( isset($_POST['senhor_hepatite_3']) ) ? 1 : 0;

$fdose1 = ( isset($_POST['senhor_febreamarela_1']) ) ? 1 : 0;
$fdose2 = 0;
$fdose3 = 0;

$ddose1 = ( isset($_POST['senhor_duplaadulto_1']) ) ? 1 : 0;
$ddose2 = ( isset($_POST['senhor_duplaadulto_2']) ) ? 1 : 0;
$ddose3 = 0;

$idose1 = ( isset($_POST['senhor_influenza_1']) ) ? 1 : 0;
$idose2 = 0;
$idose3 = 0;

$pndose1 = ( isset($_POST['senhor_pneumocócica_1']) ) ? 1 : 0;
$pndose2 = ( isset($_POST['senhor_pneumocócica_2']) ) ? 1 : 0;
$pndose3 = 0;

$ddose1_1 = ( isset($_POST['senhor_duplaadulto_dois']) ) ? 1 : 0;
$ddose2_2 = 0;
$ddose3_3 = 0;


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

             //IDOSO
            $i = 1;
            while($i <= 6) 
            {        
                if ($i == 1) { $vacina = "hepatite"; $dose1 = $hdose1; $dose2 = $hdose2; $dose3 = $hdose3; }
                if ($i == 2) { $vacina = "febre amarela"; $dose1 = $fdose1; $dose2 = $fdose2; $dose3 = $fdose3; }
                if ($i == 3) { $vacina = "dupla adulto 1/2"; $dose1 = $ddose1; $dose2 = $ddose2; $dose3 = $ddose3; }
                if ($i == 4) { $vacina = "influenza"; $dose1 = $idose1; $dose2 = $idose2; $dose3 = $idose3; }
                if ($i == 5) { $vacina = "pneumococica"; $dose1 = $pndose1; $dose2 = $pndose2; $dose3 = $pndose3; }
                if ($i == 6) { $vacina = "segundadupla"; $dose1 = $ddose1_1; $dose2 = $ddose2_2; $dose3 = $ddose3_3; }
                                         
                $stmt = $conn->prepare("SELECT Vacina, user, codigo FROM idoso"); 
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach($stmt->fetchAll() as $k=>$v) 
                        { 
                            if ($v["Vacina"] == $vacina && $v["user"] == $cod_user )    
                                {                        
                                $codigo = $v["codigo"];  

                                $sql = "UPDATE idoso SET dose1='$dose1', dose2='$dose2', dose3='$dose3' WHERE codigo=$codigo";

                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                                echo $stmt->rowCount() . "<br>Registro atualizado com sucesso<br>";                
                                }   
                        
                        }   
              $i++;              
            }        
                 
            header('Location: a_idoso.php');
        }


                    catch(PDOException $e) {
                                echo $sql . "<br>" . $e->getMessage();
                                                }
                                        $conn = null; 
 

  ?>