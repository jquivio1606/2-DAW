<?php /* JUDIT QUIRÓS VIOLERO */

// Comprueba si un numero es par o impar, si es par devuleve true, si es impar lanza una excepcion
class Comprobar {
    public function parImpar($a) {
        
        if($a%2 == 0){
            return true;
        } else {
            throw new InvalidArgumentException("El número es impar");
        }
    }
}
?>