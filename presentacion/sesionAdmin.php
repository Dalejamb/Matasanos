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





</body>

