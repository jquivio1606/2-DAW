<?php /* PHP UNIT TEST */

use PHPUnit\Framework\TestCase;

require 'Calculadora.php';

class CalculadoraTest extends TestCase {
    public function testSumar() {
        $calculadora = new Calculadora();
        $resultado = $calculadora->sumar(2, 3);
        $this->assertEquals(5, $resultado, "La suma de 2 y 3 debería ser 5");
    }
}
?>