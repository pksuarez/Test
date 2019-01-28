
var arregloPizzas=[];

function validarUsuario() {

    var usuario = document.getElementById('usuario');
    var password = document.getElementById('password');

    if (usuario.value != '' && password.value != '') {
        var solicitud = new XMLHttpRequest();
        solicitud.open('GET', 'PHP.php?usuario=' + usuario.value + '&password=' + password.value+'&request=login', true);
        solicitud.send(null);

        solicitud.onreadystatechange = function () {
            if (solicitud.readyState == 4 && solicitud.status == 200) {

                if(solicitud.responseText==''){
                }
                if(solicitud.responseText!=''){
                    window.location.replace('principal.php');

                }

            }
        }

    }
}

function registrarUsuario() {
    var usuario = document.getElementById('usuario');
    var password = document.getElementById('password');
    var nombre = document.getElementById('nombre');

    if (usuario.value != '' && password.value != '' && nombre!='') {
        var solicitud = new XMLHttpRequest();
        solicitud.open('GET', 'PHP.php?request=registro&nombre='+nombre.value+'&usuario=' + usuario.value + '&password=' + password.value, true);
        solicitud.send(null);

        solicitud.onreadystatechange = function () {
            if (solicitud.readyState == 4 && solicitud.status == 200) {
                alert("Agregado con exito");
                window.location.replace('login.html');

            }
        }

    }
}


function cargarPizzas(){
    var solicitud = new XMLHttpRequest();
    solicitud.open('GET', 'PHP.php?request=cargarPizzas', true);
    solicitud.send(null);
    solicitud.onreadystatechange = function () {
        if (solicitud.readyState == 4 && solicitud.status == 200) {

            //document.getElementById('divPizzas').innerText=solicitud.responseText;
            var data = JSON.parse(solicitud.responseText);

            for (var fila in data){
                arregloPizzas.push([data[fila].id,data[fila].nombre,data[fila].precio]);
            }
        }
    }

}

function llenarListaPizzas() {

    var nombres = document.getElementById('nombresPizzas');
    var precios = document.getElementById('preciosPizzas');
    var ulPizza = document.createElement('ul');
    var ulPrecio = document.createElement('ul');
    ulPizza.setAttribute('class','list-group');
    ulPizza.setAttribute('id','ulPizza');
    ulPrecio.setAttribute('class','list-group');
    ulPrecio.setAttribute('id','ulPrecio')

    for (let i =0;i<arregloPizzas.length;i++){

        var itemNombre = document.createElement('li');
        var itemPrecio = document.createElement('li');
        var nombre = arregloPizzas[i][1];
        var precio = arregloPizzas[i][2];

        itemNombre.setAttribute('class','list-group-item');
        itemNombre.setAttribute('onmouseover',"cargarIngredientes(\""+nombre+"\")");
        itemNombre.setAttribute('onclick',"agregarDesgloce(\""+nombre+"\");calcularTotal()");
        itemNombre.innerText = nombre;
        ulPizza.appendChild(itemNombre);

        itemPrecio.setAttribute('class','list-group-item');
        itemPrecio.innerText = '₡'+precio;
        ulPrecio.appendChild(itemPrecio);
    }
    nombres.appendChild(ulPizza);
    precios.appendChild(ulPrecio);

}


function llenarTablaOrdenes() {
    var usuario = document.getElementById('usuario').innerText;
    var solicitud = new XMLHttpRequest();


    solicitud.open('GET', 'PHP.php?request=cargarOrdenes&usuario='+usuario, true);
    solicitud.send(null);
    solicitud.onreadystatechange = function () {
        if (solicitud.readyState == 4 && solicitud.status == 200) {
            var data = JSON.parse(solicitud.responseText);
            for (var fila in data){
                var item = document.createElement('li');
                item.setAttribute('class','list-group-item');
                item.setAttribute('onclick',"llenarDetalles(\""+data[fila].id+"\")");
                item.innerText = data[fila].id + ' ' + data[fila].fecha
                document.getElementById('listaOrdenes').appendChild(item);
            }
        }
    }
}


