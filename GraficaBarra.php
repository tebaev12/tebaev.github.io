<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de Cantidad Total de Libros Prestados por Estudiante</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden;
    }

    .chartBox {
        width: 12%;
        height: 12%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        margin-top: auto; /* Esto centra verticalmente */
        margin-bottom: auto; /* Esto centra verticalmente */
    }

    canvas {
        max-width: 100%;
        max-height: 93%;
    }

    .exitButton {
        position: absolute;
        bottom: 1px;
        left: 410;
        width: 100%;
        text-align: center;
        display: block; width: 50%; text-align: center; justify-content: center;  align-items: center;
        
    }
</style>
<body>

    <canvas id="myChart" width="400" height="200"></canvas>

    <?php
    $username = "root";
    $password = "";
    $database = "biblio";

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta SQL para obtener el nombre del estudiante y la cantidad total de libros prestados por cada estudiante
        $sql = "SELECT e.nombre, SUM(p.cantidad) AS cantidad_total
                FROM estudiante e
                INNER JOIN prestamo p ON e.id = p.id_estudiante
                GROUP BY e.nombre";

        $result = $pdo->query($sql);

        $labels = [];
        $data = [];
        $colors = ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'];
        $color_index = 0;

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $labels[] = $row['nombre'];
                $data[] = $row['cantidad_total'];
            }
        } else {
            echo "No hay registros de préstamos.";
        }
    } catch (PDOException $e) {
        die("ERROR: No se pudo ejecutar la consulta $sql. " . $e->getMessage());
    }

    unset($pdo);
    ?>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Cantidad Total de Libros Prestados',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: [
                        '<?php echo $colors[0]; ?>',
                        '<?php echo $colors[1]; ?>',
                        '<?php echo $colors[2]; ?>'
                    ],
                    borderColor: [
                        '<?php echo $colors[0]; ?>',
                        '<?php echo $colors[1]; ?>',
                        '<?php echo $colors[2]; ?>'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>




<div class="exitButton">
    <a class="btn btn-outline-secondary" href="index.html" >Salir</a>
</div>