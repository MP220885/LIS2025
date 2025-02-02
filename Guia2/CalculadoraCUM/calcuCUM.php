<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora de CUM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>


    </head>
<body>


<div class="container">
    <h1 class="page-header text-center">Calculadora de CUM</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar materia</a>
            
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Uv</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </thead>
                <tbody>

                    <?php
                        $materias=simplexml_load_file('materias.xml');
                        //var_dump($materias); muestra el contenido de la variable
                        
                        $cum=0;
                        $numerador=0;
                        $denominador=0;

                        foreach($materias->materia as $materia)
                        {

                            $numerador+=$materia->nota*$materia->uvs;
                            $denominador+=$materia->uvs;



                    ?>
                <tr>
                    <td><?=$materia->codigo?></td>
                    <td><?=$materia->nombre?></td>
                    <td><?=$materia->uvs?></td>
                    <td><?=$materia->nota?></td>
                    <td>
                    <a href="#edit<?=$materia->codigo?>" class="btn btn-success" data-toggle="modal">Editar</a>
                    <a href="borrar.php?codigo=<?=$materia->codigo?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>



                <!-- Boton editar -->

<?php foreach($materias->materia as $materia) { ?>


<div class="modal fade" id="edit<?=$materia->codigo?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title">Editar Materia</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editar.php">
                        <input type="hidden" name="codigo" value="<?=$materia->codigo?>">
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" value="<?=$materia->nombre?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label">UVS:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" min="2" max="5" class="form-control" name="uvs" value="<?=$materia->uvs?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Nota:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" min="0" max="10" step="0.1" class="form-control" name="nota" value="<?=$materia->nota?>" required>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="edit" class="btn btn-primary">Guardar cambios</button>
            </div>
                    </form>
        </div>
    </div>
</div>


<?php } ?>


        <?php }?>
                
                </tbody>
            </table>

            <?php 

                if($denominador!=0)
                {
                    $cum=round($numerador/$denominador,2);
                    
                    echo "<h2>CUM: $cum</h2>";
                }
            ?>
            
         
        </div>
    </div>
</div>

<?php 

include_once('nueva_modal.php');
if(isset($_GET['exito'])){
?>

<script>
    alertify.success('Materia Agregada Correctamente');
</script>

<?php
}
?>

<?php 

include_once('nueva_modal.php');
if (isset($_GET['editado'])){
?>

<script>
    alertify.success('Materia editada correctamente');
</script>

<?php
}
?>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>