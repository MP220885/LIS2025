<?php

require_once 'Controller.php';
require_once 'Models/AutoresModel.php';
require_once 'Utils/validaciones.php';


class AutoresController extends Controller{
    private $model;

    function __construct(){
        $this->model= new AutoresModel();
    }

    public function index(){
        $viewBag=[];
        $viewBag['autores']=$this ->model->get();
        $this->render("index.php",$viewBag);
    }

    public function create(){
        $this->render("new.php");
    }

    public function insert(){

        $viewBag=[];

        if(isset($_POST)){
        $errores=array();
        $autor['codigo_autor']=$_POST['codigo_autor'];
        $autor['nombre_autor']=$_POST['nombre_autor'];
        $autor['nacionalidad']=$_POST['nacionalidad'];

        if(!isCodigoAutor($autor['codigo_autor'])){
            array_push($errores,"El codigo debe seguir el formato AUTXXX");
            
        }

        if(empty($autor['nombre_autor'])){
            array_push($errores,"Debe ingresar el nombre del autor");

        }

        if(!isText($autor['nacionalidad'])){
            array_push($errores,"Nacionalidad Incorrecta");
           
        }

        

        if(count($errores)==0){
           if( $this->model->insert($autor)!=0){
            header('location:'.PATH.'/Autores');

           }else
           {
            array_push($errores,"Ya existe un autor con este codigo");
            $viewBag['errores']=$errores;
            $viewBag['autor']=$autor;
            $this->render('new.php',$viewBag);
           }
        }
        else{
            $viewBag['errores']=$errores;
            $viewBag['autor']=$autor;
            $this->render('new.php',$viewBag);
        }

        
       }

    }

    public function delete($params){
        $codigo=$params[0];
        $this->model->delete($codigo);
        header('location:'.PATH.'/Autores');

    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $autor = [
                'codigo_autor' => $_POST['codigo_autor'],
                'nombre_autor' => $_POST['nombre_autor'],
                'nacionalidad' => $_POST['nacionalidad']
            ];
            $this->model->update($autor);
        }
        header('Location: ' . PATH . '/Autores');
        exit;
    }

    
    
     
}

?>