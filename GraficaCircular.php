<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php

$username = "root";
$password = "";
$database = "biblio";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Chart</title>
<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 96%;
        overflow: hidden;
    }

    .chartBox {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        margin-top: auto; /* Esto centra verticalmente */
        margin-bottom: auto; /* Esto centra verticalmente */
    }

    canvas {
        max-width: 500%;
        max-height: 100%;
    }

    .exitButton {
        position: absolute;
        bottom: 10px;
        left: 410;
        width: 100%;
        text-align: center;
        display: block; width: 50%; text-align: center; justify-content: center;  align-items: center;
        
    }
</style>
</head>
<body>

<?php

try{
    $sql = 
    "SELECT titulo, cantidad FROM biblio.libro";

    $result = $pdo->query($sql);
    if($result->rowCount() > 0){     
        $cantidad = array(); 
        $titulos = array();

        while($row = $result->fetch()){
            $cantidad[] = $row["cantidad"];
            $titulos[] = $row["titulo"];
        }

        unset($result);
    } else {
        echo "No records";
    }
} catch (PDOException $e) { 
    die("ERROR: Could not execute $sql. " . $e->getMessage());
}

unset($pdo);    
?>

<div class="chartBox">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const cantidad = <?php echo json_encode($cantidad); ?>;
const titulos = <?php echo json_encode($titulos); ?>;

// Define un array de colores para las porciones del gráfico
const colors = [
    'rgb(255, 99, 132)',
    'rgb(54, 162, 235)',
    'rgb(255, 205, 86)'
];

const data = {
    labels: titulos,
    datasets: [{
        label: 'Cantidad',
        data: cantidad,
        backgroundColor: colors,
        borderColor: colors,
        borderWidth: 1
    }]
};

const config = {
    type: 'doughnut',
    data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

</script>
<div class="exitButton">
    <a class="btn btn-outline-secondary" href="index.html" >Salir</a>
</div>
</body>
</html>
