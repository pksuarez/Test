<?php

    $connection = new mysqli('localhost','root','','world');

    if ($connection->connect_error)
        echo '<h1>Error de coneccion</h1>';


    else{

        $query = 'SELECT name FROM city WHERE name LIKE "%burg"';
        $result = $connection->query($query);

        if ($result->num_rows > 0){
           echo 'Se han econtrado '.$result->num_rows.' ciudades <br>';
            foreach($result as $key => $registro) {
                foreach ($registro as $llave => $valor) {
                    echo  $valor . "<br>";
                }
            }
        }

        $query = 'SELECT name, population FROM city ORDER BY population DESC LIMIT 25';
        $result = $connection->query($query);

        if ($result->num_rows > 0){
            echo '<br>Se han econtrado '.$result->num_rows.' ciudades <br>';
            foreach($result as $key => $registro) {
                foreach ($registro as $llave => $valor) {
                    echo  $valor . " " ;
                }
                echo '<br>';
            }
        }


        $query = 'SELECT id, name FROM city ORDER BY name DESC LIMIT 10  ';
        $result = $connection->query($query);

        if ($result->num_rows > 0){
            echo '<br>Se han econtrado '.$result->num_rows.' ciudades <br>';
            foreach($result as $key => $registro) {

                foreach ($registro as $llave => $valor) {
                    echo  $valor . " " ;
                }
                echo '<br>';
            }
        }

        else{
            echo "No se encontro nada";
        }

        $connection->close();

    }


?>