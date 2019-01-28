<?php


    function manejarRequest(){
        $tipo = $_GET['request'];
        if ($tipo=='registro')
            ingresarUsuario();
        elseif ($tipo=='login')
            verficarUsuario();
        elseif ($tipo=='cargarPizzas')
            obtenerPizzas();
        elseif ($tipo=='cargarIngredientes')
            obtenerIngredientes();
        elseif ($tipo=='cargarMasas')
            obtenerMasas();
        elseif ($tipo=='crearOrden')
            ingresarOrden();
        elseif ($tipo=='agregarProductos')
            insertarPizzasOrden();
        elseif ($tipo='cargarOrdenes')
            obtenerOrdenes();
    }

    function verficarUsuario(){
        session_start();
        $usuario = $_GET['usuario'];
        $password = $_GET['password'];
        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');

        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "SELECT username,nombre FROM `usuarios` WHERE  username='$usuario' and binary password = binary'$password'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $resultados = $result->fetch_assoc();
                //header('Content-Type: application/json');
                //echo json_encode($resultados);
                $_SESSION['nombre']= $resultados['nombre'];
                $_SESSION['usuario']=$usuario;
                echo 'correcto';
            }
            else
                echo "";

        }
        $result->free();
        $connection->close();



    }


    function ingresarUsuario(){

        $nombre = $_GET['nombre'];
        $usuario = $_GET['usuario'];
        $password = $_GET['password'];
        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');

        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "INSERT INTO usuarios VALUES('$usuario','$nombre','$password')";

            if ($connection->query($query)== TRUE)
                echo "insertado con exito";

            else
                echo "error al insertar";

        }
        $connection->close();
    };

    function ingresarOrden(){
        $usuario = $_GET['usuario'];
        $fecha = $_GET['fecha'];
        $id = $_GET['id'];
        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');

        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "INSERT INTO ordenes (id,fecha,cliente) VALUES('$id','$fecha','$usuario')";

            if ($connection->query($query)== TRUE)
                echo "insertado con exito";

            else
                echo "$id $fecha $usuario";

        }
        $connection->close();
    }

    function insertarPizzasOrden(){

        $pizza = $_GET['pizza'];
        $masa = $_GET['masa'];
        $cantidad = $_GET['cantidad'];
        $orden = $_GET['orden'];

        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');

        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "INSERT INTO pizzas_x_orden VALUES('$orden','$pizza','$masa','$cantidad')";

            if ($connection->query($query)== TRUE)
                echo "insertado con exito";

            else
                echo "$orden $pizza $masa $cantidad";

        }
        $connection->close();
    }


    function obtenerPizzas(){

        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');
        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "SELECT id,nombre,precio FROM `pizzas` ORDER BY nombre";
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

    function obtenerOrdenes(){
        $usuario = $_GET['usuario'];
        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');
        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "SELECT id,fecha FROM `ordenes` WHERE  cliente='$usuario'";
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

    function obtenerPizzasEnOrden(){
        $orden = $_GET['orden'];
        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');
        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "SELECT pizza,cantidad FROM `pizzas_x_orden` WHERE  orden='$orden'";
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

    function obtenerIngredientes(){

        $pizza = $_GET["pizza"];
        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');
        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "SELECT i.ingrediente FROM ingredientes_x_pizzas i, pizzas p WHERE p.id = i.pizza and p.nombre = '$pizza'";
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
                echo "No se encontro nada";

        }
        $result->free();
        $connection->close();
    }

    function obtenerMasas(){

        $connection = new mysqli('localhost','root','','pizzeria');
        mysqli_set_charset($connection,'utf8');
        if ($connection->connect_error)
            echo '<h1>Error de coneccion</h1>';

        else {
            $query = "SELECT tipo FROM tipos_masa";
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
                echo "No se encontro nada";

        }
        $result->free();
        $connection->close();

    }

    manejarRequest();
?>