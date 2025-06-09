<?php 
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];
?>
<body>
<?php 
include ("presentacion/encabezado.php");
include ("presentacion/menu" . ucfirst($rol) . ".php");
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header"><h4>Citas</h4></div>
				<div class="card-body">
    				<?php 
    				$cita = new Cita();
    				$citas = $cita -> consultar($rol, $id);
    				echo "<table class='table table-striped table-hover'>";
    				echo "<tr><td>Id</td><td>Fecha</td><td>Hora</td></tr>";
    				if($rol != "paciente"){
    				    echo "<td>Paciente</td>";
    				}
    				if($rol != "medico"){
    				    echo "<td>Medico</td>";
    				}
                    echo "<td>Consultorio</td></tr>";
    				foreach($citas as $cit){
    				    echo "<tr>";
    				    echo "<td>" . $cit -> getId() . "</td>";
    				    echo "<td>" . $cit -> getFecha() . "</td>";
    				    echo "<td>" . $cit -> getHora() . "</td>";
    				    if($rol != "paciente"){
        				    echo "<td>" . $cit -> getPaciente() -> getNombre() . " " . $cit -> getPaciente() -> getApellido() . "</td>";
    				    }
    				    if($rol != "medico"){
    				        echo "<td>" . $cit -> getMedico() -> getNombre() . " " . $cit -> getMedico() -> getApellido() . "</td>";
    				    }
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