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


class Berlina extends Coche {

    //Atributos
    private $plazas;

    //Constructor
    public function __construct($marca, $modelo, $color, $velocidad, $plazas) {
        parent::__construct($marca, $modelo, $color, $velocidad);
        $this->plazas;

    }

    // Getters y Setters
    public function getPlazas() {
        return $this->plazas;
    }

    public function setPlazas($plazas) {
        $this->plazas = $plazas;
    }


    //Metodos
    public function __toString(){
        return "Coche: ".$this->getMarca()." ".$this->getModelo()."\n"."Color: ".$this->getColor()."\n"."Velocidad: ".$this->getVelocidad()."\n"."Plazas: ".$this->plazas."\n\n";
    }
}


$berlina = new Berlina ("asdasd", "sdsdaas", "rojo", 200, 5 );
echo $berlina;

//  FALTAN EL 3.2 Y 3.3


?>