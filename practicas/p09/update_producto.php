<?php
$link = mysqli_connect("localhost", "root", "Youtube1", "marketzone");

if($link === false){
    die("ERROR: No se pudo conectar con la DB. " . mysqli_connect_error());
}

$id = intval($_POST['id']);
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = floatval($_POST['precio']);
$unidades = intval($_POST['unidades']);
$detalles = $_POST['detalles'];
$imagen = isset($_POST['imagen']) && $_POST['imagen'] != '' ? $_POST['imagen'] : 'img/vacio.png';
$imagen = (!empty($_POST['imagen'])) ? $_POST['imagen'] : 'img/vacio.png';

$sql = "UPDATE productos SET 
            nombre='$nombre',
            marca='$marca',
            modelo='$modelo',
            precio=$precio,
            unidades=$unidades,
            detalles='$detalles',
            imagen='$imagen'
        WHERE id=$id";

if(mysqli_query($link, $sql)){
    echo "Producto actualizado correctamente.";
    echo "<br><a href='get_productos_xhtml_v2.php'>Ver productos por cantidad máxima</a>";
    echo "<br><a href='get_productos_vigentes_v2.php'>Ver productos vigentes</a>";
} else {
    echo "ERROR: No se ejecutó la consulta. " . mysqli_error($link);
}

mysqli_close($link);
?>