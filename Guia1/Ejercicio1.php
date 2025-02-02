<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <?php 
    
    $nombre= 'Luis Antonio Méndez Parada';
    $nacimiento= 'San Salvador, El Salvador';
    $edad= 20;
    $carnet= 'MP220885';

    ?>
     
    <div class="container">
    
        <div class="row">     
       
       <h2 style='text-align: center;'>Datos Personales</h2>
            <table class="table table-bordered" >

            
                <tr>
                    <td>Nombre</td>
                    <td><?=$nombre?></td>
                </tr>
                <tr>
                    <td>Lugar de nacimiento</td>
                    <td><?=$nacimiento?></td>
                </tr>
                <tr>
                    <td>Edad</td>
                    <td><?=$edad?></td>
                </tr>
                <tr>
                    <td>Carnet</td>
                    <td><?=$carnet?></td>
                </tr>
                
</body>
</html>