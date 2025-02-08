<?php 
$edades=[10,14,15,16];

echo $edades[0]."<br/>";

$edades[1]=28; //Modificando un elemento
array_push($edades,100); //Añadiendo un nuevo elemento
$edades[10]=65;

unset($edades[0]); //Eliminando posicion 0

print_r($edades);

echo "<h2>Recorrieno el arreglo</h2>";
foreach($edades as $edad){
    echo "<p>$edad</p>";
}

$tamaño=count($edades);
echo "<p>El tamaño del arreglo es $tamaño</p>";

//ordenando el arreglo

sort($edades); //Ordena de forma mutable
$edades=array_reverse($edades); //Invertimos el orden de forma inmutable
print_r($edades);

$datos_personales=[];
$datos_personales['nombre']="Luis";
$datos_personales['apellido']="Mendez";
$datos_personales['estatura']=1.76;
$datos_personales['genero']="Masculino";

print_r($datos_personales);


echo "<h2>Imprimiendo los elementos del arreglo asociativo</h2>";

foreach($datos_personales as $clave =>$dato){
    echo "<p>$clave : $dato</p>";

}


$persona2=[
    'nombre'=>"Juan",
    'apellido'=>"Perez",
    'estatura'=>1.8,
    'genero'=>"Masculino"
];

print_r($persona2);


?>