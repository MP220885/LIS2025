<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Editoriales</title>
    <?php include   'Views/cabecera.php'; ?>
    
</head>
<body>
    <?php include 'Views/menu.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <h3>Lista de Editoriales</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="<?= PATH.'/Editoriales/create'?>">Nuevo Editorial</a>
                <br><br>
                <table class="table table-striped table-bordered" id="tabla">
                    <thead class="table-dark">
                        <tr>
                            <th>Código del Editorial</th>
                            <th>Nombre del Editorial</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($editoriales as $editorial): ?>

                                <tr>
                                    <td><?=$editorial['codigo_editorial']?></td>
                                    <td><?=$editorial['nombre_editorial']?></td>
                                    <td><?=$editorial['contacto']?></td>
                                    <td><?=$editorial['telefono']?></td>
                                    <td>
                                    <button class="btn btn-success btn-sm me-1" onclick="openEditModal('<?= $editorial['codigo_editorial'] ?>', '<?= $editorial['nombre_editorial'] ?>', '<?= $editorial['contacto'] ?>', '<?= $editorial['telefono'] ?>')">Editar</button>
    
                                    <a href="<?= PATH.'/Editoriales/delete/'.$editorial['codigo_editorial']?>" class="btn btn-danger btn-sm">Eliminar</a>
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
    <h3>Editar Editorial</h3>
    <form id="editForm" action="<?= PATH.'/Editoriales/update' ?>" method="POST">
        <input type="hidden" id="codigo_editorial" name="codigo_editorial">
        <div class="mb-3">
            <label for="nombre_editorial" class="form-label">Nombre Editorial</label>
            <input type="text" class="form-control" id="nombre_editorial" name="nombre_editorial" required>
        </div>
        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Cancelar</button>
    </form>
</div>

   
</body>

<script>
        function openEditModal(codigo, nombre, contacto, telefono) {
            document.getElementById('codigo_editorial').value = codigo;
            document.getElementById('nombre_editorial').value = nombre;
            document.getElementById('contacto').value = contacto;
            document.getElementById('telefono').value = telefono;
            document.getElementById('editModal').style.display = 'block';
        }
        
function isText(value) {
    return /^[a-zA-Z áéíóúÁÉÍÓÚ]+$/.test(value);
}


function isPhone(value) {
    return /^[267][0-9]{3}-[0-9]{4}$/.test(value);
}


document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    let nombreEditorial = document.getElementById('nombre_editorial').value.trim();
    let contacto = document.getElementById('contacto').value.trim();
    let telefono = document.getElementById('telefono').value.trim();

   
    if (nombreEditorial === "") {
        alert("El nombre de la editorial es obligatorio.");
        return;
    }

    
    if (!isText(contacto)) {
        alert("El campo 'Contacto' solo puede contener letras y espacios.");
        return;
    }

    
    if (!isPhone(telefono)) {
        alert("El teléfono debe seguir el formato correcto");
        return;
    }

    
    this.submit();
});


function closeEditModal() {
    document.getElementById("editModal").style.display = "none";
}

    </script>
</html>