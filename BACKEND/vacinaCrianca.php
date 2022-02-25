<?php

include("verificarSessao.php");
include("database.php");


$sessao = $_SESSION["loguin_email"];

$pendose1 = ( isset($_POST['crianca_penta_1']) ) ? 1 : 0;
$pendose2 = 0;
$pendose3 = 0;

$podose1 = ( isset($_POST['crianca_poliomielite_1']) ) ? 1 : 0;
$podose2 = 0;
$podose3 = 0;

$pndose1 = ( isset($_POST['crianca_pneumocócica_1']) ) ? 1 : 0;
$pndose2 = 0;
$pndose3 = 0;

$rdose1 = ( isset($_POST['crianca_rotavírus_1']) ) ? 1 : 0;
$rdose2 = 0;
$rdose3 = 0;

$mdose1 = ( isset($_POST['crianca_meningocócica_1']) ) ? 1 : 0;
$mdose2 = 0;
$mdose3 = 0;

$pendose1_1 = ( isset($_POST['crianca_penta_11']) ) ? 1 : 0;
$pendose2_2 = ( isset($_POST['crianca_penta_22']) ) ? 1 : 0;
$pendose3_3 = 0;

$podose1_1 = ( isset($_POST['crianca_poliomielite_11']) ) ? 1 : 0;
$podose2_2 = ( isset($_POST['crianca_poliomielite_22']) ) ? 1 : 0;
$podose3_3 = 0;

$pndose1_1 = ( isset($_POST['crianca_pneumococica_11']) ) ? 1 : 0;
$pndose2_2 = ( isset($_POST['crianca_pneumococica_22']) ) ? 1 : 0;
$pndose3_3 = 0;



$rdose1_1 = ( isset($_POST['crianca_rotavírus_11']) ) ? 1 : 0;
$rdose2_2 = ( isset($_POST['crianca_rotavírus_22']) ) ? 1 : 0;
$rdose3_3 = 0;

$mdose1_1 = ( isset($_POST['crianca_meningocócica_11']) ) ? 1 : 0;
$mdose2_2 = ( isset($_POST['crianca_meningocócica_22']) ) ? 1 : 0;
$mdose3_3 = 0;

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

             //CRIANÇA
            $i = 1;
            while($i <= 10) 
            {        
                if ($i == 1) { $vacina = "penta 1/2"; $dose1 = $pendose1; $dose2 = $pendose2; $dose3 = $pendose3; }
                if ($i == 2) { $vacina = "poliomielite 1/2"; $dose1 = $podose1; $dose2 = $podose2; $dose3 = $podose3; }
                if ($i == 3) { $vacina = "pneumococica 1/2"; $dose1 = $pndose1; $dose2 = $pndose2; $dose3 = $pndose3; }
                if ($i == 4) { $vacina = "rotavirus 1/2"; $dose1 = $rdose1; $dose2 = $rdose2; $dose3 = $rdose3; }
                if ($i == 5) { $vacina = "meningococica 1/2"; $dose1 = $mdose1; $dose2 = $mdose2; $dose3 = $mdose3; }
                if ($i == 6) { $vacina = "penta 2/2"; $dose1 = $pendose1_1; $dose2 = $pendose2_2; $dose3 = $pendose3_3; }
                if ($i == 7) { $vacina = "poliomielite 2/2"; $dose1 = $podose1_1; $dose2 = $podose2_2; $dose3 = $podose3_3; }
                if ($i == 8) { $vacina = "pneumococica 2/2"; $dose1 = $pndose1_1; $dose2 = $pndose2_2; $dose3 = $pndose3_3; }
                if ($i == 9) { $vacina = "rotavirus 2/2"; $dose1 = $rdose1_1; $dose2 = $rdose2_2; $dose3 = $rdose3_3; }
                if ($i == 10) { $vacina = "meningococica 2/2"; $dose1 = $mdose1_1; $dose2 = $mdose2_2; $dose3 = $mdose3_3; }

                
                                         
                $stmt = $conn->prepare("SELECT Vacina, user, codigo FROM crianca"); 
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach($stmt->fetchAll() as $k=>$v) 
                        { 
                            if ($v["Vacina"] == $vacina && $v["user"] == $cod_user )    
                                {                        
                                $codigo = $v["codigo"];  

                                $sql = "UPDATE crianca SET dose1='$dose1', dose2='$dose2', dose3='$dose3' WHERE codigo=$codigo";

                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                                echo $stmt->rowCount() . "<br>Registro atualizado com sucesso<br>";                
                                }   
                        
                        }   
              $i++;              
            }        
                 
            header('Location: a_crianca.php');
        }


                    catch(PDOException $e) {
                                echo $sql . "<br>" . $e->getMessage();
                                                }
                                        $conn = null; 
 

  ?>