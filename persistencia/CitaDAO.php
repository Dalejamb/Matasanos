<?php
class CitaDAO{
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
    
    public function consultar($rol, $id){
        $sentencia = "select c.idCita, c.fecha, c.hora, p.idPaciente, p.nombre, p.apellido, m.idMedico, m.nombre, m.apellido, con.idConsultorio, con.nombre
                from Cita c join Paciente p on c.Paciente_idPaciente = p.idPaciente
                            join Medico m on c.Medico_idMedico = m.idMedico
                            join Consultorio con on c.Consultorio_idConsultorio = con.idConsultorio";    
        if($rol == "medico"){
            $sentencia .= " where m.idMedico = '" . $id . "'"; 
        }else if($rol == "paciente"){
            $sentencia .= " where p.idPaciente = '" . $id . "'";
        }
        return $sentencia;
    }
    
    
    
}


?>
