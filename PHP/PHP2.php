<?php

function saludar($persona,$boleano=true){

    if ($boleano)
        echo "<h1>Hola: ".$persona."</h1>";

    else
        echo "<h1>Adios: ".$persona."</h1>";
    echo "<br>";
}


/*saludar ("Pablo",false);
saludar("Mama",true);
saludar("Papa");*/

function saludar2($persona,$boleano=true){


    if ($boleano)
        $mensaje = "<h1>Hola: ".$persona."</h1>";

    else
        $mensaje = "<h1>Adios: ".$persona."</h1>";

    return $mensaje;
}

$persona = "Pablo";

function saludar3($boleano=true){

    global $persona;
    if ($boleano)
        $mensaje = "<h1>Hola: ".$persona."</h1><br>";

    else
        $mensaje = "<h1>Adios: ".$persona."</h1><br>";
    return $mensaje;
}


$arreglo = array("Real Madrid","Barcelona","Juventus");
$arreglo[] = "Bayern Munich";

sort($arreglo);

foreach ($arreglo as $elemento){
    echo "<h1>".$elemento." FC"."<br><h1>";
}

rsort($arreglo);

foreach ($arreglo as $elemento){
    echo "<h1>".$elemento." FC"."<br><h1>";
}


// arreglo asociativo



?>