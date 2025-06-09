<?php 
$id = $_SESSION["id"];
$paciente = new Paciente($id);
$paciente -> consultar();
?>
<div class="container">
	<nav class="navbar navbar-expand-lg bg-primary">
		<div class="container">
			<a class="navbar-brand" href="?pid=<?php echo base64_encode("presentacion/sesionPaciente.php")?>"><i class="fa-solid fa-house"></i></a>
			<button class="navbar-toggler" type="button"
				data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item"><a class="nav-link active" aria-current="page"
						href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Link</a></li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false"> Cita </a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/cita/consultarCita.php")?>">Consultar</a></li>
							<li><a class="dropdown-item" href="#">Crear</a></li>
						</ul></li>
					<li class="nav-item"><a class="nav-link disabled"
						aria-disabled="true">Disabled</a></li>
				</ul>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false"> Paciente: <?php echo $paciente -> getNombre() . " " . $paciente -> getApellido() ?> </a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Editar Perfil</a></li>
							<li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/autenticar.php")?>&sesion=false">Cerrar Sesion</a></li>
						</ul></li>
				</ul>
			</div>
		</div>
	</nav>
</div>