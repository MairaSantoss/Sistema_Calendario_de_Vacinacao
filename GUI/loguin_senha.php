<!DOCTYPE html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Bem Vindo Carteira Vacinação </title>
  </head>

  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
 
<div class="col-xs-1 text-center" style="margin-top: 80px">
    <br>
    <img src="logotipo.png" width="200px" heigth="200px" />
</div>
    <br>
    <br>
  

    
<div class="col-xs-1 text-center">
      <div class="container-fluid">
          <main class="row">
             <div class="col-sm-12 col-12"> 

                <form method="POST" action="sessaoUser_autenticar.php">

                 <label>E-mail:</label><br/>               
                 <input type="text" name="loguin_email" placeholder="name@example.com" size="40" maxlength="30"/><br/><br/>

                 <label>Senha:</label></br><input type="text" name="loguin_senha" placeholder="*  *  *  *  *  *" size="40" maxlength="20"/><br/><br/>
                 
   
                <input type="submit" value="Entrar" class="btn btn-primary" >          
                </form>  
                <br>
             </div>

                <div class="col-sm-12 col-12"> 
                   
                     <form method="POST" action="formulariocadastro.php">
                     <a href="esqueceu_senha.php">Esqueceu sua senha? </a>
                       <input style="margin-left: 30px" type="submit" value="Cadastre-se"  class="btn btn-success" >
                     </form>
                </div>

          </main>  
      </div>
</div>


</body>
</html>