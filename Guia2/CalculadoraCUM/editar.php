<?php
if (isset($_POST['edit'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $uvs = $_POST['uvs'];
    $nota = $_POST['nota'];

    $materias = simplexml_load_file('materias.xml');

    foreach ($materias->materia as $materia) {
        if ($materia->codigo == $codigo) {
            $materia->nombre = $nombre;
            $materia->uvs = $uvs;
            $materia->nota = $nota;
            break;
        }
    }

    $materias->asXML('materias.xml');

    header("Location: calcuCUM.php?editado=1");
}
?>
