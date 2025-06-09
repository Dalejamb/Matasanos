<?php
if($_SESSION["rol"] != "medico"){
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
?>
<body>
<?php 
include ("presentacion/encabezado.php");
include ("presentacion/menuMedico.php");
?>





</body>

