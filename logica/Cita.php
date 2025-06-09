<?php
require_once("persistencia/Conexion.php");
require_once ("persistencia/CitaDAO.php");

class Cita{
    private $id;
    private $fecha;
    private $hora;
    private $paciente;
    private $medico;
    private $consultorio;
    
    public function __construct($id="", $fecha="", $hora="", $paciente="", $medico="", $consultorio=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> paciente = $paciente;
        $this -> medico = $medico;
        $this -> consultorio = $consultorio;
    }
    
    public function getId(){
        return $this -> id;
    }
    
    public function getFecha(){
        return $this -> fecha;
    }
    
    public function getHora(){
        return $this -> hora;
    }
    
    public function getPaciente(){
        return $this -> paciente;
    }
    
    public function getMedico(){
        return $this -> medico;
    }
    
    public function getConsultorio(){
        return $this -> consultorio;
    }
    
    public function consultar($rol="", $id=""){
        $conexion = new Conexion();
        $citaDAO = new CitaDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($citaDAO -> consultar($rol, $id));
        $citas = array();
        while(($datos = $conexion -> registro()) != null){
            $paciente = new Paciente($datos[3], $datos[4], $datos[5]);
            $medico = new Medico($datos[6], $datos[7], $datos[8]);
            $consultorio = new Consultorio($datos[9], $datos[10]);            
            $cita = new Cita($datos[0], $datos[1], $datos[2], $paciente, $medico, $consultorio);
            array_push($citas, $cita);
        }
        $conexion -> cerrar();
        return $citas;
    }
    
    
    
}


?>
