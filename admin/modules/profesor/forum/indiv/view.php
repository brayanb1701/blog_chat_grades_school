<?php
require_once "../config/database.php";
?>

<div class="content" style="min-height: 480px">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row" >
                    
                    <div class="col">
                      <section class="card" >

                            <div class="card-body">
                             <form method="post" action="?module=forum/indiv">
                              <div class="row form-group">

                                          <div class="col"><label for="grado-materia" >Grado-Materia: </label>
                                            <select name="grado-materia" id="grado-materia" class=" form-control">
                                              <option value="">Seleccione</option>
                                              <?php
                                              $query = mysqli_query($mysqli, "SELECT I.codigo_curso,I.codigo_asignatura,A.asignatura_nombre  FROM colegio_profesor_curso_asignatura as I INNER JOIN colegio_asignatura as A ON(I.codigo_asignatura=A.asignatura_codigo) WHERE ident_profesor='".$_SESSION['ident']."'")
                                                    or die('Error: '.mysqli_error($mysqli));
                                              while($row = mysqli_fetch_array($query)) {
                                                echo "<option value='".$row[0]."-".$row[1]."'>".$row[0]." - ".$row[2]."</option>";
                                                
                                              }
                                              ?>
                                            </select><br>
                                            <div class="form-actions form-group"><button type="submit" class="btn btn-success">Ver Estudiantes</button></div>
                                          </div>
                                        
                                        
                                 </div>
                                 
                             </form>
                            </div>

                        </section>
                    </div>
                    <?php
                    if( isset($_REQUEST['grado-materia']) && $_REQUEST['grado-materia']!=null && $_REQUEST['grado-materia']!=0){
                    $valid=explode("-", $_REQUEST['grado-materia']);
                ?>
                  <div class="col">
                      <section class="card" >

                            <div class="card-body">
                             <form method="post" action="?module=forum/indiv">
                              <div class="row form-group">

                                          <div class="col"><label for="alumno_ident" >Estudiante: </label>
                                            <select name="alumno_ident" id="alumno_ident" class=" form-control">
                                              <option value="">Seleccione</option>
                                              <?php
                                              $query = mysqli_query($mysqli, "SELECT alumno_ident,concat(alumno_nombres,' ',alumno_apellidos) as nombres  FROM colegio_alumno WHERE codigo_curso='".$valid[0]."'")
                                                    or die('Error: '.mysqli_error($mysqli));
                                              while($row = mysqli_fetch_array($query)) {
                                                echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                                
                                              }
                                              ?>
                                            </select><br>
                                            <input type="hidden" name="grado-materia" value="<?php echo $_REQUEST['grado-materia']; ?>">
                                            <div class="form-actions form-group"><button type="submit" class="btn btn-success">Ver Mensajes</button></div>
                                          </div>
                                        
                                        
                                 </div>
                                 
                             </form>
                            </div>

                        </section>
                    </div>
                <?php
              }
                ?>
                </div>
                
                <?php
                	if( isset($_REQUEST['grado-materia']) &&  $_REQUEST['grado-materia']!=null && $_REQUEST['grado-materia']!=0 && isset($_REQUEST['alumno_ident'])  &&  $_REQUEST['alumno_ident']!=null && $_REQUEST['alumno_ident']!=0 ){
                		
                  
                ?>
                <script type="text/javascript">
$(function() {


  $('#btnSave').click(function() {
    
    var myReply = document.getElementById("txt").value;
    var value =document.getElementById("vid").value;
    var ident_alumno =document.getElementById("ident_alumno1").value;
        $.ajax ({
                 type :'POST',
                  url: "register.php",
                 data: {postid:value,replied:myReply,ident_alumno:ident_alumno},
               success: function(result) {               
                                            $("#errors1").html(result);
                                          }
               });
      $("#txt").val("");
      
                 });
                  
  });
  


  $(document).ready(function(){
    var optionValue='chart';
     var ident_alumno ='<?php echo $_REQUEST["alumno_ident"]; ?>'
     $.ajax({
          type :'POST',
                  url: "register.php",
                 data: {loadid:optionValue,ident_alumno:ident_alumno},
               success: function(result) {               
                                            $("#errors1").html(result);
                                          }
                });
 
  });
         
</script>
                <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title box-title">Chat con <?php if($row = mysqli_fetch_array(mysqli_query($mysqli,"SELECT concat(alumno_nombres,' ',alumno_apellidos) FROM colegio_alumno WHERE alumno_ident=".$_REQUEST['alumno_ident']))) {
                                  echo $row[0];

                                } ?></h4>
                                <div class="card-content">
                                  
                                    <div class="messenger-box">
                                      <div class="scrollbar" id="style-2">
                                        <ul id="errors1">
                                          
                                            
                                            
                                            
                                     
                                        </ul>
                                         </div>
                                        <div class="send-mgs">

                                            <div class="yourmsg">
                                                <input class="form-control" type="text" name="replied" id="txt">
                                                <input type="hidden" id="vid" name="videoid" value="<?php echo $_SESSION['ident']; ?>">
                                                <input type="hidden" id="ident_alumno1" name="ident_alumno1" value="<?php echo $_REQUEST['alumno_ident']; ?>">
                                            </div>
                                            <button id="btnSave" class="btn msg-send-btn">
                                                <i class="pe-7s-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div><!-- /.messenger-box -->
                                  
                                </div>
                            </div> <!-- /.card-body -->
                        </div><!-- /.card -->
                    </div>

          
               
                <?php 

            	
            		
            	}

             ?>
            </div>
            <!-- .animated -->
        </div>
  <!-- Content Header (Page header) -->
  