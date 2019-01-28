

var caja = document.getElementById('texto');

//caja.addEventListener("onkeyup",controlador);


function controlador() {
    var texto = document.getElementById('texto').value;
    let div = document.getElementById('divVacia');
    if (texto.length >=3) {
        var solicitud = new XMLHttpRequest();
        div.innerHTML= "";
        solicitud.open('GET','PHP.php?texto='+texto,true);
        solicitud.send(null);

        solicitud.onreadystatechange = function () {
            if (solicitud.readyState == 4 && solicitud.status == 200) {
                document.getElementById('divVacia').innerHTML = "<p>"+solicitud.responseText+"</p>";
                //var data = JSON.parse(solicitud.responseText);
               /* for (var fila in data) {
                    var divExtraInterna = document.createElement('div');
                    var p = document.createElement('p');
                    var p2 = document.createElement('p')
                    var p3= document.createElement('p')
                    var contenido = document.createTextNode(data[fila].word);
                    var contenido2 = document.createTextNode(data[fila].wordtype);
                    var contenido3= document.createTextNode(data[fila].definition);

                    p.appendChild(contenido);
                    p2.appendChild(contenido2);
                    p3.appendChild(contenido3);

                    divExtraInterna.appendChild(p);
                    divExtraInterna.appendChild(p2);
                    divExtraInterna.appendChild(p3);

                    div.appendChild(divExtraInterna);

                }*/
            }
        }
    }
}


