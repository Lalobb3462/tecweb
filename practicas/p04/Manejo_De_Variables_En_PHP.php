<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN”
“http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Práctica 4 </title>
</head>
<body>
    <h1>Manejo de variables en PHP</h1>
    <h2>Inciso 1. Determina cuál de las siguientes variables son válidas y explica por qué: </h2><br>

    <?php
        echo '$_myvar es válida porque cumple con los estándares establecidos de PHP<br>';
        echo '$_7var es válida porque cumple con los estándares establecidos de PHP<br>';
        echo 'myvar no es válida al no empezar con $<br>';
        echo '$myvar porque cumple con los estándares establecidos de PHP<br>';
        echo '$var7 porque cumple con los estándares establecidos de PHP<br>';
        echo '$_element1 porque cumple con los estándares establecidos de PHP<br>';
        echo '$house*5 no es válida ya que * es un carácter especial<br>';
    ?>
</body>
</html>