<?php
//Claudia Ledoldis Patón
/* 3. Modifica el bucle anteior para que muestre 1, 2, 5.*/

for ($a=1; $a<=5; $a++){
    if ($a==3 || $a==4){
        continue;
    }
    echo $a.",";
}
?>