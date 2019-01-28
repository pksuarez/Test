
function puntosExtra() {
    document.getElementById("divLogin").style.setProperty('display','none');
}

function mostrarLogin() {
    document.getElementById("divLogin").style.setProperty('display','block');
}
function login() {

    var userN = document.getElementById('userN');
    var userP = document.getElementById('userP');
    var divUsuario = document.getElementById('divUsuario');
    var divEmpleado = document.getElementById('divEmpleado');
    console.log(userN.value,userP.value);

    if (userN.value != '' && userP.value != '') {
        var solicitud = new XMLHttpRequest();
        solicitud.open('GET', 'PHP.php?userN=' + userN.value + '&userP=' + userP.value, true);
        solicitud.send(null);

        solicitud.onreadystatechange = function () {
            if (solicitud.readyState == 4 && solicitud.status == 200) {

                if(solicitud.responseText==''){
                    divUsuario.innerText = "Error: Revise sus datos.";
                    userN.value='';
                    userP.value='';

                }
                if(solicitud.responseText!=''){

                    puntosExtra();
                    divEmpleado.innerHTML='';
                    var data = JSON.parse(solicitud.responseText);
                    console.log(data.gender+' '+data.status);

                    var saludo = data.gender=='Male'?'Bienvenido ':'Bienvenida ';
                    var honorifico = data.gender=='Male'?'señor ':'señora ';
                    var status= data.status;
                    var nombre = status=='1'?data.first_name:'';
                    var apellido=data.last_name;
                    var posicion = status=='2'?'Admin':'Empleado';
                    var header = status=='2'?'h2':'h3';

                    divUsuario.innerHTML='<p>'+saludo+honorifico+nombre+' '+apellido+'</p>';


                    var div = document.createElement('div');
                    div.setAttribute('class','data');
                    var h=document.createElement(header);

                    h.innerText=posicion;
                    var p=document.createElement('p');
                    p.innerText=data.user_id+' '+data.first_name+' '+data.last_name;
                    div.appendChild(h);
                    div.appendChild(p);
                    divEmpleado.appendChild(div);
                }
            }
        }

    }
}