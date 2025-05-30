<?php 
//De los planes se almacena un código, los canales que ofrece, el importe y si incluye MG de datos o no. Por defecto se asume que el plan incluye 100 MG.class Plan {
   class Plan {
    private $codigo;
    private $objCanales; // array de objetos Canal
    private $importe;
    private $mgDatos;

    public function __construct($codigo, $objCanales, $importe) {
        $this->codigo = $codigo;
        $this->objCanales = $objCanales; 
        $this->importe = $importe;
      $this->mgDatos = 100;
     }
    // Getters
    public function getCodigo() {
        return $this->codigo;
    }

    public function getObjCanales() {
        return $this->objCanales;
    }

    public function getImporte() {
        return $this->importe;
    }

    public function getMgDatos() {
        return $this->mgDatos;
    }

    // Setters
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setObjCanales($objCanales) {
        $this->objCanales = $objCanales;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
    }

    public function setMgDatos($mgDatos) {
        $this->mgDatos = $mgDatos;
    }

    public function __toString() {
        $cadena = "Código del Plan: {$this->getCodigo()}\n";
        $cadena .= "Importe base: {$this->getImporte()}\n";
        $cadena .= "MG de datos: {$this->getMgDatos()}\n";
        $cadena .= "Canales:\n";
        foreach ($this->objCanales as $canal) {
            $cadena .= "- " . $canal . "\n"; // se espera que Canal tenga __toString()
        }
        return $cadena;
    }
}
?>