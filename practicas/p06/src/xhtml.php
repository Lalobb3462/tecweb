<?php
    header("Content-Type: application/xhtml+xml");
    echo '<?xml version="1.0" encoding="UTF-8"?>'; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Formulario 1</title>
</head>
<body>
    
<?php
    if (isset($_POST['edad']) && isset($_POST['sexo']))
    {
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];

        if ($sexo === 'femenino' && $edad >= 18 && $edad <= 35)
        {
            echo "<p>Bienvenida, usted está en el rango de edad permitido.</p>";
        } 
        else 
        {
            echo "<p>Lo sentimos, no cumple con los requisitos solicitados.</p>";
        }
    }
?>
</body>
</html>
