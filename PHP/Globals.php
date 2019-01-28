<?php

    session_start();
    $saludo = "<h1>Hola Mundo</h1>";

    function modificar(){
        $GLOBALS["saludo"] = "<h1>Adios Mundo</h1>";
    }
    modificar();

    $_SESSION['saludo']=$saludo;

    echo $saludo;
    header("Location: Globals2.php");
?>