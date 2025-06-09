<?php
if($_SESSION["rol"] != "paciente"){
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
?>

<body>
<?php 
include ("presentacion/encabezado.php");
include ("presentacion/menuPaciente.php");
?>





</body>
