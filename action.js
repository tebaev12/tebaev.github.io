$(document).ready(function() {
    // Variables para el manejo de datos dinámicos
    let datoIndex = 1;

    // Función para agregar un nuevo campo de datos
    $("#add-btn").click(function() {
        datoIndex++;
        let html = `<div class="form-group dato">
                        <input type="text" class="form-control serie" placeholder="Ingresa la leyenda ${datoIndex}">
                        <input type="number" class="form-control valor" placeholder="Ingresa el valor ${datoIndex}">
                        <button class="btn btn-danger btn-sm mt-2 remove-btn">Eliminar</button>
                    </div>`;
        $("#datos").append(html);
    });

    // Función para quitar un campo de datos
    $("#datos").on("click", ".remove-btn", function() {
        $(this).closest(".dato").remove();
        datoIndex--;
    });

    // Función para cargar el gráfico
    $("#generate-btn").click(function() {
        let tipo = $("#tipo").val();
        let titulo = $("#titulo").val();
        let data = [];

        // Validar que se haya ingresado el título
        if (titulo.trim() === "") {
            showError("Ingrese un título para el gráfico.");
            return;
        }

        // Validar que se hayan ingresado al menos dos datos
        if ($(".dato").length < 2) {
            showError("Ingrese al menos dos conjuntos de datos.");
            return;
        }

        // Recopilar los datos ingresados
        $(".dato").each(function() {
            let serie = $(this).find(".serie").val().trim();
            let valor = $(this).find(".valor").val().trim();

            // Validar que los campos no estén vacíos
            if (serie === "" || valor === "") {
                showError("Complete todos los campos de datos.");
                return;
            }

            data.push([serie, parseFloat(valor)]);
        });

        // Dibujar el gráfico
        drawChart(data, tipo, titulo);
    });

    // Función para mostrar mensajes de error
    function showError(message) {
        $("#error-message").text(message).show();
    }

    // Función para ocultar el botón de descarga de PNG
    function hideDownloadButton() {
        $("#download-png-btn").hide();
    }

    // Función para dibujar el gráfico
    function drawChart(data, tipo, titulo) {
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(function() {
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'Leyenda');
            dataTable.addColumn('number', 'Valor');
            dataTable.addRows(data);

            var options = {
                title: titulo,
                width: 600,
                height: 400
            };

            var chart;
            if (tipo === 'circular') {
                chart = new google.visualization.PieChart(document.getElementById('piechart'));
            } else {
                chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
            }
            chart.draw(dataTable, options);

            // Mostrar el botón de descarga PNG después de que se haya generado el gráfico
            $("#download-png-btn").show();

            // Agregar funcionalidad para descargar la imagen del gráfico como PNG
            $("#download-png-btn").click(function() {
                var chartContainer = $("#piechart")[0];
                domtoimage.toPng(chartContainer)
                    .then(function(dataUrl) {
                        var link = document.createElement('a');
                        link.href = dataUrl;
                        link.download = 'grafico.png';
                        link.click();
                    });
            });

           
        });
    }
});
