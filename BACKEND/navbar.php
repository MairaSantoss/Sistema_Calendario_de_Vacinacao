<style>

 .btn-primary{
     background-color: #87cefa;
}   
.btn-secondary{
     background-color: #5cb85c;
}
body {
     font-style: normal; /*caso queira deixar alterar o estilo da fonte */
         font-size: 1em; /* caso queira alterar o tamanho da fonte */
          font-family: "Helvetica"/* caso queira mudar o tipo de fonte  */
}
</style>
            <nav  class="navbar navbar-brand  navbar-expand-lg navbar-light ">
               <?php
                   
               ?>
                            
                                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"  aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                                    <div class="navbar-nav " >

                             
                                        <!-- Button trigger modal -->
                                        <a  href="#" class="nav-item nav-link" data-toggle="modal" data-target="#exampleModalCenter">
                                         Nova Vacina</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Vacina: </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                       
                                            <div class="modal-body">                                                

                                                <form action = "vacinaUsuario.php" method="POST">  
                                                   
                                                    <label for="nomec"> <p>Nome da vacina:<p></label>
                                                    <input class="h-30 d-inline-block" type="text"  class="form-control" id="nomec" name="nomec" maxlength="17"  value="" required>
                                                    <br>

                                                    <label for="anoc"><p>Ano Atual:<p></label>
                                                    <input  class="h-30 d-inline-block"  type="text" class="form-control" id="anoc" name="anoc" min="4" max="4" required>
                                                    <br>
 
                                                    <label for="dosec"><p>Número de doses:<p></label> 
                                                    <input class="h-30 d-inline-block"  type="number" class="form-control" id="dosec " name="dosec" min="1" max="6" required /></label>
                                                    <br>
                                                    <label for="corc"><p>Cor:<p></label>
                                                    <input class="h-30 d-inline-block"   type="color" class="form-control" id="cor" name="corc" value="arco iris" required/>
                                                    
                                                    
                                                    <div id="sair"> 
                                                    
                                                                                        
                                            
                                            </div>
                                           
                                                        <div class="container"  >
                                                            <div class=" row"> <br>          
                                                                <div class="col-12 col-sm-12"> 
                                                                    <br>
                                                                  <input style="margin-left: 30px" type="submit" value="SALVAR"  class="btn btn-primary" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                            </div>
                                            </div>
                                            </form>
                                            
                                        </div>
                                        </div>
                                                                                
                                    
                                        <div class="dropdown">
                              
                                        <a  href="# " class="nav-item nav-link dropdown text-muted"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Conta
                                        
                                        <div class="dropdown-menu" >
                                            <a href="formularioalterarcadastro.php" class="dropdown-item" >Alterar cadastro</a>
                                            <a href="# "class="dropdown-item">Apagar conta</a>                                    
                                        </div>
                                        </div>
                                        <a class="nav-item nav-link text-muted" href="sair.php">Sair</a>

                                    </div>
                                </div>             
                            </nav>

                          