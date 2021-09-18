$(function() {
    $('#alta-formulario').on('submit', function (event) {
        event.preventDefault();

        let data = $(this).serialize();
       
        $.ajax({
            method: "POST",
            url: `${base_url}gestor_tareas/alta_tarea`,
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
                console.log(respuesta);
            }
        });
    });
});