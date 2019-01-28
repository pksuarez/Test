<?php

    $user = "pablo";
    $pass = "suarez";



    if (isset($_POST['nombre']) && !empty($_POST['contra'])) {
        if ($user == $_POST['nombre'] && $pass == $_POST['contra'])
            echo '<h1>Bienvenido: '.$user .'!</h1>';

        else
            echo '<h1>Usuario o contrasena incorrecto</h1>';
    }
    else {
        echo 'Algun campo esta vacio';
    }
?>