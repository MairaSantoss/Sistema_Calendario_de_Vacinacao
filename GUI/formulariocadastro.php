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





         <form  method="POST" action="gravar_cadastro.php" onsubmit = "return validar()" >
           <h3><b>Cadastro:</b></h3>        

           <div class="row">
           <label>Nome Completo: </label><br>
           <input type="text" name="nome" size="40" maxlength="30" required>
         
           </div>
<br>
          <div class="row">
              <label>Data de nascimento: <span> <?php echo "   .       .       .        .       .";?></span>      Genero:</label>
                <br>  
               <input name="data" type="date" >
               <select  style="margin-left: 20px;"  name="genero" >
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
               </select>
            <br>
          </div>

          <br>
           <div class="row">
           <label>Estado:</label>
            <br><input type="text" name="estado" size="40" maxlength="30" required>
           </div>
            <br>

           <div class="row">
           <label>Cidade:</label>
            <br><input type="text" name="cidade" size="40" maxlength="30" required>
           </div>
            <br>

           <div class="row">
           <label>Telefone:</label>
           <br><input type="text" name="telefone" size="40"  maxlength="30" required>
           </div>

          <br>

           <div class="row">
          <label for="">Email:</label>
          <br><input type="text" name="email" size="40" maxlength="30" required>
           </div>

          <br>

           <div class="row">
            <label for="">Crie uma senha de acesso: <br>Mínimo 6 caracteres de letras e números.</label>
           <br><input type="text" name="senha" id="senha" size="40" maxlength="30" required>
           </div>
           <br>

          <div class="row">
          <label for="">Confirme sua senha</label>
          <br><input type="text" name="confirmesenha" id="confirmesenha" size="40" maxlength="30" required>
          </div>

          <br> <button   style="background-color:#A9A9A9;" class="botao" class="btn btn-info" type="cancel" onclick="window.location='loguin_senha.php';return false;"><b>Cancelar<b></button>
          <input class="botao" style="background-color:#4169E1; margin-left: 100px; color: white;" type="submit" name="b1" value="Salvar"><br>

        </form>

        <script src="versenha.js"></script>

     
   </body>

</html>