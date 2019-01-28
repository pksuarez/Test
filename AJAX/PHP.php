<?php

function manejarConsulta(){

    $palabra = $_GET['texto'];
    $connection = new mysqli('localhost','root','','dicc');
    mysqli_set_charset($connection,'utf8');

    if ($connection->connect_error)
        echo '<h1>Error de coneccion</h1>';

    else{
        $query = "SELECT * FROM `entries` WHERE word like '%$palabra'";
        $result = $connection->query($query);


        if ($result->num_rows>0){

            $resultados = array();

            while ($registro = $result->fetch_assoc()){
                $resultados[] = $registro;
            }

            header('Content-Type: application/json');
            echo json_encode($resultados);

        }

        else
            echo "no encontrado";

    }


    $result->free();
    $connection->close();

}

manejarConsulta();

?>