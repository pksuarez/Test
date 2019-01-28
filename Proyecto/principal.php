
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Master Pizza</title>
    <link rel="stylesheet" href="estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="controladores.js" async></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?php
    session_start();
    ?>
</head>

<body onload="llenarListaPizzas()">

    <header>
        <h3 id="usuario"> <?php  echo $_SESSION['usuario']?></h3>
        <h1>Master pizza</h1>
    </header>

    <div class="principal">
        <div class="menu">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#">Ordenar</a></li>
                <li><a href="historial.php">Ver Historial</a></li>
                <li><a href="login.html">Salir</a></li>
            </ul>
        </div>


        <div id='divPizzas'>
            <h2>Pizzas</h2>
            <div id="nombresPizzas">
            </div>
            <div id="preciosPizzas">
            </div>
        </div>
        <div id="divIngredientes">
            <h2>Ingredientes</h2>
        </div>


        <div id="divDesgloce">
            <h2>En Orden</h2>
            <table  id ='tablaDesgloce' class="table table-striped">
                <thead>
                <tr>
                    <th class="centrar">Pizza</th>
                    <th class="centrar">Cantidad</th>
                    <th class="centrar">Masa</th>
                </tr>
                </thead>
                <tbody id="cuerpoTabla">
                </tbody>
            </table>
        </div>

        <div id="divTotal">
            <button type="button" class="btn btn-success btn-lg" onclick="procesarOrden()" data-toggle="modal" data-target="#myModal">Procesar</button>
            <button type="button" class="btn btn-danger btn-lg" onclick="limpiarTablaDetalle()" >Limpiar</button>
            <p class="textoGrande">Total: <br>₡<p class="textoGrande" id="total"></p></p>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Orden Completada</h4>
                        </div>
                        <div class="modal-body">
                            <p>Numero de orden: </p><p id="numOrden"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>



</body>


</html>
<!--<table class="table table-hover table-responsive">
    <thead>
    <tr>
        <th id="th">Pizzas</th>
    </tr>
    </thead>
    <tbody id="lista">
    <tr>
        <td>Pizza 1</td>
    </tr>
    <tr>
        <td>Pizza 2</td>
    </tr>
    </tbody>
</table>-->