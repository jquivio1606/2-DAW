<?php
    class Matematicas{
        /*funcion factorial*/
        public static function factorialEx($num){
            if($num<0){
                throw new InvalidArgumentException("Número negativo");
            }
            $resul=1;
            for($i=2;$i<=$num;$i++){
                $resul=$resul*$i;
            }
            return $resul;
        }
    }

require "vendor/autoload.php";
require "Matematicas.php";
use PHPunit\Framework\TestCase;
class MatematicasTest extends TestCase{
    public function testCero(){
        $this->assertEquals(1,Matematicas::factorialEx(0));
    }
    public static function Exception(){
        return Matematicas::factorialEx(-1);
    }
}