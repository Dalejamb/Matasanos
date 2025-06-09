<?php
if($_SESSION["rol"] != "admin"){
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
?>
<body>
<?php 
include ("presentacion/encabezado.php");
include ("presentacion/menuAdmin.php");
?>

<div class="container mt-3">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Buscar Paciente</h4>
		</div>
		<div class="card-body">
			<div class="container">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="filtro" placeholder="Nombre o apellido de paciente" autocomplete="off" />
					</div>
				</div>
			</div>
			<div id="resultados"></div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#filtro").keyup(function(){
		if($("#filtro").val().length > 2){
			var ruta = "buscarPacienteAjax.php?filtro=" + $("#filtro").val().replaceAll(" ", "%20");
			console.log(ruta);
			$("#resultados").load(ruta);
		}
	});
});
</script>
</body>

