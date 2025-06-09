<body class="bg-light">
	<?php include("presentacion/encabezado.php")?>

	<nav class="bg-primary text-white py-2">
		<div
			class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
			<div class="fw-bold fs-5 mb-2 mb-md-0">Matasanos EPS</div>
			<div
				class="d-flex flex-column flex-md-row gap-3 text-center text-md-start">
				<a href="#" class="text-white text-decoration-none">Agendar citas</a>
				<a href="#" class="text-white text-decoration-none">Mas información</a>
				<a href="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>" class="text-white text-decoration-none"><i
					class="fas fa-user me-1"></i>Autenticar</a>
			</div>
		</div>
	</nav>


	<div class="container my-5">
		<div class="text-center mb-5">
			<h2 class="text-primary fw-bold">Nuestros Servicios</h2>
			<p class="text-dark opacity-75">Ofrecemos atencion medica integral y
				especializada</p>
		</div>

		<div class="row row-cols-1 row-cols-md-3 g-4">

			<div class="col">
				<div class="card h-100 text-center">
					<div class="card-body">
						<h5 class="card-title">
							<i class="fas fa-check-circle text-success me-2"></i> Asignar
							cita
						</h5>
						<p class="card-text">Programa una nueva cita medica con nuestros
							profesionales de la salud.</p>
						<a href="#" class="btn btn-primary">Agendar</a>
					</div>
				</div>
			</div>


			<div class="col">
				<div class="card h-100 text-center">
					<div class="card-body">
						<h5 class="card-title">
							<i class="fas fa-clock text-warning me-2"></i> Reagendar cita
						</h5>
						<p class="card-text">No puedes asistir? Cambia la fecha y hora de
							tu cita facilmente.</p>
						<a href="#" class="btn btn-primary">Reagendar</a>
					</div>
				</div>
			</div>


			<div class="col">
				<div class="card h-100 text-center">
					<div class="card-body">
						<h5 class="card-title">
							<i class="fas fa-times-circle text-danger me-2"></i> Cancelar
							cita
						</h5>
						<p class="card-text">Cancela tu cita medica con antelacion si no
							puedes asistir.</p>
						<a href="#" class="btn btn-primary">Cancelar</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row mt-3">
			<div class="col">
				<div class="card">
					<div class="card-header"><h4>Especialidades</h4></div>
					<div class="card-body">
        				<?php 
        				$especialidad = new Especialidad();
        				$especialidades = $especialidad -> consultar();
        				echo "<ul>";
        				foreach($especialidades as $esp){
        				    echo "<li>" . $esp -> getNombre();
        				    $medico = new Medico("","","","","","",$esp);
        				    $medicos = $medico -> consultarPorEspecialidad();
        				    if (count($medicos) > 0) {
        				        echo "<ul>";
        				        foreach ($medicos as $med) {
        				            echo "<li>" . $med -> getNombre() . " " . $med -> getApellido() . "</li>";
        				        }
        				        echo "</ul>";
        				    }
        				    echo "</li>";
        				}
        				echo "</ul>";
        				?>			
    				</div>
				</div>
			</div>
		</div>
		
		<div class="row mt-3">
			<div class="col">
				<div class="card">
					<div class="card-header"><h4>Citas</h4></div>
					<div class="card-body">
        				<?php 
        				$cita = new Cita();
        				$citas = $cita -> consultar();
        				echo "<table class='table table-striped table-hover'>";
        				echo "<tr><td>Id</td><td>Fecha</td><td>Hora</td><td>Paciente</td><td>Medico</td><td>Consultorio</td></tr>";
        				foreach($citas as $cit){
        				    echo "<tr>";
        				    echo "<td>" . $cit -> getId() . "</td>";
        				    echo "<td>" . $cit -> getFecha() . "</td>";
        				    echo "<td>" . $cit -> getHora() . "</td>";
        				    echo "<td>" . $cit -> getPaciente() -> getNombre() . " " . $cit -> getPaciente() -> getApellido() . "</td>";
        				    echo "<td>" . $cit -> getMedico() -> getNombre() . " " . $cit -> getMedico() -> getApellido() . "</td>";
        				    echo "<td>" . $cit -> getConsultorio() -> getNombre() . "</td>";
        				    echo "</tr>";
        				}
        				echo "</table>";
        				?>			
    				</div>
				</div>
			</div>
		</div>
	</div>
</body>