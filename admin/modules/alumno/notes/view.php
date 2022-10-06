<div class="content" style="min-height: 480px">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row" >
                    
                    <div class="col col-md-12">
                      <section class="card" >

                            <div class="card-body text-secondary">
                             <form method="post" action="?module=notes">
                            	<div class="row form-group">
                                        
                                        	 <div class="col-2"><label for="periodo" class="col" >Periodo: </label></div>
                                            <div class="col-md-4"><select name="periodo" id="periodo" class=" form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-actions form-group col-md-3"><button type="submit" class="btn btn-success">Mostrar</button></div>
                                 </div>
                                 
                             </form>
                            </div>

                        </section>
                    </div>
                </div>
                
                <?php
                	if(isset($_POST['periodo'])){
                		require_once "../config/database.php";
                		$query = mysqli_query($mysqli, "SELECT A.asignatura_nombre, N.nota1, N.nota2, N.nota3,N.nota4,N.acum,N.definitiva FROM colegio_notas as N INNER JOIN colegio_asignatura as A ON(N.codigo_asignatura=A.asignatura_codigo) WHERE periodo='".$_POST['periodo']."' AND ident_alumno='".$_SESSION['ident']."' AND anno=".date("Y"))
									or die('Error: '.mysqli_error($mysqli));
						$rows  = mysqli_num_rows($query);
						if ($rows > 0) {
							
                ?>

                <div class="row" >
                    
                    <div class="col col-md-12">
                      <div class="card" >
                      		<div class="card-header">Periodo <?php echo $_POST['periodo']; ?> </div>
                            <div class="card-body">
                            	<table class="table table-striped">
                            		<thead>
                            		<tr>
                            			<th scope="col">Materia</th>
                            			<th scope="col">Nota 1</th>
                            			<th scope="col">Nota 2</th>
                            			<th scope="col">Nota 3</th>
                            			<th scope="col">Nota 4</th>
                            			<th scope="col">Acumulativo</th>
                            			<th scope="col">Definitiva</th>
                            		</tr>
                            		</thead>
                             <?php
                             while($data  = mysqli_fetch_array($query)){
                             	echo "<tr>";
                             	echo "<th scope='row'>".$data[0]."</th>";
                             	for($i=1; $i<=6;$i++){
                        			echo '<td>'.$data[$i].'</td>';
                      			}
                             	echo "</tr>";
                             }
                             mysqli_free_result($query);
                             ?>
                         		</table>
                            </div>

                        </div>
                    </div>
                </div>

                <?php 
            		}
            		else{

            	?>
            		<div class="row" >
                    
                    <div class="col col-md-12">
                      <div class="card" >
                      		<div class="card-header">Periodo <?php echo $_POST['periodo']; ?> </div>
                            <div class="card-body">No hay notas para mostrar</div>
                       </div>
                    </div>
                	</div>

            	<?php
            		}
            	}
                 ?>
            </div>
            <!-- .animated -->
        </div>
  <!-- Content Header (Page header) -->
  