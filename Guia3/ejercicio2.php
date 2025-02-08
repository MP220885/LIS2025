<?php

$estudiantes = array(
    "Luis Mendez" => array("Tarea" => 8.5, "Investigación" => 9.0, "Examen" => 8.0),
    "Paulina Moran" => array("Tarea" => 7.8, "Investigación" => 8.8, "Examen" => 8.5),
    "Isabella Ruano" => array("Tarea" => 9.2, "Investigación" => 8.0, "Examen" => 7.5),
);

// Ponderacion de cada actividad
$ponderaciones = array("Tarea" => 0.50, "Investigación" => 0.30, "Examen" => 0.20);

echo "<table border='1' cellspacing='0' cellpadding='10' style='border-collapse: collapse; text-align: center; width: 60%; margin: auto; font-family: Arial;'>";
echo "<tr style='background-color: #f2f2f2;'>
        <th>Estudiante</th>
        <th>Tarea (50%)</th>
        <th>Investigación (30%)</th>
        <th>Examen (20%)</th>
        <th colspan='2'>Promedio</th>
      </tr>";

foreach ($estudiantes as $nombre => $notas) {
    // Calcular el promedio 
    $promedio = ($notas["Tarea"] * $ponderaciones["Tarea"]) +
                ($notas["Investigación"] * $ponderaciones["Investigación"]) +
                ($notas["Examen"] * $ponderaciones["Examen"]);

    echo "<tr>
            <td>$nombre</td>
            <td>{$notas['Tarea']}</td>
            <td>{$notas['Investigación']}</td>
            <td>{$notas['Examen']}</td>
            <td colspan='2' style='background-color: #d9f7be; font-weight: bold;'>".number_format($promedio, 2)."</td>
          </tr>";
}

echo "</table>";
?>
