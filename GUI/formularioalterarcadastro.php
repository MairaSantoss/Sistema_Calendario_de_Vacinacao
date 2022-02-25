
   <?php
include("database.php");
include("verificarSessao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
    <title>formulariocadastro</title> 
    <meta charset="utf-8"> 

  


   </head> 

   <style>

        body {
        text-align: center;     
         
        margin-top: 100px ;

        }


        form {
          display: inline-block;
          margin-left: auto;
          margin-right: auto;
          text-align: left;
         }

         .botao{
          height: 40px; 
          width: 100px;
          border: none;
          border-radius: 5px;}
          
          input{
            height: 25px; 
          }
         
   </style>

   <body>



   <?php

$Email = $_SESSION["loguin_email"]; 
try {
  $stmt = $conn->prepare("SELECT Id, Email, Data, Genero, Cidade, Estado, Nome, Telefone, Senha FROM usuario"); 
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  foreach($stmt->fetchAll() as $k=>$v)
   { 
     if($Email == $v["Email"])
     {
    $id = $v["Id"];
    $nome = $v["Nome"];
    $data = $v["Data"];
    $genero = $v["Genero"]; 
    $estado = $v["Estado"];
    $cidade = $v["Cidade"];
    $telefone =$v["Telefone"];
    $email = $v["Email"];
    $senha = $v["Senha"];
 
   }
  }

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>




<!DOCTYPE html>
<html lang="pt-br">
   <head>
    <title>formularioalterarcadastro</title> 
    <meta charset="utf-8"> 
   </head> 

   <style>
      
      body {
        text-align: center;

        }
        form {
          display: inline-block;
          margin-left: auto;
          margin-right: auto;
          text-align: left;
         }

        

   </style>

    <body>

        <form method="GET" action="recebeAlteracao.php"  onsubmit="return validar()">
            <p><b>Alterar Cadastro</b></p>
            <div class="row">
            <label>Nome Completo: </label><br>
           <input size="30" maxlength="30"  value = "<?php echo $nome;?>" type="text" name="nome" size="40" maxlength="30" required>
           </div>  

            <div class="row">
            <label for="estado">Estado:</label>
            <br><input name="estado" type="text" size="30" maxlength="30"  value = "<?php echo $estado;?>">
            </div>        
     
            <div class="row">
            <label for="cidade">Cidade:</label>
            <br><input name="cidade" size="30" maxlength="30" type="text" value = "<?php echo $cidade;?>">
            </div>
     
            <label>Data de nascimento: <span> <?php echo "   .       .       .        .       .";?></span>      Genero:</label>
                <br>  
               <input value = "<?php echo $data;?>" name="data" type="date" >
               <select  value = "<?php echo $genero;?> style="margin-left: 20px;"  name="genero" >
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
               </select>
               
            <div class="row">
            <label for="telefone">Telefone:</label>
            <br><input  id="telefone" name="telefone" size="30" maxlength="30" type="text" value = "<?php echo $telefone;?>" >
            </div>

            <div class="row">
            <label for="email">Email:</label>
            <br><input name="email" size="30" maxlength="30" type="text" value = "<?php echo $email;?>">
            </div>


            <div class="row">
            <label for="senha" size="30" maxlength="30" for="">Digite nova senha: <br>Mínimo 6 caracteres de letras e números.</label>
     
            <br><input name="senha" size="30" maxlength="30" type="text" value = "<?php echo $senha;?>">
            </div>
     
            <div class="row">
            <label for="senhaconfirme">Confirme sua nova senha:</label>
            <br><input  name="senhaconfirme" size="30" maxlength="30" type="text" value = "<?php echo $senha;?>">
            </div>

            <input type=hidden name=escondido value="<?php echo $id; ?>">
  
            <br>  <button  class="btn btn-info" type="cancel" onclick="window.location='a_usuario.php';return false;">Cancelar</button>
            <input  size="30" maxlength="30" type="submit" name="b1" value="Alterar"><br> 
        </form>
     

        <script src="versenha.js"></script>

     
   </body>

</html>