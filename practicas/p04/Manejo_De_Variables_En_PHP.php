<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN”
“http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Práctica 4 </title>

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
        @$c = $b*10;
        echo "Variable de \$c: $c<br>";
        $a .= $b;
        echo "Variable de \$a: $a<br>";
        @$b *= $c;
        echo "Variable de \$b: $b<br>";
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
        @$c = $b*10;
        echo "Variable de \$c: " . $GLOBALS['c'] . "<br>";
        $a .= $b;
        echo "Variable de \$a: " . $GLOBALS['a'] . "<br>";
        @$b *= $c;
        echo "Variable de \$b: " . $GLOBALS['b'] . "<br>";
        $z[0] = "MySQL";
        echo "Variable de \$z[]: ";
        print_r($GLOBALS['z']);
        echo "<br>";
        unset ($a, $b, $c, $z)
    ?>


</body>
</html>