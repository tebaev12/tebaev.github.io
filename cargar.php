<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de PDFs</title>
    <!-- Agregamos el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        h2 {
            color: #007bff;
        }

        p {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .pdf-viewer {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container pdf-viewer mt-5">
        <h2 class="mb-4">Listado de libros de cuentos</h2>

        <?php
$directorio = "Cuento/";

if (is_dir($directorio)){
    $archivos = scandir($directorio);

    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $rutaArchivo = $directorio . $archivo;
            if (pathinfo($rutaArchivo, PATHINFO_EXTENSION) == 'pdf') {
                echo "<p class='mb-2'>
                          <span>
                              <a href='descargar.php?archivo=$archivo' class='btn btn-info'>$archivo</a>
                          </span> 
                          
                          <span>
                              <button class='btn btn-secondary' onclick='verPDF(\"$rutaArchivo\")'>Ver PDF</button>
                          </span>

                          <span>
                          <a href='http://localhost/Catalogo_BD/index.php?busqueda=&enviar=Mostrar+libros' class='btn btn-secondary'>Información</a>
                      </span> 

                          <span>
                              <a href='tabla.php' class='btn btn-success'>Regresar</a>
                          </span> 
                          
                      </p>";
            }
        }
    }
} else {
    echo "<p style='color: red;'>La carpeta no existe.</p>";
}
?>

    </div>

    <div id="pdfModal" class="modal" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <embed id="pdfViewer" width="100%" height="600" type="application/pdf">
                </div>
            </div>
        </div>
    </div>

    <!-- Agregamos los enlaces a los archivos JS de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function verPDF(rutaPDF) {
            document.getElementById('pdfViewer').src = rutaPDF;
            $('#pdfModal').modal('show');
        }

        // Cerrar el visor al hacer clic fuera del PDF
        $('#pdfModal').on('hidden.bs.modal', function () {
            document.getElementById('pdfViewer').src = '';
        });
    </script>

</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de PDFs</title>
    <!-- Agregamos el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container pdf-viewer mt-5">
        <h2 class="mb-4">Listado de libros de filosofia</h2>

        <?php
$directorio = "Filosofia/";

if (is_dir($directorio)){
    $archivos = scandir($directorio);

    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $rutaArchivo = $directorio . $archivo;
            if (pathinfo($rutaArchivo, PATHINFO_EXTENSION) == 'pdf') {
                echo "<p class='mb-2'>
                          <span>
                              <a href='descargar.php?archivo=$archivo' class='btn btn-info'>$archivo</a>
                          </span> 
                          
                          <span>
                              <button class='btn btn-secondary' onclick='verPDF(\"$rutaArchivo\")'>Ver PDF</button>
                          </span>

                          <span>
                          <a href='http://localhost/Catalogo_BD/index.php?busqueda=&enviar=Mostrar+libros' class='btn btn-secondary'>Información</a>
                      </span> 

                          <span>
                              <a href='tabla.php' class='btn btn-success'>Regresar</a>
                          </span> 
                          
                      </p>";
            }
        }
    }
} else {
    echo "<p style='color: red;'>La carpeta no existe.</p>";
}
?>

    </div>

    <div id="pdfModal" class="modal" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <embed id="pdfViewer" width="100%" height="600" type="application/pdf">
                </div>
            </div>
        </div>
    </div>

   
    <script>
        function verPDF(rutaPDF) {
            document.getElementById('pdfViewer').src = rutaPDF;
            $('#pdfModal').modal('show');
        }

        // Cerrar el visor al hacer clic fuera del PDF
        $('#pdfModal').on('hidden.bs.modal', function () {
            document.getElementById('pdfViewer').src = '';
        });
    </script>

   
</head>
<body>
    <div class="container pdf-viewer mt-5">
        <h2 class="mb-4">Listado de libros de ensayos</h2>

        <?php
$directorio = "Ensayo/";

