function klik(){
	var cajaT = document.getElementById("iText");
	var divR = document.getElementById("idRespuesta");

	divR.innerHTML = "";
	if(cajaT.value.length > 2){
		var mercurio = new XMLHttpRequest();
		mercurio.open("GET", "sammi.php?xyz="+cajaT.value, true);
		mercurio.send(null);

		mercurio.onreadystatechange = function() {
			if(mercurio.readyState == 4 && mercurio.status == 200) 	{
				if(mercurio.responseText != ""){
			    	var data = JSON.parse(mercurio.responseText);
			    	var i = 0;
			    	var j = 0;
				     for(var fila in data){
				     	var boton = document.createElement("input"); 

				     	var node = document.createElement("div");
				     	var defp = document.createElement("p");
				     	var textnode = document.createTextNode(data[fila].word+" - ");
				     	var textnode2 = document.createTextNode(data[fila].wordtype); 
				     	var textnode3 = document.createTextNode(data[fila].definition);
				     	
				     	boton.setAttribute("type", "button");
				     	boton.setAttribute("value", "Ver Definición");
				     	boton.setAttribute("id",""+data[fila].word+j+"boton");
				     	boton.setAttribute("onclick","clicki(\""+data[fila].word+j+"\")");

				     	node.appendChild(textnode);
				     	node.appendChild(textnode2);
				     	node.appendChild(boton);
				     	node.appendChild(defp);
						node.setAttribute("class","yeah"+i);
						
						defp.appendChild(textnode3);
				     	defp.style.display = "none";
				     	defp.setAttribute("id",""+data[fila].word+j);
				     	

				     	divR.appendChild(node);
				     	if(i==1){
				     		i = 0;
				     	}else{
				     		i = 1;
				     	}
				     	j++;
				     }
				}
			}
		}
	}
}

function clicki(id){
	var div = document.getElementById(""+id);
	var boton = document.getElementById(id+"boton");

	if(boton.value == "Ver Definición"){
		div.style.display = "block";
		boton.value = "Esconder Definición";
	}else{
		boton.value = "Ver Definición";
		div.style.display = "none";
	}
}
