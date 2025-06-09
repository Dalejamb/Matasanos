<?php

class MedicoDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $foto;
    private $idEspecialidad;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $idEspecialidad = 0){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
        $this -> idEspecialidad = $idEspecialidad;
    }

    public function consultarPorEspecialidad($idEspecialidad){
        return "select idMedico, nombre, apellido, correo
                from Medico 
                where Especialidad_idEspecialidad = $idEspecialidad
                order by apellido asc";
    }
    
    public function autenticar(){
        return "select idMedico
                from Medico
                where correo = '" . $this -> correo . "' and clave = '" . md5($this -> clave) . "'";
    }
    
    public function consultar(){
        return "select m.nombre, m.apellido, m.correo, m.foto, e.idEspecialidad, e.nombre  
                from Medico m join Especialidad e on m.Especialidad_idEspecialidad = e.idEspecialidad
                where idMedico = '" . $this -> id . "'";
    }
}
