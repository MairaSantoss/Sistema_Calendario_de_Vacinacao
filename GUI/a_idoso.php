<?php
include("verificarSessao.php");
include("database.php");
?>

<index class="html"></index>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Idoso</title>
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
                                        echo  $_SESSION["loguin"];  
                                   ?>
                        </span></h6>
                 </div>


            <br>   
            <br>   

     
 
                 <div style="margin-top: 7px;"class="col-6 col-lg-6" >
                    <section>    
                        <nav>   
                            <select class="h-auto p-1" onchange="location = this.value" >              
                                
                                <option value="a_crianca.php"  >Criança</option>  
                                <option value="a_jovem.php" > Jovem</option>  
                                <option  value="a_adulto.php">Adulto</option>  
                                <option value="a_idoso.php" selected >Senhor(a)</option>       
                                <option value="a_gestante.php" >Gestante</option>           
                                <option value="a_usuario.php"> Minhas Vacinas</option>               
                            </select>            
                        </nav> 
                    </section>
                </div>

                <div style="margin-bottom: 1px;" class="col-6 col-lg-4">
                    <?php
                    include("navbar.php");
                    ?>
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
                    
                                    $stmt = $conn->prepare("SELECT Vacina, user, codigo, dose1, dose2, dose3 FROM idoso"); 
                                    $stmt->execute();

                                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                                    $hepa1 = "";
                                    $hepa2 = "";
                                    $hepa3 = "";                   
                                    $febre1  = "";
                                    $dupla1 = "";
                                    $dupla2 = "";
                                    $influenza = "";
                                    $pneumococica1 = "";
                                    $pneumococica2= "";
                                    $duplaAdulto = "";
                                    
                                    foreach($stmt->fetchAll() as $k=>$v) 
                                        { 
                                            if ($v["Vacina"] == "hepatite" && $v["user"] == $cod_user )    
                                            {          
                                                if ( 1 == $v["dose1"]) { $hepa1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $hepa2 = "checked";  }
                                                if ( 1 == $v["dose3"]) { $hepa3 = "checked";  }
                                            }  

                                            if ($v["Vacina"] == "febre amarela" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $febre1 = "checked";  }
                                            } 

                                            if ($v["Vacina"] == "dupla adulto 1/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $dupla1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $dupla2 = "checked";  }
                                            } 

                                            if ($v["Vacina"] == "influenza" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $influenza = "checked";  }
                                            }                         
                                            
                                            if ($v["Vacina"] == "pneumococica" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $pneumococica1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $pneumococica2 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "segundadupla" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $duplaAdulto = "checked";  }
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

