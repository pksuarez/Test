
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

<body onload="llenarTablaOrdenes()">

<header>
    <h3 id="usuario"> <?php  echo $_SESSION['usuario']?></h3>
    <h1>Master pizza</h1>
</header>

<div class="principal">
    <div class="menu">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="principal.php">Ordenar</a></li>
            <li class="active"><a href="#">Ver Historial</a></li>
            <li><a href="login.html">Salir</a></li>
        </ul>
    </div>



    <div id="divOrdenes">
        <h2>Ordenes</h2>
        <ul id="listaOrdenes" class="list-group">
        </ul>
    </div>

    <div id="divDetalles">
        <h2>Detalles</h2>
        <table  id ='tablaDetalles' class="table table-striped">
            <thead>
                <tr>
                    <th class="centrar">Pizza</th>
                    <th class="centrar">Masa</th>
                    <th class="centrar">Cantidad</th>
                    <th class="centrar">Precio</th>
                </tr>
            </thead>

            <tbody id="cuerpoTablaOrdenes">
            </tbody>
        </table>
        <h4 class="textoGrande">Total:₡</h4><h4 class="textoGrande" id="total"> 0 </h4>
    </div>
</div>



</body>


</html>
