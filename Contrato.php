<?php 
/*/  Los contratos tienen una fecha de inicio, la fecha de vencimiento, el plan, un estado (al día, moroso, suspendido, finalizado), un costo, si se renueva o no y una referencia al cliente que adquirió el contrato. De un contrato realizado vía web se guarda además el porcentaje de descuento y tiene un cálculo de costo diferente. El importe final de un contrato realizado en la empresa se calcula sobre el importe del plan más los importes parciales de cada uno de los canales que lo forman. Si se trata de un contrato realizado via web al importe del mismo se le aplica un porcentaje de descuento que por defecto es del 10%.

Un contrato se considera en estado moroso cuando su fecha de vencimiento ha sido superada, en caso de que pasen 10 días al vencimiento el estado cambiará de moroso a suspendido; caso contrario el contrato se encuentra al día. Antes de que un cliente realice un pago se debe verificar su estado.

Cuando un cliente paga su contrato hay que analizar el estado del mismo. Si el contrato está al día, se renovará por un mes más abonando el importe pactado. Si el contrato está en estado moroso, se cobrará una multa que será un incremento del 10% del valor pactado por la cantidad de días en mora, además su estado se actualizará al valor al día y se renovará. Si el estado del contrato es suspendido se cobrará la misma multa de un contrato moroso pero no se permitirá su renovación. Si el estado del contrato es finalizado no se podrá realizar ninguna acción sobre ese contrato, es el ultimo estado en el que se puede encontrar un contrato y que es inmutable (no puede pasar a ningún otro estado). */

class Contrato {
    private $fechaInicio;
    private $fechaVencimiento;
    private $plan;
    private $estado; // al día, moroso, suspendido, finalizado
    private $costo;
    private $renueva;
    private $objCliente;

    public function __construct($fechaInicio, $plan, $objCliente,$costo) {
        $this->fechaInicio = $fechaInicio;
        $this->plan = $plan;
        $this->objCliente = $objCliente;
        $this->estado = "al día";
        $this->renueva = true;
        $this->fechaVencimiento = date('Y-m-d', strtotime('+1 month', strtotime($fechaInicio)));
        $this->costo = $costo;
       
    }


    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/
    /*************************************************/


    //Obtiene el valor de 
    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    //Obtiene el valor de 
    public function getFechaVencimiento(){
        return $this->fechaVencimiento;
    }

    //Obtiene el valor de 
    public function getPlan(){
        return $this->plan;
    }

    //Obtiene el valor de 
    public function getEstado(){
        return $this->estado;
    }

    //Obtiene el valor de 
    public function getCosto(){
        return $this->costo;
    }

    //Obtiene el valor de 
    public function getRenueva(){
        return $this->renueva;
    }

    //Obtiene el valor de 
    public function getObjCliente(){
        return $this->objCliente;
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
   
    public function actualizarEstadoContrato($fechaActual) {
        
       $estadoActualContrato="finalizado";
        if ($fechaActual > $this->getFechaVencimiento()) {
            $diasMora = (strtotime($fechaActual) - strtotime($this->getFechaVencimiento())) / (60 * 60 * 24);

            if ($diasMora > 10) {
             $estadoActualContrato = "suspendido";
            } else {
                $estadoActualContrato = "moroso";
            }
        } else {
           $estadoActualContrato = "al día";
        }
        return $estadoActualContrato;
    }
    //En la clase Contrato Implementar el método calcularImporte que retorna el importe final correspondiente al importe del contrato.
        public function calcularImporte()
        {
       
                return 0;
         }
       

    
    }

   
}