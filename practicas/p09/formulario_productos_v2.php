<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de productos</title>
    <style>
        h1{
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: auto;
        }
        fieldset {
            margin-bottom: 30px;
            border: 1px solid black;
            padding: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 6px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Registro de nuevos productos en el inventario</h1>
    <form id="formularioProductos" action="http://localhost/tecweb/practicas/p08/set_producto_v2.php" method="post" onsubmit="return validarFormulario()">
        <fieldset>
            <h1>Ingresa la información del producto:</h1>
            <label for="nombre">Nombre: </label> <input type="text" name="nombre" id="nombre">
            <label for="marca">Marca: </label> 
            <select name="marca" id="marca">
                <option value="">Selecciona una marca de electrónicos</option>
                <option value="Samsung">Samsung</option>
                <option value="HP">HP</option>
                <option value="Asus">Asus</option>
                <option value="Hisense">Hisense</option>
                <option value="Sony">Sony</option>
                <option value="Xbox">Xbox</option>
                <option value="Apple">Apple</option>
                <option value="Logitech">Logitech</option>
            </select><br></br>
            <label for="modelo">Modelo: </label> <input type="text" name="modelo" id="modelo">
            <label for="precio">Precio: </label> <input type="number" name="precio" id="precio" placeholder="0.00" step="0.01">
            <label for="detalles">Detalles: </label> <textarea name="detalles" rows="5" id="detalles"></textarea>
            <label for="unidades">Unidades: </label> <input type="number" name="unidades" id="unidades" placeholder="0">
            <label for="imagen">URL de la imagen: (opcional)</label> <input type="text" name="imagen" id="imagen" placeholder="Ruta de la imagen">
        </fieldset>
        <input type="submit" value="Registrar Producto">
        <input type="reset" value="Limpiar Formulario">
    </form>

    <script>
        function esAlfanumerico(str) {
                for (var i=0; i<str.length; i++) {
                    var c=str[i];
                    if (!((c >= "A" && c <= "Z") || (c >= "a" && c <= "z") || (c >= "0" && c <= "9") || (c === "-" || c === " "))) {
                        return false;
                    }
                }
                return true;
            }
            
        function validarFormulario(){
            var nombre = document.getElementById("nombre").value.trim();
            var marca = document.getElementById("marca").value;
            var modelo = document.getElementById("modelo").value.trim();
            var precio = document.getElementById("precio").value;
            var detalles = document.getElementById("detalles").value;
            var unidades = document.getElementById("unidades").value;
            var imagen = document.getElementById("imagen");

            if(nombre === "" || nombre.length > 100){
                alert("El nombre es necesario y no debe tener una longitud mayor a 100 caracteres.");
                return false;
            }
            if(marca === ""){
                alert("Debes seleccionar una marca.");
                return false;
            }
            if(modelo === "" || modelo.length > 25 || esAlfanumerico(modelo) === false){
                alert("El modelo es requerido, su longitud no puede ser superior a 25 caracteres y debe estar en el sistema alfanumérico.");
                return false;
            }
            if(precio === "" || parseFloat(precio) < 100){
                alert("El precio es requerido y debe ser mayor a 99.99");
                return false;
            }
            if(detalles.length > 250){
                alert("Los detalles no deben exceder 250 caracteres");
                return false;
            }
            if(unidades === "" || parseInt(unidades)<0){
                alert("Las unidades son requeridas y deben ser mayores o iguales a 0.");
                return false;
            }
            if(imagen.value.trim() === ""){
                imagen.value="img/vacio.png";
            }
            return true;
        }
    </script>
</body>
</html>