<?php
require_once("persistencia/Conexion.php");
require_once("logica/Persona.php");
require_once("persistencia/AdminDAO.php");

class Admin extends Persona {

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = ""){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
    }
    
    public function autenticar(){
        $conexion = new Conexion();
        $adminDAO = new AdminDAO("","","", $this -> correo, $this -> clave);
        $conexion -> abrir();
        $conexion -> ejecutar($adminDAO -> autenticar());
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
        $adminDAO = new AdminDAO($this -> id);
        $conexion -> abrir();
        $conexion -> ejecutar($adminDAO -> consultar());
        $datos = $conexion -> registro();
        $this -> nombre = $datos[0];
        $this -> apellido = $datos[1];
        $this -> correo = $datos[2];
        $conexion->cerrar();
    }
}
