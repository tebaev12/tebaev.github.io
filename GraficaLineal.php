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

try {
    $sql = "SELECT fecha_prestamo, fecha_devolucion FROM biblio.prestamo";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){     
        $fechasPrestamo = array(); 
        $fechasDevolucion = array();

        while($row = $result->fetch()){
            $fechasPrestamo[] = $row["fecha_prestamo"];
            $fechasDevolucion[] = $row["fecha_devolucion"];
        }

        // Formatear las fechas en el formato YYYY-MM-DD
        $fechasPrestamoFormateadas = array_map(function($fecha) {
            return date('Y-m-d', strtotime($fecha));
        }, $fechasPrestamo);

        $fechasDevolucionFormateadas = array_map(function($fecha) {
            return date('Y-m-d', strtotime($fecha));
        }, $fechasDevolucion);

        unset($result);
    } else {
        echo "No hay registros de préstamos.";
    }
} catch (PDOException $e) { 
    die("ERROR: No se pudo ejecutar la consulta $sql. " . $e->getMessage());
}

unset($pdo);    
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gráfico de Préstamos</title>
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
        max-width: 100%;
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

<div class="chartBox">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment"></script>
<script>
    const fechasPrestamo = <?php echo json_encode($fechasPrestamoFormateadas); ?>;
    const fechasDevolucion = <?php echo json_encode($fechasDevolucionFormateadas); ?>;

    const data = {
        labels: fechasPrestamo,
        datasets: [{
            label: 'Fecha de Devolución',
            data: fechasDevolucion,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    const config = {
        type: 'line',
        data,
        options: {
            scales: {
                y: {
                    type: 'time',
                    time: {
                        unit: 'day'
                    },
                    title: {
                        display: true,
                        text: 'Fecha de Devolución'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Fecha de Préstamo'
                    }
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
<br></br>
</body>

</html>




