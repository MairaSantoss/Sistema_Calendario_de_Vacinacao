<?php
include("verificarSessao.php");
include("database.php");
?>

<index class="html"></index>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Criança</title>
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
                                
                                <option value="a_crianca.php" selected>Criança</option>  
                                <option value="a_jovem.php" > Jovem</option>  
                                <option  value="a_adulto.php">Adulto</option>  
                                <option value="a_idoso.php" >Senhor(a)</option>       
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
                        <br></article>
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
                    
                                    $stmt = $conn->prepare("SELECT Vacina, user, codigo, dose1, dose2, dose3 FROM crianca"); 
                                    $stmt->execute();

                                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                                    $penta1 = "";
                                    $poli1 = "";
                                    $pneumococica1 = "";                   
                                    $rota1  = "";
                                    $meningocócica1 = "";
                                    $penta1_1 = "";
                                    $penta1_2 = "";
                                    $poli1_1 = "";
                                    $poli1_2 = "";
                                    $pneumococica1_1 = "";
                                    $pneumococica1_2 = "";
                                    $rota1_1  = "";
                                    $rota1_2  = "";
                                    $meningocócica1_1 = "";
                                    $meningocócica1_2 = "";
                                    foreach($stmt->fetchAll() as $k=>$v) 
                                        { 
                                          
                                            if ($v["Vacina"] == "penta 1/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $penta1 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "poliomielite 1/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $poli1 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "pneumococica 1/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $pneumococica1 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "rotavirus 1/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $rota1 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "meningococica 1/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $meningocócica1 = "checked";  }
                                            } 

                                            if ($v["Vacina"] == "penta 2/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $penta1_1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $penta1_2 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "poliomielite 2/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $poli1_1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $poli1_2 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "pneumococica 2/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $pneumococica1_1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $pneumococica1_2 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "rotavirus 2/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $rota1_1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $rota1_2 = "checked";  }
                                            }

                                            if ($v["Vacina"] == "meningococica 2/2" && $v["user"] == $cod_user )   
                                            {
                                                if ( 1 == $v["dose1"]) { $meningocócica1_1 = "checked";  }
                                                if ( 1 == $v["dose2"]) { $meningocócica1_2 = "checked"; }  
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

    <form action="vacinaCrianca.php" method="post"> 
          
    <div class="col-xs-1 text-center">
    <div class="container  col-12 col-sm-12"  style= "width:600px;">
      <div class=" row">
           
              <div class="col-12 col-sm-12">   
                  <br>                                                                                       
                 <h5 style="color:rgb(170, 189, 189);">(2 MESES)</h5>    
                 <br>                
             </div>             
            
        </div>
    </div>
    </div>

    

        
    <div class="container col-12 col-sm-12" style="width:650px;" >
         <div class="row"> 
              <div class="container col-12 col-sm-12">
              <label class="p-3 rounded  text-center" style=" width: 165px; background-color: #FA8072;">Penta</label>   
          
              <label class="p-3 mb-2  rounded" style="background-color:  #FA8072; margin-left:10px;" for="crianca_penta_1"> 1°</label>
              <input type="checkbox" id="crianca_penta_1" name="crianca_penta_1" <?php echo $penta1; ?>>
              <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
              </div>                                     
            </div>  
    </div>
            
             
    <div class="container col-12 col-sm-12" style="width:650px;" >
          <div class="row">                   
               <div class="container col-12 col-sm-12">
               <label class="p-3 rounded text-center" style=" width: 165px; background-color: #f4eb49;">Poliomielite</label> 
               <label class="p-3 mb-2  rounded" style="background-color: #f4eb49; margin-left:10px;" for="crianca_poliomielite_1"> 1° </label>
               <input type="checkbox" id="crianca_poliomielite_1" name="crianca_poliomielite_1" <?php echo $poli1; ?>>
               <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
               </div>  
          </div>    
    </div>

    <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
                <div class="container col-12 col-sm-12">
                <label class="p-3 rounded text-center" style=" width: 165px; background-color: #00c8f8;">Pneumocócica</label>    
                <label class="p-3 mb-2  rounded" style="background-color: #00c8f8; margin-left:10px;" for="crianca_pneumocócica_1">1°</label>
                <input type="checkbox" id="crianca_pneumocócica_1" name="crianca_pneumocócica_1" <?php echo $pneumococica1 ?>>
                <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
                </div>  
            </div>    
    </div>    

    <div class="container col-12 col-sm-12" style=" width:650px;" >
            <div class="row">                   
                 <div class="container col-12 col-sm-12">
                 <label class="p-3 rounded text-center" style=" width: 165px; background-color: #a45eb9;">Rotavírus</label>  
                 <label class="p-3 mb-2  rounded" style="background-color: #a45eb9; margin-left:10px;" for="crianca_rotavírus_1">1°</label>
                 <input type="checkbox" id="crianca_rotavírus_1" name="crianca_rotavírus_1" <?php echo $rota1; ?>>
                 <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
                 </div>  
            </div>    
    </div>    

    <div class="col-xs-1 text-center">
    <div class="container  col-12 col-sm-12"  style= "width:600px;">
      <div class=" row">
           
              <div class="col-12 col-sm-12">   
                  <br>                                                                                       
                 <h5 style="color:rgb(170, 189, 189);">(3 MESES)</h5>    
                 <br>                
             </div>             
            
        </div>
    </div>
    </div>

    <div class="container col-12 col-sm-12" style="width:650px;" >
         <div class="row"> 

              <div class="container col-12 col-sm-12">
              <label class="p-3 rounded  text-center" style=" width: 165px; background-color: #f69f5a;">Meningocócica</label>
              <label class="p-3 mb-2  rounded" style="background-color: #f69f5a; margin-left:10px;" for="crianca_meningocócica_1">1°</label>
              <input type="checkbox" id="crianca_meningocócica_1" name="crianca_meningocócica_1" <?php echo $meningocócica1; ?>>
              <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
              </div>  
          </div>    
    </div>

            <div class="col-xs-1 text-center">
    <div class="container  col-12 col-sm-12"  style= "width:600px;">
      <div class=" row">
           
              <div class="col-12 col-sm-12">   
                  <br>                                                                                       
                 <h5 style="color:rgb(170, 189, 189);">(4 MESES)</h5>    
                 <br>                
             </div>             
            
        </div>
    </div>
    </div>
            <div class="container col-12 col-sm-12" style="width:650px;" >
         <div class="row"> 
              <div class="container col-12 col-sm-12">
              <label class="p-3 rounded  text-center" style=" width: 165px; background-color:#FA8072;">Penta</label>   
          
              <label class="p-3 mb-2  rounded" style="background-color: #FA8072; margin-left:10px;" for="crianca_penta_11"> 1°</label>
              <input type="checkbox" id="crianca_penta_11" name="crianca_penta_11" <?php echo $penta1_1; ?>>
             

             <label class="p-3 mb-2  rounded" style="background-color:#FA8072" for="crianca_penta_22"> 2°</label>
             <input type="checkbox" id="crianca_penta_22" name="crianca_penta_22" <?php echo $penta1_2; ?>>
             <a class="text-dark" style=" text-decoration: none" href="#"> + Dose</a>
             </div>                                     
            </div>  
            </div>    

            <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
            <div class="container col-12 col-sm-12">
            <label class="p-3 rounded text-center" style=" width: 165px; background-color: #f4eb49;">Poliomielite</label>
            
            <label class="p-3 mb-2  rounded" style="background-color: #f4eb49; margin-left:10px;" for="crianca_poliomielite_11">1°</label>
            <input type="checkbox" id="crianca_poliomielite_11" name="crianca_poliomielite_11" <?php echo $poli1_1 ?>>

            <label class="p-3 mb-2  rounded" style="background-color: #f4eb49; margin-left:10px;" for="crianca_poliomielite_22">2°</label>
            <input type="checkbox" id="crianca_poliomielite_22" name="crianca_poliomielite_22" <?php echo $poli1_2; ?>>
            
            <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
            </div>  
          </div>    
         </div>       

            <div class="container col-12 col-sm-12" style="width:650px;" >
            <div class="row">                   
            <div class="container col-12 col-sm-12">

            <label class="p-3 rounded text-center" style=" width: 165px; background-color:  #00c8f8;">Pneumocócia</label>

            <label class="p-3 mb-2  rounded" style="background-color: #00c8f8; margin-left:10px;" for="crianca_pneumococica_11">1°</label>
            <input type="checkbox" id="crianca_pneumococica_11" name="crianca_pneumococica_11" value="crianca_pneumococica_11" <?php echo $pneumococica1_1; ?>>

            <label class="p-3 mb-2  rounded" style="background-color: #00c8f8; margin-left:10px;" for="crianca_pneumococica_22">2°</label>
            <input type="checkbox" id="crianca_pneumococica_22" name="crianca_pneumococica_22" value="crianca_pneumococica_22" <?php echo $pneumococica1_2; ?>>

            <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
             </div>                                     
            </div>  
            </div> 

            <div class="container col-12 col-sm-12" style=" width:650px;" >
            <div class="row">                   
            <div class="container col-12 col-sm-12">

                 <label class="p-3 rounded text-center" style=" width: 165px; background-color: #a45eb9;">Rotavírus</label>

                 <label class="p-3 mb-2  rounded" style="background-color: #a45eb9; margin-left:10px;" for="crianca_rotavírus_11">1°</label>
                 <input type="checkbox" id="crianca_rotavírus_11" name="crianca_rotavírus_11" <?php echo $rota1_1; ?>>

                <label class="p-3 mb-2  rounded" style="background-color: #a45eb9; margin-left:10px;" for="crianca_rotavírus_22">2°</label>
                <input type="checkbox" id="crianca_rotavírus_22" name="crianca_rotavírus_22" <?php echo $rota1_2; ?>>

            <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
                 </div>  
            </div>    
    </div>    

            <div class="col-xs-1 text-center">
    <div class="container  col-12 col-sm-12"  style=" width:600px;">
      <div class=" row">
           
              <div class="col-12 col-sm-12">   
                  <br>                                                                                       
                 <h5 style="color:rgb(170, 189, 189);">(5 MESES)</h5>    
                 <br>                
             </div>             
            
        </div>
    </div>
    </div>

    <div class="container col-12 col-sm-12" style="width:650px;" >
         <div class="row"> 
              <div class="container col-12 col-sm-12">
              <label class="p-3 rounded  text-center" style=" width: 165px; background-color: #f69f5a;">Meningocócica</label>
              <label class="p-3 mb-2  rounded" style="background-color: #f69f5a; margin-left:10px;" for="crianca_meningocócica_11">1°</label>
            <input type="checkbox" id="crianca_meningocócica_11" name="crianca_meningocócica_11" <?php echo $meningocócica1_1; ?>>

            <label class="p-3 mb-2  rounded" style="background-color: #f69f5a; margin-left:10px;" for="crianca_meningocócica_22">2°</label>
            <input type="checkbox" id="crianca_meningocócica_22" name="crianca_meningocócica_22" <?php echo $meningocócica1_2; ?>> 
            <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
             </div>                                     
            </div>  
            </div> 

        <!--      <div class="col-xs-1 text-center">
    <div class="container  col-12 col-sm-12"  style=" width:600px;">
      <div class=" row">
           
              <div class="col-12 col-sm-12">   
                  <br>                                                                                       
                 <h5 style="color:rgb(170, 189, 189);">(5 MESES)</h5>    
                 <br>                
             </div>             
            
        </div>
    </div>

    <div class="container col-12 col-sm-12" style="width:650px;" >
         <div class="row"> 
              <div class="container col-12 col-sm-12">
              <label class="p-3 rounded  text-center" style=" width: 165px; background-color: #f69f5a;">Meningocócica</label>
              <label class="p-3 mb-2  rounded" style="background-color: #f69f5a; margin-left:10px;" for="crianca_meningocócica_1">1°</label>
            <input type="checkbox" id="crianca_meningocócica_1" name="crianca_meningocócica_1">

            <label class="p-3 mb-2  rounded" style="background-color: #f69f5a; margin-left:10px;" for="crianca_meningocócica_2">2°</label>
            <input type="checkbox" id="crianca_meningocócica_2" name="crianca_meningocócica_2"> 
            <a class="text-dark" style=" text-decoration: none" href="#">+ Dose</a>
             </div>                                     
            </div>  
            </div> 
            
              <Article>
            <h2>(6 MESES)</h2>
            <span class="p-3 mb-2 bg-primary text-white">Penta</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_penta_1"> 1°</label>
            <input type="checkbox" id="crianca_penta_1" name="crianca_penta_1">

            <label class="p-3 mb-2 bg-primary text-white" for="crianca_penta_2">2°</label>
            <input type="checkbox" id="crianca_penta_2" name="crianca_penta_2">

            <label class="p-3 mb-2 bg-primary text-white" for="crianca_penta_3">3°</label>
            <input type="checkbox" id="crianca_penta_3" name="crianca_penta_3">
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Poliomielite</span>
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_poliomielite_1">1°</label>
            <input type="checkbox" id="crianca_poliomielite_1" name="crianca_poliomielite_1"> 

            <label class="p-3 mb-2 bg-primary text-white" for="crianca_poliomielite_2">2°</label>
            <input type="checkbox" id="crianca_poliomielite_2" name="crianca_poliomielite_2"> 

            <label class="p-3 mb-2 bg-primary text-white" for="crianca_poliomielite_3">3°</label>
            <input type="checkbox" id="crianca_poliomielite_3" name="crianca_poliomielite_3"> 
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Influenza</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_influenza_1">1°</label>
            <input type="checkbox" id="crianca_influenza_1" name="crianca_influenza_1"> 

            <label class="p-3 mb-2 bg-primary text-white" for="crianca_influenza_2">2°</label>
            <input type="checkbox" id="crianca_influenza_2" name="crianca_influenza_2"> 
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <h2>(9 MESES)</h2>
            <span class="p-3 mb-2 bg-primary text-white">Febre amarela</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_febreamarela_1">1°</label>
            <input type="checkbox" id="crianca_febreamarela_1" name="crianca_febreamarela_1"> 
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <h2>(12 MESES)</h2>
            <span class="p-3 mb-2 bg-primary text-white">Tríplice Viral</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_trípliceviral_1">1°</label>
            <input type="checkbox" id="crianca_trípliceviral_1" name="crianca_trípliceviral_1">
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Pneumocócica</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_pneumocócica_1">1°</label>
            <input type="checkbox" id="crianca_pneumocócica_1" name="crianca_pneumocócica_1">
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Meningocócica</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_meningocócica_1">1°</label>
            <input type="checkbox" id="crianca_meningocócica_1" name="crianca_meningocócica_1">
            <h4>+ Dose</h4>
             </Article>

            <Article>
            <h2>(15 MESES)</h2>
            <span class="p-3 mb-2 bg-primary text-white">DTP</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_dtp_1">1°</label>
            <input type="checkbox" id="crianca_dtp_1" name="crianca_dtp_1">
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Oral Poliomielite</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_oralpoliomielite_1">1°</label>
            <input type="checkbox" id="crianca_oralpoliomielite_1" name="crianca_oralpoliomielite_1"> 
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Hepatite A</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_hepatitea_1">1°</label>
            <input type="checkbox" id="crianca_hepatitea_1" name="crianca_hepatitea_1">
            <h4>+ Dose</h4>
             </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Tríplice Viral</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_trípliceviral_1">1°</label>
            <input type="checkbox" id="crianca_trípliceviral_1" name="crianca_trípliceviral_1">
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_trípliceviral_2">2°</label>
            <input type="checkbox" id="crianca_trípliceviral_2" name="crianca_trípliceviral_2">
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Varicela</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_varicela_1">1°</label>
            <input type="checkbox" id="crianca_varicela_1" name="crianca_varicela_1">
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <h2>(4 ANOS)</h2>
            <span class="p-3 mb-2 bg-primary text-white">DTP</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_dtp_1">1°</label>
            <input type="checkbox" id="crianca_dtp_1" name="crianca_dtp_1">
            <h4>+ Dose</h4>
            </Article>
            
            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Oral Poliomielite</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_oralpoliomielite_1">1°</label>
            <input type="checkbox" id="crianca_oralpoliomielite_1" name="crianca_oralpoliomielite_1"> 
            <h4>+ Dose</h4>
            </Article>

            <Article>
            <span class="p-3 mb-2 bg-primary text-white">Varicela Atenuada</span> 
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_varicelaatenuada_1">1°</label>
            <input type="checkbox" id="crianca_varicelaatenuada_1" name="crianca_varicelaatenuada_1">
            <label class="p-3 mb-2 bg-primary text-white" for="crianca_varicelaatenuada_2">2°</label>
            <input type="checkbox" id="crianca_varicelaatenuada_2" name="crianca_varicelaatenuada_2">
            <h4>+ Dose</h4>
            </Article>-->

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