<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dólares a Euros</title>
    <link rel="stylesheet" href="css/Diseño2.css">
</head>
<body>
    <h1>Dólares a Euros</h1>

    <form method="post">
        <label for="dollars">Ingrese la cantidad en dólares:</label>
        <input type="text" id="dollars" name="dollars">
        <button type="submit">Convertir</button>
    </form>

    <?php
    // Definir tasa de conversión 
    $conversion= 0.85; // 1 USD = 0.85 EUR
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dolar = $_POST['dollars'];

        // Validación de entrada
        if (!is_numeric($dolar) || $dolar < 0) {
            echo '<p class="error">Por favor, ingrese una cantidad válida.</p>';
        } else {
            // Convertir a euros
            $euros = $dolar * $conversion;

            // Mostrar la tabla de resultados
            echo '<table>
                    <tr>
                        <th>Cantidad en Dólares (USD)</th>
                        <th>Equivalente en Euros (EUR)</th>
                    </tr>
                    <tr>
                        <td>$' . number_format($dolar, 2) . '</td>
                        <td>€' . number_format($euros, 2) . '</td>
                    </tr>
                  </table>';
        }
    }
    ?>
</body>
</html>
