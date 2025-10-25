// JSON BASE A MOSTRAR EN FORMULARIO
/*
$(function(){
    console.log('JQuery Funcionando');
});
*/

var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/vacio.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

$(function(){
    console.log('JQuery funcionando')
    listarProductos();
    let ocultarLista = false;
   
    function listarProductos(){
        $.ajax({
            url: './backend/product-search.php',
            type: 'GET',
            success:function(response){
                let productos = JSON.parse(response);
                let template = '';
                let template_bar = '';
                productos.forEach(producto => {
                    let descripcion = '';
                    descripcion += '<li>precio: '+producto.precio+'</li>';
                    descripcion += '<li>unidades: '+producto.unidades+'</li>';
                    descripcion += '<li>modelo: '+producto.modelo+'</li>';
                    descripcion += '<li>marca: '+producto.marca+'</li>';
                    descripcion += '<li>detalles: '+producto.detalles+'</li>';
                
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                    template_bar += ` <li>${producto.nombre}</li>`;
                });
                $('#products').html(template);
                
                if(ocultarLista == true){
                    $('#product-result').removeClass("card my-4 d-block").addClass("card my-4 d-none");
                    ocultarLista = false;
                }
            }
        });
    }

    $('#search').keyup(function(){
        let search = $('#search').val().trim();
        if (search){
            console.log(search);
            $.ajax({
                url: './backend/product-search.php',
                type: 'GET',
                data: { search },
                success: function(response){
                    let productos1 = JSON.parse(response);
                    let template = '';
                    let template_bar = '';
                    productos1.forEach(producto => {
                    // SE COMPRUEBA QUE SE OBTIENE UN OBJETO POR ITERACIÓN
                    //console.log(producto);

                    // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    let descripcion = '';
                    descripcion += '<li>precio: '+producto.precio+'</li>';
                    descripcion += '<li>unidades: '+producto.unidades+'</li>';
                    descripcion += '<li>modelo: '+producto.modelo+'</li>';
                    descripcion += '<li>marca: '+producto.marca+'</li>';
                    descripcion += '<li>detalles: '+producto.detalles+'</li>';
                
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;

                    template_bar += `
                        <li>${producto.nombre}</il>
                    `;
                });

                $('#product-result').addClass("card my-4 d-block");
                $('#container').html(template_bar);
                $('#products').html(template);

                }
            });
        }
        else{
            console.log("No hay resultados sin búsqueda.");
            listarProductos();
            ocultarLista = true;
        }
    })

    $('#product-form').submit(function (e){
        e.preventDefault();
        const postData = {
            name: $('#name').val(),
            description: $('#description').val(),
            id: $('#productId').val()
        };
        var finalJSON = JSON.parse(postData.description);
        finalJSON['nombre'] = postData.name;
        finalJSON['id'] = postData.id;

        let template_bar = '';

        if(!finalJSON.nombre || finalJSON.nombre.length > 100){
            template_bar += '<li>Nombre vacío o con longitud superior a 100 caracteres.</li>';
        }
        if(finalJSON.precio < 100 || !finalJSON.precio){
            template_bar += '<li>El precio es obligatorio y su mínimo es de $100.</li>';
        }
        if(finalJSON.unidades < 0 || !finalJSON.unidades){
            template_bar += '<li>Las unidades son obligatorias y deben ser al menos 0.</li>';
        }
        if(!finalJSON.modelo || finalJSON.modelo ==="XX-000"){
            template_bar += '<li>Modelo obligatorio.</li>';
        }
        if(!finalJSON.marca || finalJSON.marca === "NA"){
            template_bar += '<li>Marca obligatoria.</li>';
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
                template_bar += '<li>Marca no encontrada. Posibles marcas: Samsung, HP, Asus, Hisense, Sony, Xbox, Apple, Logitech.</li>';
            }
        }

        if(finalJSON.detalles !== "NA" && finalJSON.detalles !== ""){
            if(finalJSON.detalles.length > 250){
                template_bar += '<li>Los detalles no deben ser más de 250 caracteres.</li>';
            }
        }
        else {
            finalJSON.detalles = "";
        }
        if(finalJSON.imagen === ""){
            finalJSON.imagen = "img/vacio.png";
        }
        if (template_bar !== '') {
            $('#product-result').removeClass("d-none").addClass("d-block");
            $('#product-result').show();
            $('#container').html('<ul>' + template_bar + '</ul>');
            ocultarCuadro = true;
            return;
        }

        listarProductos();
        var postDataJSON = JSON.stringify(finalJSON,null,2);
        let url = './backend/product-add.php';


        $.post(url, postDataJSON, function (response){
            $('#product-form').trigger('reset');
            init();
            console.log(response);
            let respuesta = JSON.parse(response);
            let template_bar = '';
            template_bar += `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>
            `;
            $('#product-result').removeClass("d-none").addClass("d-block");
            $('#container').html(template_bar);
            listarProductos();
        })
        
        $.ajax({
            url: url,
            type: "POST",
            data: finalJSON,
            success: function(response) {
                $('#product-form').trigger('reset');
                init(); 
                console.log(response);
                let respuesta = JSON.parse(response);
                let template_bar = `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;
                $('#product-result').removeClass("d-none").addClass("d-block");
                $('#container').html(template_bar);
                listarProductos();
            }
        });
        

    })

    $(document).on('click', '.product-delete', function () {
        if (confirm('¿Estás seguro de querer eliminar este producto?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('productId');
            console.log(id);

            $.get('./backend/product-delete.php', { id }, function (response) {
                console.log(response);
                let respuesta = JSON.parse(response);
                let template_bar = '';
                template_bar += `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;
                $('#product-result').addClass("card my-4 d-block");
                $('#container').html(template_bar);
                listarProductos();
            })
        }
    })


})
