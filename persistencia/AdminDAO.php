<?php

class AdminDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }

    public function autenticar(){
        return "select idAdmin
                from Admin 
                where correo = '" . $this -> correo . "' and clave = '" . md5($this -> clave) . "'";
    }
    
    public function consultar(){
        return "select nombre, apellido, correo
                from Admin
                where idAdmin = '" . $this -> id . "'";
    }
}
