var contadorVidas = 3;
var turno = 0;
var gusanito = [];

function inicializarGusanito() {
	var numero;
	var insertado;
	for (i = 0; i < 5; i++) {
		insertado = true;
    	while(insertado == true){
    		insertado = false;
    		numero = Math.floor(Math.random() * 5)+1;
    		for(j = 0; j <= i; j++){
    			if(gusanito[j] == numero){
    				insertado = true;
    			}
    		}
    	}
    	gusanito[i] = numero;
	}

    document.getElementById("h2Status").innerHTML=obtenerVidas();

}

function verificarNumero(){
	var numero = document.getElementById("inNumero").value;
	var adivinado = false;

	if (contadorVidas>0 && turno<4){
		if (numero !=0){

			document.getElementById("h3Status").innerHTML="";

			if (numero != gusanito[turno]){
				contadorVidas-=1;
				document.getElementById("h2Status").innerHTML=obtenerVidas();
				document.getElementById("h3Status").innerHTML=mayorMenor(numero);

			}

            if (numero == gusanito[turno]){
                document.getElementById("h2Status").innerHTML=obtenerVidas();
                insertarNumeroCorrecto(numero);
                turno +=1;
            }
		}


		else{
			document.getElementById("h3Status").innerHTML="Debe escoger un valor no cero";
			document.getElementById("h2Status").innerHTML=obtenerVidas();

		}

        if (turno==4){
            var link = document.createElement("a");
            link.setAttribute("href",linkFinal());
            link.setAttribute("target","_blank");
            link.innerHTML = "Felicidades Gusanito";
            document.getElementById("h3Status").appendChild(link);
	}

	if (contadorVidas==0){
        document.getElementById("h3Status").innerHTML="GAME OVER";
	}

	}
	document.getElementById("inNumero").value=0;
}

function mayorMenor(numero) {
	var hint;
	if (numero>gusanito[turno])
		hint = "El numero ingresado es MAYOR al del gusanito";
	else
        hint = "El numero ingresado es MENOR al del gusanito";

	return hint;
}

function insertarNumeroCorrecto(numero) {

    if (turno==0)
    	document.getElementById("encontrado1").innerHTML=numero;
    if (turno==1)
        document.getElementById("encontrado2").innerHTML=numero;
    if (turno==2)
        document.getElementById("encontrado3").innerHTML=numero;
    if (turno==3)
        document.getElementById("encontrado4").innerHTML=numero;

}

function linkFinal(){
	var link;
	if (gusanito[4]==1)
		link = "final1.php";
    if (gusanito[4]==2)
        link = "final2.php";
    if (gusanito[4]==3)
        link = "final3.php";
    if (gusanito[4]==4)
        link = "final4.php";
    if (gusanito[4]==5)
    	link = "final5.php";

    return link;
}

function obtenerVidas(){
	var vidas = "*"
	if (contadorVidas>0)
	{
		for (i=1;i<contadorVidas;i++){
		vidas += "*";
		}
	}
	else
		vidas= null;
	return vidas;
}

function hacerTrampa() {
    document.getElementById("cheat").innerHTML=gusanito[0]+" "+gusanito[1]+" "+gusanito[2]+" "+gusanito[3]+" "+gusanito[4];

}