<form action="vacinaIdoso.php" method="post">   
  
       <div class="col-xs-1 text-center">
            <div class="container  col-12 col-sm-12"  style= "width:600px;">
                 <div class=" row">       
                    <div class="col-12 col-sm-12">   
                        <br>                                                                                       
                        <h5 style="color:rgb(170, 189, 189);">(60 ANOS)</h5>    
                        <br>                
                    </div>                               
                </div>
            </div>
        </div>
       

       <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
                <div class="container col-12 col-sm-12">
                    <label class="p-3 rounded  text-center" style=" width: 165px; background-color: #f69f5a;">Hepatite B</label>    
        
                    <label class="p-3 mb-2  rounded" style="background-color: #f69f5a; margin-left:10px;" for="senhor_hepatite_1"> 1° </label>
                    <input type="checkbox" id="senhor_hepatite_1" name="senhor_hepatite_1" <?php echo $hepa1; ?>>     
                    
            
                    <label class="p-3 mb-2  rounded" style="background-color: #f69f5a" for="senhor_hepatite_2"> 2° </label>
                    <input type="checkbox" id="senhor_hepatite_2" name="senhor_hepatite_2" <?php echo $hepa2; ?>>
            
                    <label class="p-3 mb-2 rounded" style="background-color: #f69f5a" for="senhor_hepatite_1"> 3° </label>
                    <input type="checkbox" id="senhor_hepatite_3" name="senhor_hepatite_3" <?php echo $hepa3; ?>>  
                    
                    <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
                </div>                                     
            </div>  
        </div>    


      
        <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
                <div class="container col-12 col-sm-12">
                    <label class="p-3 rounded text-center" style=" width: 165px; background-color: #f4eb49;">Febre Amarela</label>    
        
                    <label class="p-3 mb-2  rounded" style="background-color: #f4eb49; margin-left:10px;" for="senhor_febreamarela_1"> 1° </label>
                    <input type="checkbox" id="senhor_febreamarela_1" name="senhor_febreamarela_1" <?php echo $febre1; ?>>      
                        
                    <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
                </div>  
            </div>    
        </div>



            
        <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
                <div class="container col-12 col-sm-12">
                    <label class="p-3 rounded text-center" style=" width: 165px; background-color: #00c8f8;">Dupla Adulto</label>    
    
                    <label class="p-3 mb-2  rounded" style="background-color:#00c8f8; margin-left:10px;" for="senhor_duplaadulto_1"> 1° </label>
                    <input type="checkbox" id="senhor_duplaadulto_1" name="senhor_duplaadulto_1" <?php echo $dupla1; ?>>   
                    
                    <label class="p-3 mb-2  rounded" style="background-color:#00c8f8; margin-left:10px;" for="senhor_duplaadulto_2"> 2° </label>
                    <input type="checkbox" id="senhor_duplaadulto_2" name="senhor_duplaadulto_2" <?php echo $dupla2; ?>> 
                    
                    <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
                </div>  
            </div>    
        </div>    


        <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
                <div class="container col-12 col-sm-12">
                    <label class="p-3 rounded text-center" style=" width: 165px; background-color:  #a45eb9;">Influenza</label>    
    
                    <label class="p-3 mb-2  rounded" style="background-color:#a45eb9; margin-left:10px;" for="senhor_influenza_1"> 1° </label>
                    <input type="checkbox" id="senhor_influenza_1" name="senhor_influenza_1" <?php echo $influenza; ?>>   
                    
                    <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
                </div>  
            </div>    
        </div>    
            

        <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
                <div class="container col-12 col-sm-12">
                <label class="p-3 rounded text-center" style=" width: 165px; background-color: #FA8072;">Pneumocócica</label>    
                <label class="p-3 mb-2  rounded" style="background-color: #FA8072; margin-left:10px;" for="senhor_pneumocócica_1">1°</label>
                <input type="checkbox" id="senhor_pneumocócica_1" name="senhor_pneumocócica_1" <?php echo $pneumococica1; ?>>


                <label class="p-3 mb-2  rounded" style="background-color: #FA8072; margin-left:10px;" for="senhor_pneumocócica_2">2°</label>
                <input type="checkbox" id="senhor_pneumocócica_2" name="senhor_pneumocócica_2" <?php echo $pneumococica2 ?>>
                <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>

                
                </div>  
            </div>    
    </div>


    <div class="col-xs-1 text-center">
            <div class="container  col-12 col-sm-12"  style= "width:600px;">
            <div class=" row">       
                    <div class="col-12 col-sm-12">   
                        <br>                                                                                       
                        <h5 style="color:rgb(170, 189, 189);">(Reforço a cada 10 anos)</h5>    
                        <br>                
                    </div>             
                    
                </div>
            </div>
        </div>


              
        <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
                <div class="container col-12 col-sm-12">
                    <label class="p-3 rounded text-center" style=" width: 165px; background-color: #00c8f8;">Dupla Adulto</label>    
    
                    <label class="p-3 mb-2  rounded" style="background-color:#00c8f8; margin-left:10px;" for="senhor_duplaadulto_dois"> 1° </label>
                    <input type="checkbox" id="senhor_duplaadulto_dois" name="senhor_duplaadulto_dois" <?php echo $duplaAdulto; ?>>   
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
          
          <div class="col-xs-1 text-center">
                <div class="container  col-12 col-sm-12"  style=" width:600px;">
                    <div class=" row">               
                        <div class="col-12 col-sm-12">   
                            <br>                                                                                       
                            <input style="margin-left: 30px" type="submit" value="GRAVAR"  class="btn btn-success" >
                            <br>                
                        </div>                          
                    </div>
                </div>
            </div>

</form>

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