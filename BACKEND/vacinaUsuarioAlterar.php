<!DOCTYPE html>
<html lang="pt-br">
   <head>
    <title>formulariocadastro</title> 
    <meta charset="utf-8"> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head> 

   <style>

        body {
        text-align: center;     
        margin-top: 200px ;

        }


        form {
          display: inline-block;
          margin-left: auto;
          margin-right: auto;
          text-align: left;
         }
   </style>

   <body>



<?php 

include("verificarSessao.php");
include("database.php");

$cod_vacina = $_GET['nome'];

try {
      
        $stmt = $conn->prepare("SELECT cod, nome, qtdDose, ano, cor FROM cadastroadulto"); 
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach($stmt->fetchAll() as $k=>$v) 
              { 
                  if ($v["cod"] == $cod_vacina )    
                      {             
                      $cod =  $v["cod"];
                      $nome = $v["nome"];
                      $dose = $v["qtdDose"];
                      $ano =  $v["ano"];
           

                      }  
                }   
           
                                    

    }
  
                catch(PDOException $e) {
                  echo $sql . "<br>" . $e->getMessage();
                            }
                     $conn = null;
                     
        
             ?>
         
    <body >

    <main class="container rounded col-12 col-sm-12"> 
    
          <form action = "recebeAlterarVacina.php" method="GET"> 

          <div class="col-xs-1 text-center">
            <div class="container  col-12 col-sm-12"  style=" width:600px;">
                <div class=" row">               
                    <div class="col-12 col-sm-12"> 
                    <h4><b> Alterar Vacina</b></h4>
                    <br>
                    </div>                          
                </div>
            </div>
        </div>
          
          <div class="col-xs-1 text-center">
            <div class="container  col-12 col-sm-12"  style=" width:600px;">
                <div class=" row">               
                    <div class="col-12 col-sm-12">   
                    <label for="nome"> <p>Nome da vacina:<p></label>
              <input class="h-30 d-inline-block" type="text"  class="form-control" id="<?php echo $cod;?>" name="nome" maxlength="17"  value=" <?php echo $nome; ?>" required>
              <br>                
                    </div>                          
                </div>
            </div>
        </div>
              
        <div class="col-xs-1 text-center">
            <div class="container  col-12 col-sm-12"  style=" width:600px;">
                <div class=" row">               
                    <div class="col-12 col-sm-12">   
                    <label for="ano"><p>Ano Atual:<p></label>
              <input  class="h-30 d-inline-block"  type="text" class="form-control" id="ano" value="<?php echo $ano;?>" name="ano" min="4" max="4" required>
              <br>
               
                    </div>                          
                </div>
            </div>
        </div>

        <div class="col-xs-1 text-center">
            <div class="container  col-12 col-sm-12"  style=" width:600px;">
                <div class=" row">               
                    <div class="col-12 col-sm-12">   
                    <label for="dose"><p>Quantidade de dose:<p></label> 
              <input class="h-30 d-inline-block"  type="number" class="form-control" id="dose " name="dose" min="1" max="6" required value="<?php echo $dose;?>" /></label>
              <br>
                    </div>                          
                </div>
            </div>
        </div>
              
        <div class="col-xs-1 text-center">
            <div class="container  col-12 col-sm-12"  style=" width:600px;">
                <div class=" row">               
                    <div class="col-12 col-sm-12">   
                    <label for="cor"><p>Cor:<p></label>
              <input class="h-30 d-inline-block"   type="color" class="form-control" id="cor" name="cor" required/>
                    </div>                          
                </div>
            </div>
        </div>
             
        <div class="col-xs-1 text-center">
            <div class="container  col-12 col-sm-12"  style=" width:600px;">
                <div class=" row">               
                    <div class="col-12 col-sm-12">   
                    <button  class="btn btn-info" type="cancel" onclick="window.location='a_usuario.php';return false;">Cancelar</button>
                      <input  type="submit" value="Alterar"   class="btn btn-warning" >
                      <input type=hidden name=escondido value="<?php echo $cod_vacina; ?>">
                       </form>

                       
                      </form>   

                    </div>                          
                </div>
            </div>
        </div>
          
    </main>

   </body>

                                           <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
             
</body>
 
 
</html>