if (is_dir($directorio)){
    $archivos = scandir($directorio);

    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $rutaArchivo = $directorio . $archivo;
            if (pathinfo($rutaArchivo, PATHINFO_EXTENSION) == 'pdf') {
                echo "<p class='mb-2'>
                          <span>
                              <a href='descargar.php?archivo=$archivo' class='btn btn-info'>$archivo</a>
                          </span> 
                          
                          <span>
                              <button class='btn btn-secondary' onclick='verPDF(\"$rutaArchivo\")'>Ver PDF</button>
                          </span>

                          <span>
                          <a href='http://localhost/Catalogo_BD/index.php?busqueda=&enviar=Mostrar+libros' class='btn btn-secondary'>Información</a>
                      </span> 

                          <span>
                              <a href='tabla.php' class='btn btn-success'>Regresar</a>
                          </span> 
                          
                      </p>";
            }
        }
    }
} else {
    echo "<p style='color: red;'>La carpeta no existe.</p>";
}
?>

    </div>

    <div id="pdfModal" class="modal" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <embed id="pdfViewer" width="100%" height="600" type="application/pdf">
                </div>
            </div>
        </div>
    </div>

   

    <script>
        function verPDF(rutaPDF) {
            document.getElementById('pdfViewer').src = rutaPDF;
            $('#pdfModal').modal('show');
        }

        // Cerrar el visor al hacer clic fuera del PDF
        $('#pdfModal').on('hidden.bs.modal', function () {
            document.getElementById('pdfViewer').src = '';
        });
    </script>


</head>
<body>
    <div class="container pdf-viewer mt-5">
        <h2 class="mb-4">Listado de libros de teatro</h2>

        <?php
$directorio = "Teatro/";

if (is_dir($directorio)){
    $archivos = scandir($directorio);

    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $rutaArchivo = $directorio . $archivo;
            if (pathinfo($rutaArchivo, PATHINFO_EXTENSION) == 'pdf') {
                echo "<p class='mb-2'>
                          <span>
                              <a href='descargar.php?archivo=$archivo' class='btn btn-info'>$archivo</a>
                          </span> 
                          
                          <span>
                              <button class='btn btn-secondary' onclick='verPDF(\"$rutaArchivo\")'>Ver PDF</button>
                          </span>

                          <span>
                          <a href='http://localhost/Catalogo_BD/index.php?busqueda=&enviar=Mostrar+libros' class='btn btn-secondary'>Información</a>
                      </span> 

                          <span>
                              <a href='tabla.php' class='btn btn-success'>Regresar</a>
                          </span> 
                          
                      </p>";
            }
        }
    }
} else {
    echo "<p style='color: red;'>La carpeta no existe.</p>";
}
?>

    </div>

    <div id="pdfModal" class="modal" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <embed id="pdfViewer" width="100%" height="600" type="application/pdf">
                </div>
            </div>
        </div>
    </div>

   

    <script>
        function verPDF(rutaPDF) {
            document.getElementById('pdfViewer').src = rutaPDF;
            $('#pdfModal').modal('show');
        }

        // Cerrar el visor al hacer clic fuera del PDF
        $('#pdfModal').on('hidden.bs.modal', function () {
            document.getElementById('pdfViewer').src = '';
        });
    </script>


</head>
<body>
    <div class="container pdf-viewer mt-5">
        <h2 class="mb-4">Listado de libros de poesias</h2>

        <?php
$directorio = "Poesia/";

if (is_dir($directorio)){
    $archivos = scandir($directorio);

    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $rutaArchivo = $directorio . $archivo;
            if (pathinfo($rutaArchivo, PATHINFO_EXTENSION) == 'pdf') {
                echo "<p class='mb-2'>
                          <span>
                              <a href='descargar.php?archivo=$archivo' class='btn btn-info'>$archivo</a>
                          </span> 
                          
                          <span>
                              <button class='btn btn-secondary' onclick='verPDF(\"$rutaArchivo\")'>Ver PDF</button>
                          </span>

                          <span>
                          <a href='http://localhost/Catalogo_BD/index.php?busqueda=&enviar=Mostrar+libros' class='btn btn-secondary'>Información</a>
                      </span> 

                          <span>
                              <a href='tabla.php' class='btn btn-success'>Regresar</a>
                          </span> 
                          
                      </p>";
            }
        }
    }
} else {
    echo "<p style='color: red;'>La carpeta no existe.</p>";
}
?>

    </div>

    <div id="pdfModal" class="modal" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <embed id="pdfViewer" width="100%" height="600" type="application/pdf">
                </div>
            </div>
        </div>
    </div>

   

    <script>
        function verPDF(rutaPDF) {
            document.getElementById('pdfViewer').src = rutaPDF;
            $('#pdfModal').modal('show');
        }

        // Cerrar el visor al hacer clic fuera del PDF
        $('#pdfModal').on('hidden.bs.modal', function () {
            document.getElementById('pdfViewer').src = '';
        });
    </script>



