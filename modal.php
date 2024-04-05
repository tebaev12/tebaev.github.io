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

   a {
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


    .message-box {
      text-align: justify;
      margin-top: 20px;
      font-size: 16px;
      color: #555;
    }
  </style>
</head>
<body>
  <section class="full">
    <div class="full-inner">
      <div class="content">
        <h1>Subir archivo</h1>
       

        <div class="message-box">
          <p>
            Sube tu archivo en formato PDF según la categoría de tu libro. Este estará en revisión por el personal administrativo y, de ser validado, podrás verlo próximamente en el catálogo digital.
          </p>
          
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
            Subir Archivo
          </button>

        
            <a href="http://localhost/Catalogo_BD/Principal.html" class="btn btn-info" type="submit">Salir</a> 
          
          
        </div>
      </div>
    </div>
  </section>

 

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

    <!-- Modal principal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Subir archivo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

              <!-- Modal Body -->
<div class="modal-body">
    <form id="uploadForm" action="ajax.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="folderNumber">Seleccionar categoría:</label>
                <select class="form-control" id="folderNumber" name="folderNumber" required>
                    <option value="Cuento">Cuento</option>
                    <option value="Ensayo">Ensayo</option>
                    <option value="Filosofia">Filosofía</option>
                    <option value="Novelas">Novelas</option>
                    <option value="Poesia">Poesía</option>
                    <option value="Teatro">Teatro</option>
                    <option value="Otros">Otros</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="file">Seleccionar archivo:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file" required onchange="displayFileName()">
                    <label class="custom-file-label" for="file">Elegir archivo</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Subir archivo</button>
    </form>
</div>

<script>
    function displayFileName() {
        var input = document.getElementById('file');
        var fileName = input.files[0].name;
        var label = input.nextElementSibling;
        label.innerHTML = fileName;
    }
</script>


    <!-- Modal para mensaje de guardado exitoso -->
    <div class="modal" id="successModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Guardado exitoso</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" id="successModalBody">
                    <!-- El mensaje de guardado exitoso se mostrará aquí -->
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
