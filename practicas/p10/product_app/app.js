// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/vacio.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

function buscarProducto(e) {
    e.preventDefault();
    
    var texto = document.getElementById('search').value.trim();
    if (texto === "") {
        alert("Por favor, escribe algo para buscar.");
        return;
    }
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n' + client.responseText);

            let productos = JSON.parse(client.responseText);

            let template = "";
            if (productos.length > 0) {
                for (let i = 0; i < productos.length; i++) {
                    let p = productos[i];
                    let descripcion = `
                        <li>precio: ${p.precio}</li>
                        <li>unidades: ${p.unidades}</li>
                        <li>modelo: ${p.modelo}</li>
                        <li>marca: ${p.marca}</li>
                        <li>detalles: ${p.detalles}</li>
                    `;
                    template += `
                        <tr>
                            <td>${p.id}</td>
                            <td>${p.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                }
            } else {
                template = '<tr><td colspan="3">No se encontraron productos.</td></tr>';
            }

            document.getElementById("productos").innerHTML = template;
        }
    };
    client.send("buscar=" + encodeURIComponent(texto));
}


// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;

    if(!finalJSON.nombre || finalJSON.nombre.length > 100){
        alert("Nombre vació o con longitus superior a 100 caracteres.");
        return;
    }
    if(finalJSON.precio < 100 || !finalJSON.precio){
        alert("El precio es obligatorio y su mínimo es de $100.");
        return;
    }
    if(finalJSON.unidades < 0 || !finalJSON.unidades){
        alert("Las unidades son obligatorias y deben ser al menos 0.");
        return;
    }
    if(!finalJSON.modelo || finalJSON.modelo ==="XX-000"){
        alert("Modelo obligatorio");
        return;
    }
    if(!finalJSON.marca || finalJSON.marca === "NA"){
        alert("Marca obligatoria");
        return;
    }  else {
        let marcasValidas = [
            "Samsung",
            "HP",
            "Asus",
            "Hisense",
            "Sony",
            "Xbox",
            "Apple",
            "Logitech"
        ]
        if (!marcasValidas.includes(finalJSON.marca)) {
            alert("Marca no encontrada. Posibles marcas: Samsung, HP, Asus, Hisense, Sony, Xbox, Apple, Logitech.");
            return;
        }
    }

    if(finalJSON.detalles !== "NA" && finalJSON.detalles !== ""){
        if(finalJSON.detalles.length > 250){
            alert("Los detalles no deben ser más de 250 caracteres.");
            return;
        }
    }
    else {
        finalJSON.detalles === "";
    }
    if(finalJSON.imagen === ""){
        finalJSON.imagen = "img/vacio.png";
    }


    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            alert(client.responseText);
            console.log(client.responseText);
        }
    };
    client.send(productoJsonString);
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}