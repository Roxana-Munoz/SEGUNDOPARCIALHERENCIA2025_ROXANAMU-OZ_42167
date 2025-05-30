<?php
class Cliente {
    private $nombre;
    private $dni;
    private $correo;

    public function __construct($nombre, $dni, $correo) {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->correo = $correo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }
 public function __toString()
    {
       
  
        $cadena = ("\n Nombre: " . $this->getNombre());
       $cadena .= ("\n DNI: " . $this->getDni());
       $cadena .=( "Correo:". $this->getCorreo());
        return $cadena;
    }
}
?>
