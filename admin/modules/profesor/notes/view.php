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
                             <form method="post" action="?module=notes">
                            	<div class="row form-group">

                                          <div class="col-md-4"><label for="grado-materia" >Grado-Materia: </label>
                                            <select name="grado-materia" id="grado-materia" class=" form-control">
                                              <?php
                                              $query = mysqli_query($mysqli, "SELECT I.codigo_curso,I.codigo_asignatura,A.asignatura_nombre  FROM colegio_profesor_curso_asignatura as I INNER JOIN colegio_asignatura as A ON(I.codigo_asignatura=A.asignatura_codigo) WHERE ident_profesor='".$_SESSION['ident']."'")
                                                    or die('Error: '.mysqli_error($mysqli));
                                              while($row = mysqli_fetch_array($query)) {
                                                echo "<option value='".$row[0]."-".$row[1]."'>".$row[0]." - ".$row[2]."</option>";
                                                
                                              }
                                              ?>
                                            </select>
                                          </div>
                                        
                                        	 
                                          <div class="col-md-4"><label for="periodo" >Periodo: </label>
                                            <select name="periodo" id="periodo" class=" form-control">
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4" selected>4</option>
                                            </select>
                                          </div>
                                        
                                        <div class="form-actions form-group col-md-3"><button type="submit" class="btn btn-success">Consultar</button></div>
                                 </div>
                                 
                             </form>
                            </div>

                        </section>
                    </div>
                </div>
                
                <?php
                	if(isset($_POST['periodo']) &&  isset($_POST['grado-materia'])){
                		$valid=explode("-", $_POST['grado-materia']);
                    $sql="SELECT A.alumno_ident,concat(A.alumno_nombres,' ',A.alumno_apellidos) as nombres, N.nota1, N.nota2, N.nota3,N.nota4,N.acum,N.definitiva FROM colegio_notas as N INNER JOIN colegio_alumno as A ON(N.ident_alumno=A.alumno_ident) WHERE periodo='".$_POST['periodo']."' AND codigo_asignatura='".$valid[1]."' AND A.codigo_curso='".$valid[0]."' AND anno=".date("Y");
                    
                		$query = mysqli_query($mysqli, $sql)
									or die('Error: '.mysqli_error($mysqli));
						$rows  = mysqli_num_rows($query);
						if ($rows > 0) {
							
                ?>

                <div class="row" >
                    
                    <div class="col col-md-12">
                      <div class="card" >
                      		<div class="card-header">Grado-Materia:<?php echo $_POST['grado-materia']; ?> &nbsp; Periodo:<?php echo $_POST['periodo']; ?>  </div>
                            <div class="card-body">
                              <form action="registro_notas.php" method="post">
                            	<table class="table table-striped">
                            		<thead>
                            		<tr>
                                  <th scope="col">Id. Estudiante</th>
                                  <th scope="col">Nombre Estudiante</th>
                            			<th scope="col">Nota 1</th>
                            			<th scope="col">Nota 2</th>
                            			<th scope="col">Nota 3</th>
                            			<th scope="col">Nota 4</th>
                            			<th scope="col">Acum.</th>
                            			<th scope="col">Def.</th>
                            		</tr>
                            		</thead>
                             <?php
                             while($data  = mysqli_fetch_array($query)){
                             	echo "<tr>";
                             	echo "<th scope='row'><input type='text' class='form-control' name='ident_alumno[]' value=".$data[0]." readonly></th>";
                              echo '<td>'.$data[1].'</td>';
                        			echo '<td><input type="text" class="form-control" name="nota1[]" required value="'.$data[2].'"></td>';
                              echo '<td><input type="text" class="form-control" name="nota2[]" required value="'.$data[3].'"></td>';
                              echo '<td><input type="text" class="form-control" name="nota3[]" required value="'.$data[4].'"></td>';
                              echo '<td><input type="text" class="form-control" name="nota4[]" required value="'.$data[5].'"></td>';
                              echo '<td><input type="text" class="form-control" name="acum[]" required value="'.$data[6].'"></td>';
                              echo '<td><input type="text" class="form-control" name="definitiva[]" required value="'.$data[7].'"></td>';
                             	echo "</tr>";
                             }
                             mysqli_free_result($query);
                             ?>
                         		</table>
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="asignatura" value='<?php echo $valid[1]; ?>'>
                            <input type="hidden" name="periodo" value="<?php echo $_POST['periodo']; ?>">
                            <div class="form-actions form-group col-md-3"><button type="submit" class="btn btn-success">Registrar</button></div>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>

                <?php 
            		}
            		else{

                    $query = mysqli_query($mysqli, "SELECT A.alumno_ident,concat(A.alumno_nombres,' ',A.alumno_apellidos) FROM colegio_alumno as A  WHERE codigo_curso='".$valid[0]."'")
                  or die('Error: '.mysqli_error($mysqli));
            	?>
            		<div class="row" >
                    
                    <div class="col col-md-12">
                      <div class="card" >
                          <div class="card-header">Grado-Materia:<?php echo $_POST['grado-materia']; ?> &nbsp; Periodo:<?php echo $_POST['periodo']; ?> </div>
                            <div class="card-body">
                              <form action="registro_notas.php" method="post">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th scope="col">Id. Estudiante</th>
                                  <th scope="col">Nombre Estudiante</th>
                                  <th scope="col">Nota 1</th>
                                  <th scope="col">Nota 2</th>
                                  <th scope="col">Nota 3</th>
                                  <th scope="col">Nota 4</th>
                                  <th scope="col">Acum.</th>
                                  <th scope="col">Def.</th>
                                </tr>
                                </thead>
                             <?php
                             while($data  = mysqli_fetch_array($query)){
                              echo "<tr>";
                              echo "<th scope='row'><input type='text' class='form-control' name='ident_alumno[]' value=".$data[0]." readonly></th>";
                              echo '<td>'.$data[1].'</td>';
                              echo '<td><input type="text" class="form-control" name="nota1[]" required value="0"></td>';
                              echo '<td><input type="text" class="form-control" name="nota2[]" required value="0"></td>';
                              echo '<td><input type="text" class="form-control" name="nota3[]" required value="0"></td>';
                              echo '<td><input type="text" class="form-control" name="nota4[]" required value="0"></td>';
                              echo '<td><input type="text" class="form-control" name="acum[]" required value="0"></td>';
                              echo '<td><input type="text" class="form-control" name="definitiva[]" required value="0"></td>';
                              echo "</tr>";
                             }
                             mysqli_free_result($query);
                             ?>
                            </table>
                            <input type="hidden" name="action" value="insert">
                            <input type="hidden" name="asignatura" value='<?php echo $valid[1]; ?>'>
                            <input type="hidden" name="periodo" value="<?php echo $_POST['periodo']; ?>">
                            <div class="form-actions form-group col-md-3"><button type="submit" class="btn btn-success">Registrar</button></div>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>

            	<?php
            		}
            	}

              if(isset($_GET['result'])){
                 ?>
                 <div class="row" >
                    
                    <div class="col col-md-12">
                      <section class="card" >

                            <div class="card-body">
                              <p><?php  if($_GET['result']) echo "Se resgistraron las notas exitosamente";
                              else echo "Ha ocurrido un error";
                              ?> </p>
                            </div>

                        </section>
                    </div>
                </div>
              <?php
              }
              ?>
            </div>
            <!-- .animated -->
        </div>
  <!-- Content Header (Page header) -->
  