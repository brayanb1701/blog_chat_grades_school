<?php
require_once "../config/database.php";
?>
<div class="content" style="min-height: 480px">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row" >
                    
                    <div class="col col-md-12">
                      <section class="card" >

                            <div class="card-body">
                             <form method="post" action="?module=forum/group">
                            	<div class="row form-group">

                                          <div class="col-md-4"><label for="ident_profesor" >Profesor: </label>
                                            <select name="ident_profesor" id="ident_profesor" class=" form-control">
                                              <option value="">Seleccione</option>
                                              <?php
                                              $query = mysqli_query($mysqli, "SELECT I.ident_profesor,concat(P.profesor_nombres,' ',P.profesor_apellidos) FROM colegio_profesor_curso_asignatura as I INNER JOIN colegio_profesor as P ON(I.ident_profesor=P.profesor_ident) WHERE codigo_curso='".$_SESSION['curso']."'")
                                                    or die('Error: '.mysqli_error($mysqli));
                                              while($row = mysqli_fetch_array($query)) {
                                                echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                                
                                              }
                                              ?>
                                            </select>
                                          </div>
                                        
                                        <div class="form-actions form-group col-md-3"><button type="submit" class="btn btn-success">Ver mensajes</button></div>
                                 </div>
                                 
                             </form>
                            </div>

                        </section>
                    </div>
                </div>
                
                <?php
                 
                	if( isset($_REQUEST['ident_profesor']) && $_REQUEST['ident_profesor']!=null && $_REQUEST['ident_profesor']!=0){

                ?>
                <div  class="scrollbar" id="style-2" >
                <?php
                		
                    $sql="SELECT M.ident_profesor,concat(P.profesor_nombres,' ',P.profesor_apellidos) as nombres, M.codigo_curso,M.mensaje, M.hora FROM colegio_profesor_curso_msg as M INNER JOIN colegio_profesor as P ON(M.ident_profesor=P.profesor_ident) WHERE M.ident_profesor='".$_REQUEST['ident_profesor']."' AND M.codigo_curso='".$_SESSION['curso']."' AND M.hora>='".date("Y")."-01-01' ORDER BY M.id DESC LIMIT 30  ";
                		$query = mysqli_query($mysqli, $sql)
									or die('Error: '.mysqli_error($mysqli));
						$rows  = mysqli_num_rows($query);
						if ($rows > 0) {
							while($data  = mysqli_fetch_array($query)){
                ?>

                <div class="row">
                    
                    <div class="col col-md-12">
                      <div class="card" >
                      		<div class="card-header"><div class=".col"><h4 class="pb-2 display-5">Profesor(a): <?php echo $data[1]; ?>&nbsp; </h4></div><div class=".col">Grado:<?php echo $_SESSION['curso']; ?>&nbsp; Fecha: <?php echo $data[4]; ?></div>  </div>
                            <div class="card-body">
                            <p class="card-text">
                              	<?php echo $data[3]; ?>
                             </p>
                            </div>

                        </div>
                    </div>
                </div>

                <?php 
               			 }
                             mysqli_free_result($query);
            		}

                else{

                  ?>

                <div class="row" >
                    
                    <div class="col col-md-12">
                      <div class="card" >
                          <div class="card-header"><div class=".col">Mensaje</div>  </div>
                            <div class="card-body">
                            <p class="card-text">
                               No hay mensajes para mostrar.
                             </p>
                            </div>

                        </div>
                    </div>
                </div>

                <?php 
                     }

            		

            	?>
            </div>

              <?php
            		
            	}

             ?>
            </div>
            <!-- .animated -->
        </div>
  <!-- Content Header (Page header) -->
  