<?php

    $server;
    $bd;
    $user;
    $pass;

    $admins = array();
    $noAdmins = array();

    function obtenerDatosFormulario(){

        global $server;
        global $bd;
        global $user;
        global $pass;
        if (isset($_GET['server']) && isset($_GET['bd']) &isset($_GET['user']) &isset($_GET['pass'])) {
            $server = $_GET['server'];
            $bd = $_GET['bd'];
            $user = $_GET['user'];
            $pass = $_GET['pass'];
        }
        
    }

    function cargarBaseDatos(){

        global $server;
        global $bd;
        global $user;
        global $pass;
        global $admins;
        global $noAdmins;

        $connection = new mysqli($server,$user,$pass,$bd);

        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else{
            $query = 'SELECT * FROM usuarios';
            $result = $connection->query($query);
            $cantidad_filas = $result->num_rows;

            if ($cantidad_filas>0){
                for ($i=0;$i<$cantidad_filas;$i++){
                    $fila = $result->fetch_array(MYSQLI_ASSOC);
                    $arreglo = array("nombre" => $fila["nombre"],"clave" => $fila["clave"],"acceso" => $fila["acceso"]);
                    if ($fila["acceso"] == 'Admin')
                        $admins[] = $arreglo;

                    else
                        $noAdmins[]=$arreglo;
                }
            }

            else
                echo 'No se encontro nada';

            $result->free();
            $connection->close();

        }
    }


    function enviarDatos(){
        global $admins;
        global $noAdmins;

        session_start();

        $_SESSION['admins'] = $admins;
        $_SESSION['noAdmins'] = $noAdmins;

        header("Location: resultados.php");


    }

    obtenerDatosFormulario();
    cargarBaseDatos();
    enviarDatos();




?>