function obtenerPizzasEnOrden(orden) {
    var listaPizzas =[];
    var solicitud = new XMLHttpRequest();
    solicitud.open('GET', 'PHP2.php?request=cargarPizzasOrden&orden='+orden, true);
    solicitud.send(null);
    //console.log(orden);
    var total = 0;
    solicitud.onreadystatechange = function () {
        if (solicitud.readyState == 4 && solicitud.status == 200) {
            var data = JSON.parse(solicitud.responseText);

            for (var fila in data){
                listaPizzas.push([data[fila].pizza,data[fila].masa,data[fila].cantidad]);
            }

            //console.log(solicitud.responseText);
            var pizzas=listaPizzas;

            for (let i = 0;i<pizzas.length;i++){

                var nombre = obtenerNombrePizza(pizzas[i][0]);
                var masa = pizzas[i][1];
                var cantidad = pizzas[i][2];

                console.log(nombre,masa,cantidad);

                var tr = document.createElement('tr');
                var td = document.createElement('td');
                var td2 = document.createElement('td');
                var td3 = document.createElement('td');
                var td4 = document.createElement('td');

                td.setAttribute('class','centrar');
                td2.setAttribute('class','centrar');
                td3.setAttribute('class','centrar');
                td4.setAttribute('class','centrar');

                td.innerText=nombre;
                td2.innerText=masa;
                td3.innerText=cantidad;

                var precio = obtenerPrecio(nombre)* parseInt(cantidad);

                td4.innerText= precio;

                total+=precio;

                tr.appendChild(td);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);

                console.log(tr.innerHTML);
                document.getElementById('cuerpoTablaOrdenes').appendChild(tr);
                console.log(total);
            }

            document.getElementById('total').innerText=total;


        }
    }

}

function obtenerNombrePizza(pizza) {

    var nombre;
    for (let i=0;i<arregloPizzas.length;i++){
        if (arregloPizzas[i][0]==pizza){
            nombre =arregloPizzas[i][1];
            break;
        }
    }

    return nombre;
}
function llenarDetalles(orden) {

    document.getElementById('cuerpoTablaOrdenes').innerHTML='';
    obtenerPizzasEnOrden(orden);



}

function cargarIngredientes(pizza){
    var solicitud = new XMLHttpRequest();
    console.log(pizza);
    solicitud.open('GET', 'PHP.php?request=cargarIngredientes&pizza='+pizza, true);
    solicitud.send(null);
    var divIngredientes = document.getElementById('divIngredientes');
    divIngredientes.innerHTML="<h2>Ingredientes</h2>";

    solicitud.onreadystatechange = function () {

        if (solicitud.readyState == 4 && solicitud.status == 200) {
            var ul = document.createElement('ul');
            ul.setAttribute('class','list-group');
            console.log(solicitud.responseText);
            var data = JSON.parse(solicitud.responseText);
            for (var fila in data){
                var item = document.createElement('li');
                item.setAttribute('class','list-group-item');
                item.innerText = data[fila].ingrediente;
                ul.appendChild(item);
            }
            divIngredientes.appendChild(ul);

        }
    }
}

function agregarDesgloce(pizza){
    var tr = document.createElement('tr');
    var td = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var input = document.createElement('input');
    var select = document.createElement('select');

    td.setAttribute('class','centrar');
    td2.setAttribute('class','centrar');
    td3.setAttribute('class','centrar');

    input.setAttribute('type','number');
    input.setAttribute('value','1');
    input.setAttribute('min','1');
    input.setAttribute('id',pizza);
    input.setAttribute('class','centrar');
    input.setAttribute('onclick',"calcularTotal()");

    td.innerHTML=pizza;

    var thead = document.getElementById('cuerpoTabla');

    if(!verficiarFilaExiste(pizza)) {
        tr.appendChild(td);
        td2.appendChild(input);
        tr.appendChild(td2);
        thead.appendChild(tr);
        td3.appendChild(select);
        tr.appendChild(td3);

        var filas=document.getElementById('tablaDesgloce').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
        select.setAttribute('id','optionSelect'+filas);


        // CONECCION A LA BASE PARA OBTENER LOS TIPOS DE MASAS

        var solicitud = new XMLHttpRequest();
        solicitud.open('GET', 'PHP.php?request=cargarMasas', true);
        solicitud.send(null);
        solicitud.onreadystatechange = function () {
            if (solicitud.readyState == 4 && solicitud.status == 200) {
                //console.log(solicitud.responseText);
                var data = JSON.parse(solicitud.responseText);
                for (var fila in data) {
                    var option = document.createElement('option');
                    option.innerHTML = data[fila].tipo;
                    select.appendChild(option);
                }
            }
        }
    }


   /* var filas=document.getElementById('tablaDesgloce').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
    var columnas = document.getElementById('tablaDesgloce').rows[0].cells.length;

    var cantidad = document.getElementById('tablaDesgloce').rows[1].cells[1].children[0].value;
    var pizz = document.getElementById('tablaDesgloce').rows[1].cells[0].innerHTML;
    //var cantidad =document.getElementById('tablaDesgloce').rows[1].cells[1].getElementsByTagName('input')[0].value;
    //console.log(cantidad);
    //console.log(pizz);
*/



}

