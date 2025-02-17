<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #e3f2fd;
            color: #0d47a1;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #0d47a1;
            border-radius: 5px;
            background-color: #bbdefb;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        input, select, button {
            width: 90%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #0d47a1;
            border-radius: 5px;
        }
        button {
            background-color: #1976d2;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Conversor de Unidades</h2>
        <form method="POST">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" placeholder="Ingrese un valor" required>
            
            <label for="from">De:</label>
            <select name="from">
                <option value="metros">Metros</option>
                <option value="yardas">Yardas</option>
                <option value="pies">Pies</option>
                <option value="varas">Varas</option>
            </select>
            
            <label for="to">A:</label>
            <select name="to">
                <option value="metros">Metros</option>
                <option value="yardas">Yardas</option>
                <option value="pies">Pies</option>
                <option value="varas">Varas</option>
            </select>
            
            <button type="submit">Convertir</button>
        </form>
        
        <h3>
            <?php
                function convertir($cantidad, $from, $to) {
                    $conversiones = [
                        'metros' => ['yardas' => 1.09361, 'pies' => 3.28084, 'varas' => 1.1963, 'metros' => 1],
                        'yardas' => ['metros' => 0.9144, 'pies' => 3, 'varas' => 1.09361, 'yardas' => 1],
                        'pies' => ['metros' => 0.3048, 'yardas' => 0.333333, 'varas' => 0.39878, 'pies' => 1],
                        'varas' => ['metros' => 0.836127, 'yardas' => 0.911458, 'pies' => 2.5, 'varas' => 1]
                    ];

                    return $cantidad * $conversiones[$from][$to];
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $cantidad = floatval($_POST["cantidad"]);
                    $from = $_POST["from"];
                    $to = $_POST["to"];

                    if (is_numeric($cantidad)) {
                        $resultado = convertir($cantidad, $from, $to);
                        echo "$cantidad $from equivalen a " . number_format($resultado, 4) . " $to";
                    } else {
                        echo "Ingrese un número válido";
                    }
                }
            ?>
        </h3>
    </div>
</body>
</html>
