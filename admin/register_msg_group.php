<?php
require_once "../config/database.php";
if(isset($_POST["mensaje"])){
	$ident_profesor=($_POST['ident_profesor']);
	$grado_materia=$_POST['grado-materia'];
	$curso=$_POST['curso'];
	$mensaje=$_POST['mensaje'];
		$sql="INSERT INTO colegio_profesor_curso_msg(ident_profesor,codigo_curso,mensaje) VALUES('".$ident_profesor."','".$curso."','".$mensaje."')";
			$query = mysqli_query($mysqli, $sql)
								or die('Error: '.mysqli_error($mysqli));
			if($query){
			 header("Location: index3.php?module=forum/group&result=true&grado-materia=$grado_materia");
			exit();
			}
			else{
				header("Location: index3.php?module='forum/group'&result=false&grado-materia=$grado_materia");
			exit();
			}

}
else{
	header("Location: index.php?alert=1");
		exit();
}
?>