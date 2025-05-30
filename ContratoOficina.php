
<?php 
class ContratoOficina extends Contrato {
    private $importe;
    private $canales;
   public function __construct($fechaInicio, $plan, $objCliente,$costo,$importe,$canales){
        
        //$fechaInicio, $plan, $objCliente,$costo
        parent::__construct($fechaInicio, $plan, $objCliente,$costo);
        $this->importe=
        $this->importe= $importe;
        $this->canales= $canales;
    }

//metodo geter
    public function getImporte(){
        return $this->importe;
    }
public function getCanales(){
        return $this->canales;
    }
    //Metodo seter
    public function setImporte($importe){
       $this->importe = $importe ;
    }
 public function setCanales($canales){
       $this->canales= $canales ;
    }
 // Metodo de caracteres (__toString)
    public function __toString()
    {
       
        $cadena = parent::__toString();
        $cadena .= ("\n Importe: " . $this->getImporte());
       $cadena .= ("\n Canales: " . $this->getCanales());
        return $cadena;
    }



    public function calcularImporte() {
        $importeBase = $this->getPlan()->getImporte(); // suponiendo que Plan tiene getImporte()
        $canales = $this->getPlan()->getCanales();     // suponiendo que Plan tiene getCanales()

        $importeTotal = $importeBase;
        foreach ($canales as $canal) {
            $importeTotal += $canal->getImporte(); // suponiendo que Canal tiene getImporte()
        }

        return $importeTotal;
    }
}
?>