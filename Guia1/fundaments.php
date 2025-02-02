<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica1</title>
</head>
<body>
    <?php

        $name = "Luis";
        $edad = 20;
        $lastname = "Mendez";
        echo "Hola, $name tiene $edad años <br>";    
        echo 'Mi nombre es ' . $name . ' ' . $lastname; 
        

        //Coercion de tipos

        $numero = 5;
        $numero2 = "5";

        var_dump($numero==$numero2);
        var_dump($numero===$numero2);

        //casting explicito

        $numero3=(int)$numero2;

        var_dump($numero===$numero3); 


    ?>
</body>
</html>