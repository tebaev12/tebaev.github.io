function uploadAndRedirect() {
    var formData = new FormData($('#uploadForm')[0]);

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            // Ocultar el modal principal
            $('#myModal').modal('hide');

            // Mostrar mensaje de éxito en el nuevo modal
            $('#successModalBody').html(data);
            $('#successModal').modal('show');

            // Refrescar la página después de un breve intervalo de tiempo (por ejemplo, 2000 milisegundos o 2 segundos)
            setTimeout(function () {
                location.href = 'prueba.html'; // Redirigir a prueba.html
            }, 2000);
        },
        error: function (error) {
            console.log(error);
        }
    });
}
