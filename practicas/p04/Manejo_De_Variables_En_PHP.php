<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Práctica 4 </title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f9; 

            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            background-color: #dfe6e9;
            padding: 10px;
            border-radius: 8px;
        }
        h2 {
            color: #0984e3;
            margin-top: 20px;
        }
        p {
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h1>Manejo de variables en PHP</h1>
    <h2>Pregunta 1. Determina cuál de las siguientes variables son válidas y explica por qué: </h2><br>
    <?php
        echo '$_myvar es válida porque cumple con los estándares establecidos de PHP<br>';
        echo '$_7var es válida porque cumple con los estándares establecidos de PHP<br>';
        echo 'myvar no es válida al no empezar con $<br>';
        echo '$myvar porque cumple con los estándares establecidos de PHP<br>';
        echo '$var7 porque cumple con los estándares establecidos de PHP<br>';
        echo '$_element1 porque cumple con los estándares establecidos de PHP<br>';
        echo '$house*5 no es válida ya que * es un carácter especial<br>';
    ?>
    <br>
    <h2>Pregunta 2. Proporcionar los valores de $a, $b, $c como sigue:</h2>
    <?php
        echo "<p>\$a = \"ManejadorSQL\"<br>
                \$b = 'MySQL'<br>
                \$c = &\$a;        
        </p>";
        
        echo "<h3>a. Mostrar el contenido de cada variable </h3>";
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;
        echo "Variable \$a:  $a <br>";
        echo "Variable \$b:  $b <br>";
        echo "Variable \$c:  $c <br>";
        echo "<h3>b. Agregar al código actual las siguientes asignaciones: </h3>";
        $a = "PHP server";
        $b = &$a;
        echo "<p>\$a = \"PHP server\"<br> 
                \$b = &\$a;        
        </p>";
        echo "<h3>c. Volver a mostrar el contenido de cada uno </h3>";
        echo "Variable \$a:  $a <br>";
        echo "Variable \$b:  $b <br>";
        echo "Variable \$c:  $c <br>";
        echo "<h3>d. Describir que sucedió en el segundo bloque de asignaciones</h3>";
        echo "En la segunda asignación la variable b y c obtuvieron el contenido actual de la variable a, el cual era \"PHP server\" en el momento de su obtención.";
        unset ($a, $b, $c)
    ?>
    <br>
    <h2>Pregunta 3. Muestra el contenido de cada variable inmediatamente 
        después de cada asignación, verificar la evolución del tipo de estas 
        variables (imprime todos los componentes de los arreglos):
    </h2>
    <?php
        $a = "PHP5";
        echo "Variable de \$a: $a<br>";
        $z[] = &$a;
        echo "Variable de \$z[]: ";
        print_r($z);
        echo "<br>";
        $b = " 5a versión de PHP";
        echo "Variable de \$b: $b<br>";
        $c = (integer) $b*10;
        echo "Variable de \$c: $c<br>";
        $a .= $b;
        echo "Variable de \$a: $a<br>";
        $b = (integer)$b;
        $b *= $c;
        echo "Variable de \$b: $b<br>";
        $b = " 5a versión de PHP";
        $z[0] = "MySQL";
        echo "Variable de \$z[]: ";
        print_r($z);
        echo "<br>";
        unset ($a, $b, $c, $z)
    ?>
    <br>
    <h2>Pregunta 4. Lee y muestra los valores de las variables del ejercicio
        anterior, pero ahora con la ayuda de la matriz $GLOBALS o del modificador global de PHP
    </h2>
    <?php
        $a = "PHP5";
        echo "Variable de \$a: " . $GLOBALS['a'] . "<br>";
        $z[] = &$a;
        echo "Variable de \$z[]: ";
        print_r($GLOBALS['z']);
        echo "<br>";
        $b = " 5a versión de PHP";
        echo "Variable de \$b: " . $GLOBALS['b'] . "<br>";
        $c = (integer)$b*10;
        echo "Variable de \$c: " . $GLOBALS['c'] . "<br>";
        $a .= $b;
        echo "Variable de \$a: " . $GLOBALS['a'] . "<br>";
        $b = (integer)$b;
        $b *= $c;
        echo "Variable de \$b: " . $GLOBALS['b'] . "<br>";
        $b = " 5a versión de PHP";
        $z[0] = "MySQL";
        echo "Variable de \$z[]: ";
        print_r($GLOBALS['z']);
        echo "<br>";
        unset ($a, $b, $c, $z)
    ?>
    <br>
    <h2>Pregunta 5. Dar el valor de las variables $a, $b, $c al final del siguiente script:</h2>
    <?php
        echo "\$a = \"7 personas\"<br>";
        echo "\$b = (integer) \$a <br>";
        echo "\$a = \"9E3\"<br>";
        echo "\$c = (double) \$a<br><br>";
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a;
        echo "Variable \$a: $a <br>";
        echo "Variable \$b: $b <br>";
        echo "Variable \$c: $c <br>";
        unset($a, $b, $c)
    ?>
    <br>
    <h2>Pregunta 6. Dar y comprobar el valor booleano de las variables 
        $a, $b, $c, $d, $e, y $f y muéstralas usando la función 
        var_dump (datos)</h2>
    <?php
        echo "\$a = \"0\"<br>";
        echo "\$b = \"TRUE\"<br>";
        echo "\$c = \"FALSE\"<br>";
        echo "\$d = (\$a OR \$b)<br>";
        echo "\$e = (\$a AND \$c)<br>";
        echo "\$f = (\$a XOR \$b)<br>";
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $b);
        $f = ($a XOR $b);
        echo "<br>";
        var_dump($a);
        echo "<br>";
        var_dump($b);
        echo "<br>";
        var_dump($c);
        echo "<br>";
        var_dump($d);
        echo "<br>";
        var_dump($e);
        echo "<br>";
        var_dump($f);
        
        echo "<h3>Después investiga una función de PHP que permita transformar el valor
                  booleano de \$c y \$e en uno que se pueda mostrar con un echo</h3>";
        echo " var_export() devuelve datos estructurados sobre la variable dada.
                Es el mismo principio que var_dump() pero con una excepción: el resultado
                devuelto es código PHP válido. <br> Usa dos parámteros: value (la variable 
                que se desea exportar) y return (si se establece en true, var_export() devolverá
                la representación de la variable en lugar de mostrarla.";
                  echo "<br>Con var_export(): <br>";
        echo "c = " . var_export($c, true) . "<br>";
        echo "e = " . var_export($e, true) . "<br>";
        unset($a, $b, $c, $d, $e, $f);
    ?>
    <h2>Pregunta 7. Usando la variable predefinida $_SERVER, determina lo siguiente:</h2>
    <h3>a. La versión de Apache y PHP</h3>
    <?php
        echo $_SERVER['SERVER_SOFTWARE'];
    ?>
    <h3>b. El nombre del sistema operativo (servidor)</h3>
    <?php
        echo PHP_OS;
    ?>
    <h3>El idioma del navegador (cliente)</h3>
    <?php
        echo $_SERVER["HTTP_ACCEPT_LANGUAGE"];
    ?>
</body>
</html>