</head>
<body>
    <div class="container pdf-viewer mt-5">
        <h2 class="mb-4">Listado de libros de novelas</h2>

        <?php
$directorio = "Novelas/";

if (is_dir($directorio)){
    $archivos = scandir($directorio);

    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $rutaArchivo = $directorio . $archivo;
            if (pathinfo($rutaArchivo, PATHINFO_EXTENSION) == 'pdf') {
                echo "<p class='mb-2'>
                          <span>
                              <a href='descargar.php?archivo=$archivo' class='btn btn-info'>$archivo</a>
                          </span> 
                          
                          <span>
                              <button class='btn btn-secondary' onclick='verPDF(\"$rutaArchivo\")'>Ver PDF</button>
                          </span>

                          <span>
                          <a href='http://localhost/Catalogo_BD/index.php?busqueda=&enviar=Mostrar+libros' class='btn btn-secondary'>Información</a>
                      </span> 

                          <span>
                              <a href='tabla.php' class='btn btn-success'>Regresar</a>
                          </span> 
                          
                      </p>";
            }
        }
    }
} else {
    echo "<p style='color: red;'>La carpeta no existe.</p>";
}
?>

    </div>

    <div id="pdfModal" class="modal" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <embed id="pdfViewer" width="100%" height="600" type="application/pdf">
                </div>
            </div>
        </div>
    </div>

    
    <script>
        function verPDF(rutaPDF) {
            document.getElementById('pdfViewer').src = rutaPDF;
            $('#pdfModal').modal('show');
        }

        // Cerrar el visor al hacer clic fuera del PDF
        $('#pdfModal').on('hidden.bs.modal', function () {
            document.getElementById('pdfViewer').src = '';
        });
    </script>


</head>
<body>
    <div class="container pdf-viewer mt-5">
        <h2 class="mb-4">Listado de otros libros</h2>

        <?php
$directorio = "Otros/";

if (is_dir($directorio)){
    $archivos = scandir($directorio);

    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $rutaArchivo = $directorio . $archivo;
            if (pathinfo($rutaArchivo, PATHINFO_EXTENSION) == 'pdf') {
                echo "<p class='mb-2'>
                <span>
                    <a href='descargar.php?archivo=$archivo' class='btn btn-info'>$archivo</a>
                </span> 
                
                <span>
                    <button class='btn btn-secondary' onclick='verPDF(\"$rutaArchivo\")'>Ver PDF</button>
                </span>

                <span>
                <a href='http://localhost/Catalogo_BD/index.php?busqueda=&enviar=Mostrar+libros' class='btn btn-secondary'>Información</a>
            </span> 

                <span>
                    <a href='tabla.php' class='btn btn-success'>Regresar</a>
                </span> 
                
            </p>";
            }
        }
    }
} else {
    echo "<p style='color: red;'>La carpeta no existe.</p>";
}
?>

    </div>

    <div id="pdfModal" class="modal" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <embed id="pdfViewer" width="100%" height="600" type="application/pdf">
                </div>
            </div>
        </div>
    </div>


    <script>
        function verPDF(rutaPDF) {
            document.getElementById('pdfViewer').src = rutaPDF;
            $('#pdfModal').modal('show');
        }

        // Cerrar el visor al hacer clic fuera del PDF
        $('#pdfModal').on('hidden.bs.modal', function () {
            document.getElementById('pdfViewer').src = '';
        });
    </script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de PDFs</title>
    <!-- Agregamos el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <div style="margin-bottom: 50px;">
 
</div>

</body>
</html>


