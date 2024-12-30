<?php
/*  JUDIT QUIRÓS VIOLERO  */

class Animal {
    //ATRIBUTOS  -> 1.0
    public $nombre;
    public $especie;

    //CONSTRUCTOR  -> 1.1
    public function __construct($nombre, $especie) {
        $this->nombre =$nombre;
        $this->especie =$especie;

    }
    
    // -> 1.2
    public function getNombre() {
        return $this->nombre;
    }
    
    // -> 1.3
    public function __toString(){
        return "Animal: ".$this->nombre."\nEspecie: ".$this->especie."\n";
    }

    // -> 1.4
    public function comportamiento(){
        $rand=rand(0,1);
        switch($rand){
            case 0:
                echo "Comportamiento: Bueno \n\n";
            break;
            
            case 1:
                echo "Comportamiento: Malo \n\n";
            break;
        }
    }


}

// ->  1.5
$animal1 = new Animal ("Bady", "Perro");
$animal2 = new Animal ("Pompón", "Gato");


// -> 1.6
echo $animal1;
$animal1->comportamiento();
echo $animal2; 
$animal2->comportamiento();


// ->  1.7
$animal2->especie = "Conejo";
echo $animal2;
