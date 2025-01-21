<?php
session_start();
if (isset($_POST['idioma'])) {
    $idioma = $_POST['idioma'];

    setcookie("idioma", $idioma, time() + 60);
    header("Location: Act1Parte2.php");
}
