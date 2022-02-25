<?php
include("database.php");


//DADOS DO FORMULARIO
$Nome = $_GET["nome"];
$dataNascimento = $_GET["data"];
$Genero = $_GET["genero"];
$Estado = $_GET["estado"];
$Cidade = $_GET["cidade"];
$Telefone = $_GET["telefone"];
$Email = $_GET["email"];
$Senha = $_GET["senha"];
$id = $_GET["escondido"];

echo$Nome;
echo$id;
//PEGANDO DADOS DO FORMULARIO NO BANCO USUARIOS (mybancophp)

try
   {
        
         $sql = "UPDATE usuario SET Nome='$Nome', Data='$dataNascimento', Genero='$Genero', Estado='$Estado', Cidade='$Cidade', Telefone='$Telefone', Email='$Email', Senha='$Senha' WHERE Id=51";
          
         
$stmt = $conn->prepare($sql);

$stmt->execute();

         
         $stmt->execute();
         
          // echo a message to say the UPDATE succeeded
          echo $stmt->rowCount() . "Registro atualizado com sucesso<br>";
}     

    catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        
        }

$conn = null;

header('Location: a_usuario.php');

?>


          