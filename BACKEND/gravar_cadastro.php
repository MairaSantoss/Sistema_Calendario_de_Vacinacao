<?php
include("database.php");


//DADOS DO FORMULARIO
$Nome = $_POST["nome"];
$dataNascimento = $_POST["data"];
$Genero = $_POST["genero"];
$Estado = $_POST["estado"];
$Cidade = $_POST["cidade"];
$Telefone = $_POST["telefone"];
$Email = $_POST["email"];
$Senha = $_POST["senha"];
//INSERINDO DADOS DO FORMULARIO NO BANCO USUARIOS (mybancophp)

try
   {
           //Verificando se ja existe email cadastrado no banco antes de inserir novo usuario

         $stmt = $conn->prepare("SELECT Id, Email FROM usuario");
          $stmt->execute();

          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
          $criandoDadosUser = "sim";
          $aux = 0;
          foreach($stmt->fetchAll() as $k=>$v) 
          { 
              if ($v["Email"] == $Email ) 
                 {                 
                  echo "Verificamos que esse endereço de email já tem cadastro";  
                  $aux = 1;  
                  break;                          
                 }    
          }
              
          if ($aux == 0)  
           { 
                                               
                    //inserindo usuario       
                    $sql = "INSERT INTO usuario 
                          (Id, Nome, Data, Genero, Estado, Cidade, Telefone, Email, Senha) 
                    VALUES (NULL, '$Nome', '$dataNascimento', '$Genero', '$Estado','$Cidade','$Telefone','$Email','$Senha')";

                    $stmt = $conn->prepare($sql); 
                    $stmt->execute();

                   //pegando ID do usuario inserido acima            
                    $stmt = $conn->prepare("SELECT Id, Email FROM usuario"); 
                    $stmt->execute();

                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

                    foreach($stmt->fetchAll() as $k=>$v) 
                    { 
                        if ($v["Email"] == $Email )    
                            {             
                            $cod_user = $v["Id"];              
                            }  
                      }   
                    //INSERINDO BASE DE DADOS VACINAS
                    //Adulto
                    $i = 1;
                      while($i <= 4) // qtd vacina adulto = 4
                      { 
                          if ($i == 1) { $vacina = "hepatite";}
                          if ($i == 2) { $vacina = "febre amarela";}
                          if ($i == 3) { $vacina = "triplice viral";}
                          if ($i == 4) { $vacina = "dupla adulto"; }

                            $sql = "INSERT INTO adulto 
                            (Vacina, dose1, dose2, dose3, codigo, user) 
                            VALUES ('$vacina', 0, 0, 0, Null,'$cod_user')";

                            $stmt = $conn->prepare($sql); 
                            $stmt->execute();
                        $i++;
                      } 

                      
                    //senhor
                    $x = 1;
                    while($x <= 6) 
                    { 
                        if ($x == 1) { $vacina = "hepatite";}
                        if ($x == 2) { $vacina = "febre amarela";}
                        if ($x == 3) { $vacina = "dupla adulto 1/2"; }
                        if ($x == 4) { $vacina = "influenza"; }
                        if ($x == 5) { $vacina = "pneumococica"; }
                        if ($x == 6) { $vacina = "segundadupla"; }

                          $sql = "INSERT INTO idoso 
                          (Vacina, dose1, dose2, dose3, codigo, user) 
                          VALUES ('$vacina', 0, 0, 0, Null,'$cod_user')";

                          $stmt = $conn->prepare($sql); 
                          $stmt->execute();
                      $x++;
                    }         
                    
                     //jovem
                     $z = 1;
                     while($z <= 6) 
                     { 
                         if ($z == 1) { $vacina = "hpv";}
                         if ($z == 2) { $vacina = "meningococica";}
                         if ($z == 3) { $vacina = "hepatite";}
                         if ($z == 4) { $vacina = "febre amarela"; }
                         if ($z == 5) { $vacina = "dupla adulto"; }
                         if ($z == 6) { $vacina = "triplice viral"; }
 
                           $sql = "INSERT INTO jovem
                           (Vacina, dose1, dose2, dose3, codigo, user) 
                           VALUES ('$vacina', 0, 0, 0, Null,'$cod_user')";
 
                           $stmt = $conn->prepare($sql); 
                           $stmt->execute();
                       $z++;
                     } 
                    
                      //crianca
                    $a = 1;
                    while($a <= 10) 
                    { 
                        if ($a == 1) { $vacina = "penta 1/2";}
                        if ($a == 2) { $vacina = "poliomielite 1/2";}
                        if ($a == 3) { $vacina = "pneumococica 1/2"; }
                        if ($a == 4) { $vacina = "rotavirus 1/2"; }
                        if ($a == 5) { $vacina = "meningococica 1/2"; }
                        if ($a == 6) { $vacina = "penta 2/2"; }
                        if ($a == 7) { $vacina = "poliomielite 2/2"; }
                        if ($a == 8) { $vacina = "pneumococica 2/2"; }
                        if ($a == 9) { $vacina = "rotavirus 2/2"; }
                        if ($a == 10) { $vacina = "meningococica 2/2"; }
                        
                          $sql = "INSERT INTO crianca
                          (Vacina, dose1, dose2, dose3, codigo, user) 
                          VALUES ('$vacina', 0, 0, 0, Null,'$cod_user')";

                          $stmt = $conn->prepare($sql); 
                          $stmt->execute();
                      $a++;
                    }  

                    //gestante
                    $y = 1;
                    while($y <= 4) 
                    { 
                        if ($y == 1) { $vacina = "hepatite";}
                        if ($y == 2) { $vacina = "dupla adulto";}
                        if ($y == 3) { $vacina = "dtpa";}
                        if ($y == 4) { $vacina = "influenza"; }

                          $sql = "INSERT INTO gestante 
                          (Vacina, dose1, dose2, dose3, codigo, user) 
                          VALUES ('$vacina', 0, 0, 0, Null,'$cod_user')";

                          $stmt = $conn->prepare($sql); 
                          $stmt->execute();
                      $y++;
                    } 





                         
              /*  ALTER TABLE `idoso` ADD FOREIGN KEY (`user`) REFERENCES `usuario`(`Id`);*/
              include("loguin_senha.php");
            }               
  } 

catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
                        }

$conn = null;

?>



