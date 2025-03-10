<?php 

include 'validaciones.php';

session_start();//iniciando
if(!empty($_POST)){

    $errores=[];
    extract($_POST);
 

    if(empty(trim($nombres))){
       array_push($errores,"Se debe ingresar los nombres");
    }
    else if(!isText(trim($nombres)))
    {
        array_push($errores,"Nombre no valido");
    }

    
    if(empty(trim($apellidos))){
        array_push($errores,"Se debe ingresar los apellidos");
     }
     else if(!isText(trim($apellidos)))
     {
         array_push($errores,"Apellido no valido");
     }


     if(empty(trim($carnet))){
        array_push($errores,"Se debe ingresar el carnet");
     }
     else if(!isCarnet(trim($carnet)))
     {
         array_push($errores,"Carnet no valido");
     }


     if(empty(trim($telefono))){
        array_push($errores,"Se debe ingresar el número");
     }
     else if(!isPhone(trim($telefono)))
     {
         array_push($errores,"Número no valido");
     }

     if(empty(trim($correo))){
        array_push($errores,"Se debe ingresar el correo");
     }
     else if(!isMail(trim($correo)))
     {
         array_push($errores,"Correo no valido");
     }


     if (empty($errores)){
        echo "<h1>Usuario registrado exitosamente</h1>";
     }else{
        $_SESSION['errores']=$errores;
        $_SESSION['datos']=['nombres'=>$nombres,
                            'apellidos'=>$apellidos,
                            'carnet'=>$carnet,
                            'correo'=>$correo,
                            'telefono'=>$telefono];

        
        header('Location:index.php');
     }


}

?>