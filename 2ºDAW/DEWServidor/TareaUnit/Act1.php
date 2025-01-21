<?php
    class calculadora{
        public function suma($num1,$num2){
            return $num1+$num2;
        }
    }
$calc= new Calculadora();
require "vendor/autoload.php";
require "Act1.php";
use PHPunit\Framework\TestCase;
class CalculadoraTest extends TestCase{
    public function testCero(){
        $this->assertEquals(1,Calculadora::factorialEx(0));
    }
    public static function Exception(){
        return Calculadora::factorialEx(-1);
    }
}

?>