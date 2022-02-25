<?php
include("verificarSessao.php");
include("database.php");
?>

<index class="html"></index>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Recem nascido</title>
		<meta charset="UTF-8">
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>


<style>


</style>
<br>   
<body>

<div class="col-xs-1 text-center">
    <div class="container"  >
        <div class=" row">
             
            <br>   
                <div class="col-12 col-sm-12">                                         
                  <header >                                 
                        <h6 class="text-success"> Bem-Vindo(a)<span> 
                                  <?php
                                        echo  $_SESSION["loguin_email"];
                                   ?>
                        </span></h6>
                 </div>


            <br>   
            <br>   

     

                <div style="margin-top: 7px;"class="col-6 col-lg-6" >
                    <section>    
                        <nav>   
                            <select class="h-auto p-1" onchange="location = this.value" >              
                                <option value="a_recemnascido.php" selected>Recém Nascido</option>  
                                <option value="a_crianca.php"  >Criança</option>  
                                <option value="a_jovem.php" > Jovem</option>  
                                <option  value="a_adulto.php">Adulto</option>  
                                <option value="a_idoso.php" >Senhor(a)</option>       
                                <option value="a_gestante.php" >Gestante</option>                        
                            </select>            
                        </nav> 
                    </section>
                </div>

                <div style="margin-bottom: 1px;" class="col-6 col-lg-4">
                <nav  class="navbar navbar-brand  navbar-expand-lg navbar-light ">
                  
                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"  aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                      <div class="navbar-nav " >
                        <a class="nav-item nav-link" href="#"> Nova vacina </a>
                        <a class="nav-item nav-link" href="formularioalterarcadastro.php">Conta</a>
                        <a class="nav-item nav-link" href="sair.php">Sair</a>
                      </div>
                    </div>
                  </nav>
                </div>
            
                <div class="col-12 col-sm-12" > 
                    <section>
                        <article>
                            <h1 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> Calendario de Vacinação</h1>
                        </article>
                    </section>
                </div>

             

                    </header>


                    <?php
                    $sessao = $_SESSION["loguin_email"];
                try{

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
                    
                                    $stmt = $conn->prepare("SELECT Vacina, user, codigo, dose1, dose2, dose3 FROM recemnascido"); 
                                    $stmt->execute();

                                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                                    $tri1 = "";
                                    $tri2 = "";

                                    foreach($stmt->fetchAll() as $k=>$v) 
                                        { 
                                            
                                            if ($v["Vacina"] == "triplice viral" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $tri1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $tri2 = "checked";  }
                                            }                         
                                    
                                        }               
                                }    
                            
                    catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                                            }
                    $conn = null; 
                    
            ?>
             
             
            <br>
            </div>
        </div>  
    </div>  
    
 


<main class="container rounded col-12 col-sm-12" style="border: 1px solid gainsboro; width:700;">





<div class="col-xs-1 text-center">
    <div class="container  col-12 col-sm-12"  style= "width:600px;">
      <div class=" row">
           
              <div class="col-12 col-sm-12">   
                  <br>                                                                                       
                 <h5 style="color:rgb(170, 189, 189);">(1 MÊS)</h5>    
                 <br>                
             </div>             
            
        </div>
    </div>
    </div>
           
            <div class="container col-12 col-sm-12" style=" width:650px;" >
                <div class="row">                   
                    <div class="container col-12 col-sm-12">
                    <label class="p-3 rounded text-center" style=" width: 165px; background-color: #f69f5a;">Tríplice Viral</label>    
      
                    <label class="p-3 mb-2  rounded" style="background-color: #f69f5a; margin-left:10px;" for="recemnascido_tripliceviral_1"> 1° </label>
                    <input type="checkbox" id="recemnascido_tripliceviral_1" name="recemnascido_tripliceviral_1" <?php echo $tri1; ?>> 
                    
                    <label class="p-3 mb-2  rounded" style="background-color: #f69f5a; margin-left:10px;" for="recemnascido_tripliceviral_2"> 2° </label>
                    <input type="checkbox" id="recemnascido_tripliceviral_2" name="recemnascido_tripliceviral_2" <?php echo $tri2; ?>> 
                      
                    <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
                    </div>  
                </div>    
            </div>    


       
 

     
 
             <br>
                <section>
                    <article class="text-center">
                        <h6 class="text-muted"> <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                          </svg></span> Vacinas do usuário</h6>                       
                    </article>
                </section>
            </div>

          </main>           

 

                <div class="container  col-12 col-sm-12" style="margin-left: 60%;">
                    <div class=" row">           
                        <footer>                         
                            <a class="text-dark" style=" text-decoration: none" 
                            title="Os alunos de ADS te convidam a conhecer 
                            a página da faculdade Fatec de Presidente Prudente - SP" 
                            href="http://fatecpp.edu.br/" target="_blank">
                             <small>&copy; 2021 Fatec Pres. Prudente</small></a>
                        </footer>                         
                    </div>
                </div>
        

</div>
</div>


            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
 
 
 </html>