<?php


    function verficarUsuario(){
        $userN = $_GET['userN'];
        $userP = $_GET['userP'];
        $connection = new mysqli('localhost','root','','video');
        mysqli_set_charset($connection,'utf8');

        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "SELECT * FROM user_details WHERE username='$userN' and password='$userP'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $resultados = $result->fetch_assoc();//array();

                //while ($registro = $result->fetch_assoc()){
                //    $resultados[] = $registro;
               // }
                header('Content-Type: application/json');
                echo json_encode($resultados);
            }
            else
                echo "";

        }
        $result->free();
        $connection->close();
    }
    verficarUsuario();
?>