<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <?php include   'Views/cabecera.php'; ?>
    
</head>
<body>
    <?php include 'Views/menu.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <h3>Lista de Autores</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="<?= PATH.'/Autores/create'?>">Nuevo Autor</a>
                <br><br>
                <table class="table table-striped table-bordered" id="tabla">
                    <thead class="table-dark">
                        <tr>
                            <th>Código del Autor</th>
                            <th>Nombre del Autor</th>
                            <th>Nacionalidad</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($autores as $autor): ?>

                                <tr>
                                    <td><?=$autor['codigo_autor']?></td>
                                    <td><?=$autor['nombre_autor']?></td>
                                    <td><?=$autor['nacionalidad']?></td>
                                    <td>
                                    <button class="btn btn-success btn-sm me-1" onclick="openEditModal('<?= $autor['codigo_autor'] ?>', '<?= $autor['nombre_autor'] ?>', '<?= $autor['nacionalidad'] ?>')">Editar</button>
    
                                    <a href="<?= PATH.'/Autores/delete/'.$autor['codigo_autor']?>" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>

                                </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Modal de Edición -->
     

    <div id="editModal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:white; padding:20px; border:1px solid black;">
    <h3>Editar Autor</h3>
    <form id="editForm" action="<?= PATH.'/Autores/update' ?>" method="POST">
        <input type="hidden" id="codigo_autor" name="codigo_autor">
        <div class="mb-3">
            <label for="nombre_autor" class="form-label">Nombre Autor</label>
            <input type="text" class="form-control" id="nombre_autor" name="nombre_autor" required>
        </div>
        <div class="mb-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Cancelar</button>
    </form>
</div>

   
</body>

<script>
        function openEditModal(codigo, nombre, nacionalidad) {
            document.getElementById('codigo_autor').value = codigo;
            document.getElementById('nombre_autor').value = nombre;
            document.getElementById('nacionalidad').value = nacionalidad;
            document.getElementById('editModal').style.display = 'block';
        }
        
function isText(value) {
    return /^[a-zA-Z áéíóúÁÉÍÓÚ]+$/.test(value);
}





document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    let nombreAutor = document.getElementById('nombre_autor').value.trim();
    let nacionalidad = document.getElementById('nacionalidad').value.trim();

   
    if (nombreAutor === "") {
        alert("El nombre del Autor es obligatorio.");
        return;
    }

    
    if (!isText(nacionalidad)) {
        alert("El campo 'Nacionalidad' solo puede contener letras y espacios.");
        return;
    }

    

    
    this.submit();
});


function closeEditModal() {
    document.getElementById("editModal").style.display = "none";
}

    </script>
</html>