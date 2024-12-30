<?php
/*  JUDIT QUIRÓS VIOLERO  */

class Coche {

    //Atributos
    private $marca;
    private $modelo;
    private $color;
    private $velocidad;
    private $encendido;

    //Constructor
    public function __construct($marca, $modelo, $color, $velocidad) {
        $this->marca =$marca;
        $this->modelo =$modelo; 
        $this->color =$color;
        $this->velocidad =$velocidad;
        $this->encendido= false;

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

    public function arrancar(){
        $mensaje= "";
        if(!$this->encendido){
            $this->encendido= true;
            $mensaje = "El coche de la marca ".$this->marca.", modelo ".$this->modelo." se encuentra en marcha.\n";
        } else {
           $mensaje= "El coche ya estaba arrancado.";
        }
        return $mensaje;
    }

    public function parar(){
        $mensaje= "";
        if($this->encendido){
            $this->encendido= false;
            $mensaje = "El coche de la marca ".$this->marca.", modelo ".$this->modelo." se encuentra apagado\n";
        } else {
            $mensaje = "El coche ya estaba apagado.";
        }
        return $mensaje;
    }

}


$coche1 = new Coche ("Nissan", "X-Trail", "Blanco", 120);
echo $coche1;

echo $coche1->arrancar();  //Arranca el coche si está apagado
echo $coche1->parar();   // Apaga el coche si esta arrancado


?>