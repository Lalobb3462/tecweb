<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
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
</body>
</html>