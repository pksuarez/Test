<?php

//arreglo indexado
$equipos = array("Ardillas de Amsterdam", "Los Lagartos de Londres", "Serpientes de Sabanilla", "Conejos de Coronado");

//arreglo asociativo
$equipos = array("Ardillas de Amsterdam"=>20, "Los Lagartos de Londres"=>13, "Serpientes de Sabanilla"=>43, "Conejos de Coronado"=>65);

//arreglo multidimensional

$posiciones = array(
    array("Real Madrid",24,5,1),
    array("Bayern Munich",32,7,4),
    array("Juventus",30,10,8),
    array("Barcelona",29,5,6)
    );


function ordenar($asc) //asociativo por valor
{
	global $equipos;
	if($asc == true){
		asort($equipos);
	}else{
		arsort($equipos);
	}
	
}
function ordenar2($asc) //asociativo por llave
{
    global $equipos;
    if($asc == true){
        ksort($equipos);
    }else{
        krsort($equipos);
    }

}

function modificar()
{
	global $equipos;
	foreach ($equipos as $peterete) {
		$peterete = "¡ ".$peterete;
	}
}

function imprimir()
{
	global $equipos;

	foreach ($equipos as $peterete) {
		echo $peterete;
		echo "<br>";
	}
}


function imprimirAsociativo()
{
    global $equipos;

    foreach ($equipos as $llave=>$valor) {
        echo $llave. ': '.$valor;
        echo "<br>";
    }
}
function imprimirMultiDimensional(){
    global $posiciones;
    foreach ($posiciones as &$equipo){
        $golDiferencia=$equipo[2]-$equipo[3];

        foreach ($equipo as $dato){
            echo $dato.'<br>';}

        echo  'gol diferencia: '.$golDiferencia;
        $equipo[4]=$golDiferencia;
        echo '<br><br>';
    }
}

function imprimirMultiDimensional2(){
    global $posiciones;
    foreach ($posiciones as $equipo){

        foreach ($equipo as $dato)
            echo $dato.'<br>';
        echo '<br><br>';
    }
}

function insertar(){
    global $posiciones;
    for ($i=0;$i<4;$i++){
        $posiciones[$i][]="nuevo";
        echo 'Insertado<br><br>';
    }
}



//imprimirAsociativo();
//ordenar(false);
//imprimirAsociativo();
imprimirMultiDimensional();
//insertar();
imprimirMultiDimensional2();
?>