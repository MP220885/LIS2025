<?php

/*HECHO EN EL LABORATORIO

include_once 'Models/EditorialesModel.php';
$model = new EditorialesModel();
$editorial=[
    'codigo_editorial'=>"EDI784",
    'nombre_editorial'=>"Prueba UPDATE",
    'contacto'=>"Guillermo",
    'telefono'=>"33333333"
];
echo $model->insert($editorial);
echo $model->delete('EDI784');
echo $model->update($editorial);

var_dump($model->get(''));*/

include_once 'Models/AutoresModel.php';
$model = new AutoresModel();
$autores=[
    'codigo_autor'=>"AUT013",
    'nombre_autor'=>"Luis Mendez",
    'nacionalidad'=>"Aleman",
];
//echo $model->insert($autores);
//echo $model->delete('AUT013');
//echo $model->update($autores);

var_dump($model->get(''));

