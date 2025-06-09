<?php
require_once("persistencia/Conexion.php");
require_once("logica/Persona.php");
require_once("persistencia/PacienteDAO.php");

class Paciente extends Persona {
    private $fechaNacimiento;

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $fechaNacimiento = ""){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this -> fechaNacimiento = $fechaNacimiento;
    }
    
    public function autenticar(){
        $conexion = new Conexion();
        $pacienteDAO = new PacienteDAO("","","", $this -> correo, $this -> clave);
        $conexion -> abrir();
        $conexion -> ejecutar($pacienteDAO -> autenticar());
        if($conexion -> filas() == 1){
            $this -> id = $conexion -> registro()[0];
            $conexion->cerrar();
            return true;
        }else{
            $conexion->cerrar();
            return false;
        }
    }
    
    public function consultar(){
        $conexion = new Conexion();
        $pacienteDAO = new PacienteDAO($this -> id);
        $conexion -> abrir();
        $conexion -> ejecutar($pacienteDAO -> consultar());
        $datos = $conexion -> registro();
        $this -> nombre = $datos[0];
        $this -> apellido = $datos[1];
        $this -> correo = $datos[2];
        $conexion->cerrar();
    }
    
    public function buscar($filtro){
        $conexion = new Conexion();
        $pacienteDAO = new PacienteDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($pacienteDAO -> buscar($filtro));
        $pacientes = array();
        while (($datos = $conexion->registro()) != null) {
            $paciente = new Paciente($datos[0], $datos[1], $datos[2], $datos[3]);
            array_push($pacientes, $paciente);
        }
        $conexion->cerrar();
        return $pacientes;
    }
}
