	<!-- Inicio de la barra lateral del menú -->
    
	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu home dipilih, menu home aktif
	if ($_GET["module"]=="home") { ?>
		<li>
                <a class="active-menu waves-effect waves-dark" href="?module=home"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
                <a class="waves-effect waves-dark" href="?module=home"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}
	?>
		<li>
			<a href="#" class="waves-effect waves-dark"><i class="fa fa-table"></i> Consultas <span class="fa arrow"></span></a>
			<ul class="nav nav-second-level">
                            <li>
                                <a href="?module=consultas&c=1" class="waves-effect waves-dark">Primer Informe</a>
                            </li>
                            <li>
                                <a href="?module=consultas&c=2" class="waves-effect waves-dark">Segundo Informe</a>
                            </li>
                            <li>
                                <a href="?module=consultas&c=3" class="waves-effect waves-dark">Tercer Informe</a>
                            </li>
                            <li>
                                <a href="?module=consultas&c=4" class="waves-effect waves-dark">Cuarto Informe</a>
                            </li>
                            <li>
                                <a href="?module=consultas&c=5" class="waves-effect waves-dark">Quinto Informe</a>
                            </li>
                            <li>
                                <a href="?module=consultas&c=6" class="waves-effect waves-dark">Sexto Informe</a>
                            </li>
                            <li>
                                <a href="?module=consultas&c=7" class="waves-effect waves-dark">Septimo Informe</a>
                            </li>
            </ul>
	  	</li>
		</ul>
	<!--sidebar menu end-->