//funcion para verificar si una pizza ya fue agregada a orden
function verficiarFilaExiste(pizza) {
    var filas=document.getElementById('tablaDesgloce').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
    var cont = 1;
    var repetida = false;
    for (cont;cont<filas+1;cont++){
        var pizz = document.getElementById('tablaDesgloce').rows[cont].cells[0].innerHTML;
        if (pizz==pizza){
            repetida=true;
            var cantidad = document.getElementById('tablaDesgloce').rows[cont].cells[1].children[0]; //si ya existe se aumenta la cantidad
            cantidad.value =  parseInt(cantidad.value)+1;
        }
        if (repetida){
            break;
        }
    }
    return repetida;
}


function limpiarTablaDetalle() {

    document.getElementById('cuerpoTabla').innerHTML="";
    document.getElementById('total').innerText=0;


}

function generarNumeroOrden() {
    var fecha = new Date();
    var usuario = document.getElementById('usuario').innerText;

    var numOden = usuario.substring(0,3) + fecha.getHours()+fecha.getMinutes() + fecha.getSeconds();

    return numOden;
}

function  calcularTotal() {

    var total = 0;
    var filas=document.getElementById('tablaDesgloce').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
    var cont = 1;
    for (cont;cont<filas+1;cont++){
        var pizz = document.getElementById('tablaDesgloce').rows[cont].cells[0].innerHTML;
        var cant = document.getElementById('tablaDesgloce').rows[cont].cells[1].getElementsByTagName('input')[0].value;
        //console.log(pizz+' '+cant);
        var precio = obtenerPrecio(pizz);
        total += parseInt(cant)*parseInt(precio);
    }
    document.getElementById('total').innerText=total;


}

function obtenerPrecio(pizz) {

    var precio;
    for (let i=0;i<arregloPizzas.length;i++){
        if (arregloPizzas[i][1]==pizz){
            precio = arregloPizzas[i][2];
            break
        }
    }

    return precio;
   // console.log(precio);
}

function obtenerID(pizz) {

    var id;
    for (let i=0;i<arregloPizzas.length;i++){
        if (arregloPizzas[i][1]==pizz){
            id = arregloPizzas[i][0];
            break
        }
    }

    return id;
    // console.log(precio);
}


function procesarOrden(){

    var orden =generarNumeroOrden();
    document.getElementById('numOrden').innerText=orden;
    enviarOrden();
    var pizzas= obtenerPizzasOrdenadas();
    var cont = 0;

    for (cont;cont<pizzas.length;cont++) {
        var pizza = pizzas[cont][0];
        var masa = pizzas[cont][1];
        var cantidad = pizzas[cont][2];
        var id = obtenerID(pizza);
        console.log(pizza + cantidad + masa);
        var solicitud = new XMLHttpRequest();
        solicitud.open('GET', 'PHP.php?request=agregarProductos&pizza=' + id + '&masa=' + masa + '&cantidad=' + cantidad+'&orden='+orden, true);
        solicitud.send(null);

        solicitud.onreadystatechange = function () {

            if (solicitud.readyState == 4 && solicitud.status == 200) {
                console.log(solicitud.responseText);
            }
        }
    }

    limpiarTablaDetalle();
}

function obtenerPizzasOrdenadas() {
    var datos = [];
    var filas=document.getElementById('tablaDesgloce').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
    var cont = 1;


    for (cont;cont<filas+1;cont++){
        var select = document.getElementById('optionSelect'+cont);
        var masa = select.options[select.selectedIndex].value;
        var pizz = document.getElementById('tablaDesgloce').rows[cont].cells[0].innerHTML;
        var cant = document.getElementById('tablaDesgloce').rows[cont].cells[1].getElementsByTagName('input')[0].value;
        datos.push([pizz,masa,cant]);
    }

    return datos;
}

function enviarOrden(){

    var id = document.getElementById('numOrden').innerText;
    var usuario = document.getElementById('usuario').innerText;
    var date = new Date();
    var fecha = date.getDate()+'/'+date.getMonth()+'/'+date.getFullYear()+' '+date.getHours()+':'+date.getMinutes();
    var solicitud = new XMLHttpRequest();
    var total = document.getElementById('total').innerText;


    solicitud.open('GET', 'PHP.php?request=crearOrden&fecha='+fecha+'&usuario='+usuario+'&total='+total+'&id='+id, true);
    solicitud.send(null);
    solicitud.onreadystatechange = function () {

        if (solicitud.readyState == 4 && solicitud.status == 200) {
            console.log(solicitud.responseText);
        }
    }
}


cargarPizzas();
