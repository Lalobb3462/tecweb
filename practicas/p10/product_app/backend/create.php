<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        $nombre = $jsonOBJ->nombre;
        $marca = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;

        $sql = "SELECT * FROM productos WHERE eliminado = 0 
        AND ((nombre = '{$nombre}' AND marca = '{$marca}') 
        OR (marca = '{$marca}' AND modelo = '{$modelo}'))";
    
        $resultado = mysqli_query($conexion, $sql);

        if($resultado->num_rows > 0){
            echo "[SERVIDOR] El producto ya existe.";
        }
        else {
            $insercion =  "INSERT INTO productos (nombre, marca, modelo, precio, unidades, detalles, imagen, eliminado)
                VALUES ('$nombre', '$marca', '$modelo', $precio, $unidades, '$detalles', '$imagen', 0)";
            if(mysqli_query($conexion,$insercion)){
                echo '[SERVIDOR] Producto insertado con éxito: '. $nombre;
            }
            else{
                echo '[SERVIDOR] Error al insertar producto:'. mysqli_error($conexion);
            }
        }

    }

?>