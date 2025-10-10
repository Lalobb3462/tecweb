<?php
$nombre = $_POST['nombre'] ?? '';
$marca = $_POST['marca'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$precio = $_POST['precio'] ?? 0;
$detalles = $_POST['detalles'] ?? '';
$unidades = $_POST['unidades'] ?? 0;
$imagen = $_POST['imagen'] ?? '';

@$link = new mysqli('localhost', 'root', 'Youtube1', 'marketzone');	

if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

$validacion_existencia = "SELECT * FROM productos WHERE nombre='$nombre' AND marca='$marca' AND modelo='$modelo'";
$resultado = $link->query($validacion_existencia);

if($resultado->num_rows > 0)
{
    echo "<title>Error en el registro</title><h1>Ya existe un producto con nombre $nombre, marca $marca o modelo $modelo en nuestra base de datos.<h1>";
    echo '<br><a href="formulario_productos.html">Volver al formulario</a>';
}
else
{
    $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
    if ($link->query($sql)) {
        echo"<title>Producto Registrado</title>
            <h1>Producto registrado con éxito</h1>
            <ul>
                <li><strong>Nombre:</strong> $nombre</li>
                <li><strong>Marca:</strong> $marca</li>
                <li><strong>Modelo:</strong> $modelo</li>
                <li><strong>Precio:</strong> $precio</li>
                <li><strong>Detalles:</strong> $detalles</li>
                <li><strong>Unidades:</strong> $unidades</li>
                <li><strong>Imagen:</strong> $imagen</li>
            </ul>
            <p><a href='formulario_productos.html'>Registrar otro producto</a></p>";
    } else {
        echo "<title>Error al insertar</title>
              <h1>Error al insertar el producto en la base de datos.</h1>
              <p>".$link->error."</p>
              <p><a href='formulario_productos.html'>Volver al formulario</a></p>";
    }
}

$link->close();
?>