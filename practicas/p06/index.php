<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>

    <?php
        include "src/funciones.php";
    ?>

    <?php
    multiplo5_7();
    ?>

    <h2>Ejercicio 2 </h2>
    <p>Crea un programa para la generación repetitiva de 3 números 
    aleatorios hasta obtener una secuencia compuesta por: impar, par, impar. </p>

    <?php
        impar_par_impar();
    ?>

    <h3>Ejercicio 3</h3>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>
    <ul>
        <li>Crear una variante de este script utilizando el ciclo do-while.</li>
        <li>El número dado se debe obtener vía GET.</li>
    </ul>
    <?php
        echo "<b>Con ciclo While</b><br>";
        entero_multiplo_while();
        echo "<br>" 
    ?>
    <?php
        echo "<b>Con ciclo DoWhile</b><br>";
        entero_multiplo_DoWhile();
        echo "<br>"
    ?>

    <h3>Ejercicio 4</h3>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la 'a' a la 'z'. 
    Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner el valor en cada índice.</p>
    <ul>
        <li>Crea el arreglo con un ciclo for.</li>
        <li>Lee el arreglo y crea una tabla en XHTML con echo y un ciclo foreach</li>
    </ul>

    <?php
        ascii_a_letras();
    ?>

    

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p06/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>


</body>
</html>