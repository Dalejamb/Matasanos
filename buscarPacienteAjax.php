<?php 
require("logica/Persona.php");
require("logica/Paciente.php");

$filtro = $_GET["filtro"];
$paciente = new Paciente();
$pacientes = $paciente->buscar($filtro);
$palabras = array_filter(explode(" ", $filtro));

if(count($pacientes) > 0){
    echo "<table class='table table-striped table-hover mt-3'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Correo</th></tr>";
    foreach($pacientes as $pac){
        $nombre = $pac->getNombre();
        $apellido = $pac->getApellido();
        //$correo = $pac->getCorreo();
        
        $matches = [];
        foreach ($palabras as $p) {
            if ($p === '') continue;
            preg_match_all("/".preg_quote($p, "/")."/i", strtolower($nombre), $res, PREG_OFFSET_CAPTURE);
            foreach ($res[0] as $match) {
                $matches['nombre'][] = [$match[1], $match[1] + strlen($p)];
            }
            preg_match_all("/".preg_quote($p, "/")."/i", strtolower($apellido), $res, PREG_OFFSET_CAPTURE);
            foreach ($res[0] as $match) {
                $matches['apellido'][] = [$match[1], $match[1] + strlen($p)];
            }
            /*preg_match_all("/".preg_quote($p, "/")."/i", strtolower($correo), $res, PREG_OFFSET_CAPTURE);
            foreach ($res[0] as $match) {
                $matches['correo'][] = [$match[1], $match[1] + strlen($p)];
            }*/
        }

        foreach (['nombre', 'apellido'/*, 'correo'*/] as $campo) {
            if (!isset($matches[$campo])) continue;
            usort($matches[$campo], fn($a, $b) => $a[0] <=> $b[0]);
            $unificados = [];
            foreach ($matches[$campo] as $m) {
                if (empty($unificados)) {
                    $unificados[] = $m;
                } else {
                    $last = &$unificados[count($unificados) - 1];
                    if ($m[0] <= $last[1]) {
                        $last[1] = max($last[1], $m[1]);
                    } else {
                        $unificados[] = $m;
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




