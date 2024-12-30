<?php

class Fruta {
    // Atributos privados
    private $nombre;
    private $sabor;
    private $color;

    // Constructor para inicializar los atributos
    public function __construct($nombre, $sabor, $color) {
        $this->nombre = $nombre;
        $this->sabor = $sabor;
        $this->color = $color;
    }

    // getter y setter
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getSabor() {
        return $this->sabor;
    }

    public function setSabor($sabor) {
        $this->sabor = $sabor;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function __toString() {
        return "Fruta: Nombre = $this->nombre, Sabor = $this->sabor, Color = $this->color";
    }

    // Método para indicar si es apta para hacer zumo
    public function paraZumo() {
        echo "Esta fruta es apta para hacer zumo.\n";
    }
}

$manzana = new Fruta("Manzana", "Dulce", "Rojo");
$naranja = new Fruta("Naranja", "Ácido", "Naranja");

echo $manzana . "\n";

echo "Nombre: " . $naranja->getNombre() . ", Sabor: " . $naranja->getSabor() . "\n";

$naranja->setColor("Amarillo");
echo $naranja . "\n";

$manzana->paraZumo();


// Clase hija 
class Mediterranea extends Fruta {
    public $textura;

    // Constructor 
    public function __construct($nombre, $sabor, $color, $textura) {
        parent::__construct($nombre, $sabor, $color);
        $this->textura = $textura;
    }

    //getter y setter 
    public function getTextura() {
        return $this->textura;
    }

    public function setTextura($textura) {
        $this->textura = $textura;
    }

    public function __toString() {
        return parent::__toString() . ", Textura = $this->textura";
    }
}

$limon = new Mediterranea("Limón", "Ácido", "Verde", "Rugosa");

echo $limon . "\n";

$limon->setColor("Amarillo");
$limon->setTextura("Suave");
echo $limon . "\n";

?>