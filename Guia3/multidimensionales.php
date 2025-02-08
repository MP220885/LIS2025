<?php 

$alumnos=[

    [
        'nombre'=>'Luis',
        'apellido'=>'Mendez',
        'carnet'=>'MP220885',
        'CUM'=>8,
        'materias'=>['LIS104','APN501','PED104']
    ],


    [
        'nombre'=>'Miguel',
        'apellido'=>'Flores',
        'carnet'=>'FR220885',
        'CUM'=>6,
        'materias'=>['LIS104','APN501','PED104']
    ],


    [
        'nombre'=>'Laura',
        'apellido'=>'Martinez',
        'carnet'=>'MA220885',
        'CUM'=>7,
        'materias'=>['LIS104','APN501','PED104']
    ]

    ];

   


?>
<table>

<tr>
    <td>Nombre</td>
    <td>Apellido</td>
    <td>Carnet</td>
    <td>CUM</td>
    <td>Materias Inscritas</td>
</tr>

<?php

foreach($alumnos as $alumno){

    ?>

<tr>
    <td><?=$alumno['nombre']?></td>
    <td><?=$alumno['apellido']?></td>
    <td><?= $alumno['carnet']?></td>
    <td><?= $alumno['CUM']?></td>
    <td><?= implode(' ',$alumno['materias'],) ?></td>

    
</tr>

<?php } ?>



</table>

    
