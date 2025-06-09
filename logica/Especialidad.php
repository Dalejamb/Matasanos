<?php
require_once("persistencia/Conexion.php");
require_once ("persistencia/EspecialidadDAO.php");


class Especialidad{
    private $id;
    private $nombre;
    
    public function getId(){
        return $this -> id;
    }
    
    public function getNombre(){
        return $this -> nombre;
    }
    
    public function __construct($id=0, $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    
    public function consultar(){
        $conexion = new Conexion();
        $especialidadDAO = new EspecialidadDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($especialidadDAO -> consultar());
        $especialidades = array();
        while(($datos = $conexion -> registro()) != null){
            $especialidad = new Especialidad($datos[0], $datos[1]);
            array_push($especialidades, $especialidad);
        }
        $conexion -> cerrar();
        return $especialidades;
    }
    
    
}



?>