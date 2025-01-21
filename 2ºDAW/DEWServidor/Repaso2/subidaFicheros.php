<?php //subida fichero
/*6. Crea un formulario para subir un fichero al servidor y un script que permita comprobar
que efectivamente se ha subido. Si es así, mostrar el nombre original del fichero, así
como el que temporalmente le asigna el servidor.*/
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES['fichero'])){
        $nomCliente=$_FILES['fichero']["name"];
        $nomServidor=$_FILES['fichero']["tmp_name"];
        echo "Nombre del fichero: ".$nomCliente;
        echo "<br>Nombre del fichero en el servidor: ".$nomServidor;
    } else{
        echo "No se ha subido el fichero";
    }
}
?>
