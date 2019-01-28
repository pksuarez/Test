function calcularEdad() {
    var nombre = document.getElementById("nombre").value;
    var dia = document.getElementById("dia").value;
    var mes = document.getElementById("mes").value;
    var año = document.getElementById("año").value;

    //alert("Nombre: "+ nombre + ", Fecha de Nacimiento: "+dia+"/"+mes+"/"+año);

    var diaActual = 18;
    var mesActual = 9;
    var añoActual = 2018;

    var edad = añoActual - año;

    if (mes>mesActual)
        edad +=1;

    if (mes==mesActual & dia>=diaActual)
        edad +=1;

    document.getElementById("divRespuestas").innerText= nombre +" su edad cumplida a la fecha es de "+ edad;
}

