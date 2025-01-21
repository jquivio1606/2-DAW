<?php //cookiescolor
/*1.Crea un script que permita elegir el color de fondo de la web, de forma que la próxima vez
que el usuario acceda a dicho site, la muestre en el color elegido.
La elección de este se realizará en un formulario, en el que tendremos varias opciones (radio
buttons) para elegirlo.
Esta elección será enviada a un archivo php donde se creará una cookie con dicha
información. Una vez creada, se devolverá el flujo de control a la página web (o fichero
php) desde donde se llamó al script, donde se comprobará que la cookie ha sido creada y el
color elegido, que habremos guardado en esta, y cambiará el color del fondo de la web.
Recuerda que si pones en el formulario ‘radio buttons’, hay que marcar uno por defecto, que
en este caso será el de la opción en Español. Esto se hace mediante la propiedad ‘checked’,
por ejemplo: <input type = "radio" name = "verde" value = "5" checked> Esto indica que
este es el que estará marcado.
Esto lo haremos al principio de nuestro script, para que ya aparezca uno marcado.
Igualmente habrá que comprobar si ya lo ha elegido anteriormente, para marcar esta opción
por defecto cuando entremos.*/

if (isset($_POST["color"])){
    $color=$_POST['color'];
    setcookie('color', $color, time()+3600*24);
    echo "Has creado una cookie, ya puedes merendar ";
    header("Location: cookies.php");
}else{
    header("Location: cookies.php");
}
?>