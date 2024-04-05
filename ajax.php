<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>



  
  <style>
    body {
      background-color: #343a40; /* Fondo oscuro */
      color: #ffffff; /* Texto blanco */
    }

    .full {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .full-inner {
      max-width: 600px;
      width: 100%;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .content {
      text-align: center;
    }

   i {
      text-align: center;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #343a40;
    }

    label {
        font-size: 17px;
      margin-bottom: 20px;
      color: #343a40;
    }
    h4 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #343a40;
    }

    a {
      display: block;
      margin-bottom: 10px;
      padding: 10px 15px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      text-align: center;
    }

    a:hover {
      background-color: #0056b3;
    }

    .message-box {
      text-align: justify;
      margin-top: 20px;
      font-size: 16px;
      color: #555;
    }
  </style>
 

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>





<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $folderNumber = $_POST['folderNumber'];

    // Validar que el número de carpeta sea válido
    $validFolderNumbers = array('Cuento', 'Ensayo', 'Filosofia', 'Novelas', 'Poesia', 'Teatro', 'Otros');
    if (!in_array($folderNumber, $validFolderNumbers)) {
        echo '
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Error</h4>
                <p>Número de carpeta no válido.</p>
                <hr>
                <p class="mb-0">Haz clic en el botón para regresar a <a href="tabla.php" class="btn btn-danger">Regresar</a>.</p>
            </div>';
        exit;
    }

    // Utilizar el número de carpeta directamente en la ruta de destino sin la carpeta "uploads"
    $uploadDir = $folderNumber . '/';
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        // HTML mejorado para el mensaje de éxito
        echo '
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="alert alert-success text-center" role="alert">
                <h4 class="alert-heading">¡Archivo subido correctamente!</h4>
                <p>El archivo se ha cargado con éxito en la carpeta ' . $folderNumber . '.</p>
                <hr>
                <p class="mb-0">Haz clic en el botón para regresar a <a href="modal.php" class="btn btn-success">Regresar</a>.</p>
            </div>
        </div>';
    
    } else {
        // HTML mejorado para el mensaje de error
        echo '
        <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="alert alert-success text-center" role="alert">
                <h4 class="alert-heading">Error al subir el archivo</h4>
                <p>Hubo un problema al intentar subir el archivo. Por favor, inténtalo de nuevo.</p>
                <hr>
                <p class="mb-0">Haz clic en el botón para regresar a <a href="modal.php" class="btn btn-success">Regresar</a>.</p>
                </div>
            </div>';
    }
} else {
    // Si se intenta acceder directamente a este script, muestra un mensaje de error
    echo 'Acceso no permitido.';
}
?>
