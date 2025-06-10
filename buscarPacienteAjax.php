<?php 
require("logica/Persona.php");
require("logica/Paciente.php");

$filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
$palabras = array_filter(array_map('trim', explode(" ", $filtro)));
$paciente = new Paciente();
$pacientes = $paciente->buscar($palabras);

if(count($pacientes) > 0){
    echo "<table class='table table-striped table-hover mt-3'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Correo</th></tr>";
    foreach($pacientes as $pac){
        $nombre = $pac->getNombre();
        $apellido = $pac->getApellido();
        //$correo = $pac->getCorreo();
        
        $coincidencias = [];
        foreach ($palabras as $p) {
            if ($p === '') continue;
            preg_match_all("/".preg_quote($p, "/")."/i", strtolower($nombre), $res, PREG_OFFSET_CAPTURE);
            foreach ($res[0] as $coincidencia) {
                $coincidencias['nombre'][] = [$coincidencia[1], $coincidencia[1] + strlen($p)];
            }
            preg_match_all("/".preg_quote($p, "/")."/i", strtolower($apellido), $res, PREG_OFFSET_CAPTURE);
            foreach ($res[0] as $coincidencia) {
                $coincidencias['apellido'][] = [$coincidencia[1], $coincidencia[1] + strlen($p)];
            }
            /*preg_match_all("/".preg_quote($p, "/")."/i", strtolower($correo), $res, PREG_OFFSET_CAPTURE);
            foreach ($res[0] as $coincidencia) {
                $coincidencias['correo'][] = [$coincidencia[1], $coincidencia[1] + strlen($p)];
            }*/
        }

        foreach (['nombre', 'apellido'/*, 'correo'*/] as $campo) {
            if (!isset($coincidencias[$campo])) continue;
            usort($coincidencias[$campo], fn($a, $b) => $a[0] <=> $b[0]);
            $unificados = [];
            foreach ($coincidencias[$campo] as $c) {
                if (empty($unificados)) {
                    $unificados[] = $c;
                } else {
                    $last = &$unificados[count($unificados) - 1];
                    if ($c[0] <= $last[1]) {
                        $last[1] = max($last[1], $c[1]);
                    } else {
                        $unificados[] = $c;
                    }
                }
            }
            foreach (array_reverse($unificados) as [$ini, $fin]) {
                ${$campo} = substr(${$campo}, 0, $ini) . "<strong>" . substr(${$campo}, $ini, $fin - $ini) . "</strong>" . substr(${$campo}, $fin);
            }
        }

        echo "<tr>";
        echo "<td>" . $pac->getId() . "</td>";
        echo "<td>$nombre</td>";
        echo "<td>$apellido</td>";
        echo "<td>" . $pac->getCorreo() . "</td>";
        //echo "<td>$correo</td>";
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "<div class='alert alert-danger mt-3' role='alert'>No hay resultados</div>";
}
?>




