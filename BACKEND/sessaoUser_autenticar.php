<?php
include("database.php");

//DADOS AUTENTICAÇÃO
$email = $_POST["loguin_email"];
$senha = $_POST["loguin_senha"];
$idade = 18;
$url = null;

if ($idade < 18)
{
   $url = "adulto.php";
}

else{
    
}


  try {
       $stmt = $conn->prepare("SELECT Id, Email, Senha, Nome FROM usuario"); 
       $stmt->execute();

          // comparando dados com os dados do banco

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      $aux = false;
      foreach($stmt->fetchAll() as $k=>$v) 
      { 
        //usuario valido e ?calculo da idade do usuario?
          if ($v["Email"] == $email && $v["Senha"] == $senha )    
              {
              $aux = true;
              $email = $v["Email"];
              $nome = $v["Nome"];
              }
       }

              //iniciar sessao
        if ($aux )    
           {
            if(!isset($_SESSION)) session_start();
            $_SESSION["loguin_email"] = $email;  
            $_SESSION["loguin"] = $nome;                
            header('Location: a_adulto.php');
           }
             // se os dados do usuario nao for true, destruir sessao  
        else
           {
            session_start();
            session_destroy();
            header('Location: loguin_senha.php');
           }
       }


 catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>



