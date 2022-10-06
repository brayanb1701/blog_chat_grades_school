<?php
require_once "../config/database.php";
if(isset($_POST["action"])){
	$ident_alumno=($_POST['ident_alumno']);
	$asignatura=$_POST['asignatura'];
	$periodo=$_POST['periodo'];
	$nota1=($_POST['nota1']);
	$nota2=($_POST['nota2']);
	$nota3=($_POST['nota3']);
	$nota4=($_POST['nota4']);
	$acum=($_POST['acum']);
	$definitiva=($_POST['definitiva']);
	if($_POST["action"]=="insert"){
		$flag=true;
		for($i=0; $i<count($ident_alumno); $i++) {
			$sql="INSERT INTO colegio_notas(ident_alumno,codigo_asignatura,anno,periodo,nota1,nota2,nota3,nota4,acum,definitiva) VALUES('".$ident_alumno[$i]."','".$asignatura."','".date("Y")."','".$periodo."','".$nota1[$i]."','".$nota2[$i]."','".$nota3[$i]."','".$nota4[$i]."','".$acum[$i]."','".$definitiva[$i]."')";
			$query = mysqli_query($mysqli, $sql)
								or die('Error: '.mysqli_error($mysqli));
			if(!$query && $flag) $flag=false;
		}
		
		if($flag){
			header("Location: index3.php?module=notes&result=true");
			exit();
		}
		else{
			header("Location: index3.php?module=notes&result=false");
			exit();
		}

	}
	else if($_POST["action"]=="update"){
		$flag2=true;
		for($i=0;$i<count($ident_alumno);$i++) {
			$query = mysqli_query($mysqli, "UPDATE colegio_notas SET nota1='".$nota1[$i]."',nota2='".$nota2[$i]."',nota3='".$nota3[$i]."',nota4='".$nota4[$i]."',acum='".$acum[$i]."',definitiva='".$definitiva[$i]."' WHERE ident_alumno='".$ident_alumno[$i]."' AND codigo_asignatura='".$asignatura."' AND anno='".date("Y")."' AND periodo='".$periodo."' ")
									or die('Error: '.mysqli_error($mysqli));
			if(!$query && $flag2) $flag2=false;
		}
		if($flag2){
			header("Location: index3.php?module=notes&result=true");
			exit();
		}
		else{
			header("Location: index3.php?module=notes&result=false");
			exit();
		}
	}

}
else{
	header("Location: index.php?alert=1");
		exit();
}
?>