<?php
class Empresa {
    private $contratos = []; // colección de contratos
 public function __construct($fechaInicio, $plan, $objCliente,$costo) {
        $this->fechaInicio = $fechaInicio;
        $this->plan = $plan;
       $this->contratos = $contratos;
       
    }
/*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/
    /*************************************************/


    //Obtiene el valor de 
    public function getFechaInicio(){
        return $this->fechaInicio;
    }

   

    //Obtiene el valor de 
    public function getPlan(){
        return $this->plan;
    }
        
    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/
    /*************************************************/
//Setea el valor de 
    public function setFechaInicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }

    //Setea el valor de 
    public function setFechaVencimiemto($fechaVencimiento){
        $this->fechaVencimiento = $fechaVencimiento;
    }

    //Setea el valor de 
    public function setEstado($estado){
        $this->estado = $estado;
    }

    //Setea el valor de 
    public function setPlan($plan){
        $this->plan = $plan;
    }

    //Setea el valor de 
    public function setCosto($costo){
        $this->costo=$costo;
    }

    //Setea el valor de 
    public function setRenueva($renueva){
        $this->renueva =$renueva;
    }

    //Setea el valor de 
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }
 public function __toString() {
        return "Contrato - Cliente:" .$this->getObjCliente()."\n".
               " Plan:" .$this->getPlan()."\n".
               "Estado:". $this->getEstado()."\n".
               "Costo:". $this->getCosto()."\n".
               "Vence: ".$this->getFechaVencimiento()."\n";
    }
    public function buscarContrato($tipoDoc, $numDoc) {
        $buscarContrato=null;
        foreach ($this->ColContratos as $contrato) {
            $cliente = $contrato->getobjCliente(); 
            if ($cliente->getTipoDocumento() === $tipoDoc && $cliente->getNumeroDocumento() === $numDoc) {
                $buscarContrato=$contrato;
            }
        }
        // Si no encontró ningún contrato con ese cliente
        return $buscarContrato;
    }
}


    public function incorporarContrato($plan, $objcliente, $fechaInicio, $fechaVencimiento, $esViaWeb) {
        // Buscar contrato activo previo para este cliente
        $contratoActivo = $this->buscarContratoActivoCliente($objcliente);

        if ($contratoActivo !== null) {
            // Dar de baja el contrato activo previo
            $contratoActivo->darDeBaja();
        }

        // Crear nuevo contrato (puedes adaptar constructor según tu clase Contrato)
        $nuevoContrato = new Contrato($plan, $objcliente, $fechaInicio, $fechaVencimiento, $esViaWeb);

        // Incorporar el nuevo contrato a la colección
        $this->contratos[] = $nuevoContrato;

        return $nuevoContrato;
    }
}


}
