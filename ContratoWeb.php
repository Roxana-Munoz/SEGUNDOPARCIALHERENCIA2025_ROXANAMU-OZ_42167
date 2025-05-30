<?php 
// De un contrato realizado vía web se guarda además el porcentaje de descuento y tiene un cálculo de costo diferente. El importe final de un contrato realizado en la empresa se calcula sobre el importe del plan más los importes parciales de cada uno de los canales que lo forman. Si se trata de un contrato realizado via web al importe del mismo se le aplica un porcentaje de descuento que por defecto es del 10%.
class ContratoWeb extends Contrato {
    private $descuento;

    public function __construct($fechaInicio, $plan, $objCliente) {
        $this->descuento = 10;
        //$fechaInicio, $plan, $objCliente,$costo
        parent::__construct($fechaInicio, $plan, $objCliente,$costo);
    }

//metodo geter
    public function getDescuento(){
        return $this->descuento;
    }

    //Metodo seter
    public function setDescuento($descuento){
       $this->descuento = $descuento; ;
    }

 // Metodo de caracteres (__toString)
    public function __toString()
    {
       
        $cadena = parent::__toString();
        $cadena .= ("\n Descuento: " . $this->getDescuento());
       
        return $cadena;
    }




    public function calcularCosto() {
        return $this->getPlan()->getImporte() * (1 - $this->getDescuento() / 100);
    }
}
?>