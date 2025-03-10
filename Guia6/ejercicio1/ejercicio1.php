<?php

class Auto {
    private $marca;
    private $modelo;
    private $color;
    private $image;

    function __construct($marca='Honda', $modelo='Civic', $color='Gris', $image='img/hondacivic.jpg'){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->image = $image;
    }

    function mostrar(){
        echo "<div class='col-4 mb-3'>
                <div class='card' style='width: 100%; height: auto;'>
                    <div class='card-header text-center'>{$this->marca}</div>
                    <img class='card-img-top' src='{$this->image}' alt='Auto' style='width: 100%; height: 200px; object-fit: cover;'>
                    <div class='card-body text-center'>
                        <h5 class='card-title'>{$this->marca} {$this->modelo}</h5>
                        <p class='card-text'>Modelo: {$this->modelo}<br>Color: {$this->color}</p>
                    </div>
                </div>
              </div>";
    }
}

$autos = [
    "Honda" => new Auto("Honda", "Civic", "Gris", "img/hondacivic.jpg"),
    "Toyota" => new Auto("Toyota", "Avalon", "Blanco", "img/toyota.jpg"),
    "BMW" => new Auto("BMW", "X3", "Negro", "img/bmwserie6.jpg"),
    "Peugeot" => new auto("Peugeot", "307", "Gris", "img/peugeot.jpg"),
    "Renault" => new auto("Renault", "Clio", "Rojo", "img/renaultclio.jpg")


];

$seleccion = isset($_POST['auto']) ? $_POST['auto'] : "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Venta de autos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <form method="POST" class="mb-3">
            <label>Seleccione un auto:</label>
            <select name="auto" class="form-control w-50" onchange="this.form.submit()">
                <option value="">Seleccione...</option>
                <?php foreach ($autos as $marca => $obj) {
                    echo "<option value='$marca'" . ($seleccion == $marca ? " selected" : "") . ">$marca</option>";
                } ?>
            </select>
        </form>
        <div class="row">
            <?php if ($seleccion && isset($autos[$seleccion])) {
                $autos[$seleccion]->mostrar();
            } ?>
        </div>
    </div>
</body>
</html>

<?php
