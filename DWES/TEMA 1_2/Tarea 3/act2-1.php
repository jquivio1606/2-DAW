<?php
/*  JUDIT QUIRÓS VIOLERO  */

class Coche {

    //Atributos
    private $marca;
    private $modelo;
    private $color;
    private $velocidad;

    //Constructor
    public function __construct($marca, $modelo, $color, $velocidad) {
        $this->marca =$marca;
        $this->modelo =$modelo; 
        $this->color =$color;
        $this->velocidad =$velocidad;

    }

    // Getters y Setters
    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    //Metodos
    public function __toString(){
        return "Coche: ".$this->marca." ".$this->modelo."\n"."Color: ".$this->color."\n"."Velocidad: ".$this->velocidad."\n\n";
    }

}


$coche1 = new Coche ("Nissan", "X-Trail", "Blanco", 120);
echo $coche1;

echo "Velocidad: ".$coche1->getVelocidad()."\n\n";
$coche1->setVelocidad(240);
echo $coche1; 

?>