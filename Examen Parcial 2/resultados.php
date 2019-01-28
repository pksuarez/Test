<?php

    session_start();
    $admins = $_SESSION["admins"];
    $noAdmins = $_SESSION["noAdmins"];
    session_unset();
    session_destroy();

    $cant1 = count($admins);
    $cant2 = count($noAdmins);

    echo '<h2 style="text-align: center">Cantidad de administradores encontrados: '.$cant1.'</h2>';
    foreach($admins as $arreglo){
        echo '<h3 style="text-align: center">nombre: '.$arreglo["nombre"].' clave:'. $arreglo["clave"].'</h3><br>';
    }

    echo '<h2 style="text-align: center">Cantidad de no administradores encontrados: '.$cant2.'</h2>';
    foreach($noAdmins as $arreglo){
        echo '<h3 style="text-align: center">nombre: '.$arreglo["nombre"].' clave:'. $arreglo["clave"].'</h3><br>';
    }

?>