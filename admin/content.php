<?php
/* Agrega conexion a la base de datos*/
require_once "../config/database.php";
/* llama a la funcion que contiene los formatos de fecha */
require_once "../config/date_format.php";

//función para comprobar el estado del usuario conectado
// si el usuario no está conectado, cambie a la página de inicio de sesión y envie mensaje en pantalla = 1
if (empty($_SESSION['ident']) && empty($_SESSION['type'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// si el usuario ya ha iniciado sesión, a continuación, ejecutar el script para llamar el contenido del archivo de paginación
else {
	if(isset($_GET['module'])){ 
		// Si el contenido es home llamar la vista correspondiente

		if ($_GET['module'] == 'home') {
			include "modules/home/view.php";
		}

		// Si el contenido es about llamar la vista correspondiente
		elseif ($_GET['module'] == 'forum/group') {
			include "modules/".$_SESSION['type']."/forum/group/view.php";
		}
		// -----------------------------------------------------------------------------
		elseif ($_GET['module'] == 'forum/indiv') {
			include "modules/".$_SESSION['type']."/forum/indiv/view.php";
		}
		// Si el contenido es service llamar la vista correspondiente
		elseif ($_GET['module'] == 'notes') {
			include "modules/".$_SESSION['type']."/notes/view.php";
		}
		// -----------------------------------------------------------------------------
		
	}
	else{
		include "modules/home/view.php";
	}
}
?>