<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 20px;
            line-height: 1.5;
            color: #333;
        }

        h2, h3, h4 {
            text-align: center;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <?php
    function multiplo5_7()
    {
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    }
    ?>

    <?php
    function impar_par_impar()
    {
        $matriz=[];
        $iteraciones_totales = 0;
        $encontrado=false;

        while($encontrado==false){
            $fila=[];
            for($j=0;$j<3;$j++){
                $fila[$j]= mt_rand(1,999);
            }
            $matriz[$iteraciones_totales]=$fila;
            $iteraciones_totales++;

            if($fila[0] % 2 != 0 && $fila[1] % 2 == 0 && $fila[2] % 2 != 0){
                $encontrado=true;
            }
        }
        echo "Matriz generada: <br>"; 
        foreach($matriz as $fila){
            print_r($fila);
            echo "<br>";
        }
        
        $total_numeros= $iteraciones_totales * 3;
        echo "<br>";
        echo "$total_numeros números obtenidos en $iteraciones_totales iteraciones.";
    }
    ?>

    <?php
    function entero_multiplo_while()
    {
        if(isset($_GET['multiplo']))
        {
            $multiplo = $_GET['multiplo'];
            $hallado = false;
            while($hallado == false)
            {
                $entero = mt_rand(1,100);
                echo "El número aleatorio es $entero. <br>";
                if($entero % $multiplo == 0)
                {
                    $hallado = true;
                    echo "El número $entero es multiplo de $multiplo. <br>";
                }
            }
        }
    }
    function entero_multiplo_DoWhile()
    {
        if(isset($_GET['multiplo']))
        {
            $multiplo = $_GET['multiplo'];
            $hallado = false;
            do{
                $entero = mt_rand(1,100);
                echo "El número aleatorio es $entero. <br>";
                if($entero % $multiplo == 0)
                {
                    $hallado = true;
                    echo "El número $entero es multiplo de $multiplo. <br>";
                }
            }while($hallado == false);
        }
    }
    ?>

    <?php
    function ascii_a_letras()
    {
        $arreglo_indices=[];
        for($i=97; $i<=122; $i++)
        {
            $arreglo_indices[$i]=chr($i);
        } 

        echo "<table border='1' cellpadding='3' > <tr><th> Tabla ASCII </th><th>Letra</th></tr>";
        foreach ($arreglo_indices as $key => $value)
        {
            echo "<tr><td>" . $key . "</td>";
            echo "<td>" . $value . "</td></tr>";
        }
        echo "</table>";
    }
    ?>

    <?php
        $parque_vehicular = [
            "ABC1234" => 
            [
                "Auto" => ["marca" => "HONDA", "modelo" => 2020, "tipo" => "camioneta"],
                "Propietario" => ["nombre" => "Alfonzo Esparza", "ciudad" => "Puebla, Pue.", "direccion" => "C.U., Jardines de San Manuel"]
            ],
            "DEF5678" => 
            [
                "Auto" => ["marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"],
                "Propietario" => ["nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla, Pue.", "direccion" => "97 oriente"]
            ],
            "GHI9012" => 
            [
                "Auto" => ["marca" => "TOYOTA", "modelo" => 2018, "tipo" => "hatchback"],
                "Propietario" => ["nombre" => "Carlos Mendoza", "ciudad" => "Cholula, Pue.", "direccion" => "Av. Reforma 45"]
            ],
            "JKL3456" => 
            [
                "Auto" => ["marca" => "NISSAN", "modelo" => 2021, "tipo" => "sedan"],
                "Propietario" => ["nombre" => "Mariana Ruiz", "ciudad" => "Puebla, Pue.", "direccion" => "Calle 10 #20"]
            ],
            "MNO7890" => 
            [
                "Auto" => ["marca" => "FORD", "modelo" => 2022, "tipo" => "camioneta"],
                "Propietario" => ["nombre" => "Pedro López", "ciudad" => "Tehuacán, Pue.", "direccion" => "Av. Principal 12"]
            ],
            "PQR2345" => 
            [
                "Auto" => ["marca" => "CHEVROLET", "modelo" => 2017, "tipo" => "sedan"],
                "Propietario" => ["nombre" => "Ana Torres", "ciudad" => "Puebla, Pue.", "direccion" => "Calle 5 #30"]
            ],
            "STU6789" => 
            [
                "Auto" => ["marca" => "KIA", "modelo" => 2020, "tipo" => "hatchback"],
                "Propietario" => ["nombre" => "Luis García", "ciudad" => "Atlixco, Pue.", "direccion" => "Av. Hidalgo 101"]
            ],
            "VWX0123" => 
            [
                "Auto" => ["marca" => "HONDA", "modelo" => 2019, "tipo" => "sedan"],
                "Propietario" => ["nombre" => "Sofía Ramírez", "ciudad" => "Puebla, Pue.", "direccion" => "Calle 22 #7"]
            ],
            "YZA4567" => 
            [
                "Auto" => ["marca" => "TOYOTA", "modelo" => 2021, "tipo" => "camioneta"],
                "Propietario" => ["nombre" => "Ricardo Hernández", "ciudad" => "Puebla, Pue.", "direccion" => "Boulevard Norte 15"]
            ],
            "BCD8901" => 
            [
                "Auto" => ["marca" => "MAZDA", "modelo" => 2018, "tipo" => "sedan"],
                "Propietario" => ["nombre" => "Verónica Pérez", "ciudad" => "San Andrés, Pue.", "direccion" => "Calle 18 #50"]
            ],
            "DOP2845" => 
            [
                "Auto" => ["marca" => "NISSAN", "modelo" => 2022, "tipo" => "hatchback"],
                "Propietario" => ["nombre" => "Jorge Ramírez", "ciudad" => "Puebla, Pue.", "direccion" => "Av. Reforma 78"]
            ],
            "HIJ6789" => 
            [
                "Auto" => ["marca" => "FORD", "modelo" => 2019, "tipo" => "sedan"],
                "Propietario" => ["nombre" => "Lucía Martínez", "ciudad" => "Puebla, Pue.", "direccion" => "Calle 3 #12"]
            ],
            "KLM0123" => 
            [
                "Auto" => ["marca" => "CHEVROLET", "modelo" => 2020, "tipo" => "camioneta"],
                "Propietario" => ["nombre" => "Andrés Gómez", "ciudad" => "Cholula, Pue.", "direccion" => "Av. Central 5"]
            ],
            "NOP4567" => 
            [
                "Auto" => ["marca" => "KIA", "modelo" => 2021, "tipo" => "sedan"],
                "Propietario" => ["nombre" => "Isabel Sánchez", "ciudad" => "Puebla, Pue.", "direccion" => "Calle Reforma 99"]
            ],
            "QRS8901" => 
            [
                "Auto" => ["marca" => "HONDA", "modelo" => 2018, "tipo" => "hatchback"],
                "Propietario" => ["nombre" => "Mario Flores", "ciudad" => "Atlixco, Pue.", "direccion" => "Calle 12 #3"]
            ]
];
        

    function mostrar_auto($matricula) {
    global $parque_vehicular;

    if (isset($parque_vehicular[$matricula])) {
        $vehiculo = $parque_vehicular[$matricula];
        echo "<h2>Información del vehículo $matricula:</h2>";
        echo "<b>Marca: </b>" . $vehiculo["Auto"]["marca"] . "<br>";
        echo "<b>Modelo: </b>" . $vehiculo["Auto"]["modelo"] . "<br>";
        echo "<b>Tipo: </b>" . $vehiculo["Auto"]["tipo"] . "<br>";
        echo "<b>Propietario: </b>" . $vehiculo["Propietario"]["nombre"] . "<br>";
        echo "<b>Ciudad: </b>" . $vehiculo["Propietario"]["ciudad"] . "<br>";
        echo "<b>Dirección: </b>" . $vehiculo["Propietario"]["direccion"] . "<br>";
    } else {
        echo "<p>No se encontró un vehículo con esa matrícula</p>";
    }
    }
    function mostrar_todos_los_vehiculos() {
    global $parque_vehicular;
    echo "<h2>Todos los vehículos registrados:</h2>";
    foreach ($parque_vehicular as $matricula => $vehiculo) {
        echo "<b>Matricula: </b> $matricula <br>";
        echo "<b>Marca: </b>" . $vehiculo["Auto"]["marca"] . "<br>";
        echo "<b>Modelo: </b>" . $vehiculo["Auto"]["modelo"] . "<br>";
        echo "<b>Tipo: </b>" . $vehiculo["Auto"]["tipo"] . "<br>";
        echo "<b>Propietario: </b>" . $vehiculo["Propietario"]["nombre"] . "<br>";
        echo "<b>Ciudad: </b>" . $vehiculo["Propietario"]["ciudad"] . "<br>";
        echo "<b>Dirección: </b>" . $vehiculo["Propietario"]["direccion"] . "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
    }
}


    ?>

</body>
</html>