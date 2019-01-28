<?php

if ($tipo='cargarPizzasOrden')
    obtenerPizzasEnOrden();

function obtenerPizzasEnOrden(){
    $orden = $_GET['orden'];
    $connection = new mysqli('localhost','root','','pizzeria');
    mysqli_set_charset($connection,'utf8');
    if ($connection->connect_error)
        echo '<h1>Error de coneccion</h1>';

    else {
        $query = "SELECT pizza,cantidad,masa FROM `pizzas_x_orden` WHERE  orden='$orden'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $resultados = array();

            while ($registro = $result->fetch_assoc()){
                $resultados[] = $registro;
            }

            header('Content-Type: application/json');
            echo json_encode($resultados);
        }
        else
            echo "";

    }
    $result->free();
    $connection->close();
}

?>