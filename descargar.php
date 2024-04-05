<?php
if(isset($_GET['archivo'])){
    $archivo = $_GET['archivo'];
    $rutaArchivo = "Cuento/" . $archivo;

    if (file_exists($rutaArchivo)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $archivo . '"');
        readfile($rutaArchivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>

<?php
if(isset($_GET['archivo'])){
    $archivo = $_GET['archivo'];
    $rutaArchivo = "Ensayo/" . $archivo;

    if (file_exists($rutaArchivo)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $archivo . '"');
        readfile($rutaArchivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>

<?php
if(isset($_GET['archivo'])){
    $archivo = $_GET['archivo'];
    $rutaArchivo = "Filosofia/" . $archivo;

    if (file_exists($rutaArchivo)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $archivo . '"');
        readfile($rutaArchivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>

<?php
if(isset($_GET['archivo'])){
    $archivo = $_GET['archivo'];
    $rutaArchivo = "Novelas/" . $archivo;

    if (file_exists($rutaArchivo)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $archivo . '"');
        readfile($rutaArchivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>

<?php
if(isset($_GET['archivo'])){
    $archivo = $_GET['archivo'];
    $rutaArchivo = "Poesia/" . $archivo;

    if (file_exists($rutaArchivo)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $archivo . '"');
        readfile($rutaArchivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>

<?php
if(isset($_GET['archivo'])){
    $archivo = $_GET['archivo'];
    $rutaArchivo = "Teatro/" . $archivo;

    if (file_exists($rutaArchivo)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $archivo . '"');
        readfile($rutaArchivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>

<?php
if(isset($_GET['archivo'])){
    $archivo = $_GET['archivo'];
    $rutaArchivo = "Otros/" . $archivo;

    if (file_exists($rutaArchivo)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $archivo . '"');
        readfile($rutaArchivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>
