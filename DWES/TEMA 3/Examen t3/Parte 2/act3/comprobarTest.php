<?php /* JUDIT QUIRÓS VIOLERO */

use PHPUnit\Framework\TestCase;

require 'comprobar.php';

class ComprobarTest extends TestCase {

    //Comprueba si lanza la excepcion cunado el numero es impar
    public function testImpar() {
        $comprobar = new Comprobar();
        $result = $comprobar->parImpar(3);
        $this->assertEquals(new InvalidArgumentException, $result, "El número es impar");
    }

    // Comprueba si se duelve true si la funcio es par
    public function testpar() {
        $comprobar = new Comprobar();
        $result = $comprobar->parImpar(2);
        $this->assertEquals(true, $result, "El número es par");
    }
}
?>