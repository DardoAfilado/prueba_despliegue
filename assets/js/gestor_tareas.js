$(function() {
    listar_tareas();

    $('#alta-formulario').on('submit', function (event) {
        event.preventDefault();

        let data = $(this).serialize();
       
        $.ajax({
            method: "POST",
            url: `${base_url}gestor_tareas/alta_tarea`,
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
                listar_tareas();
            }
        });
    });
});

function listar_tareas() {
    $.ajax({
        method: "POST",
        url: `${base_url}gestor_tareas/listar_tareas`,
        dataType: 'JSON',
        success: function (respuesta) {
            let tareas = new Array();

            respuesta.forEach(function (item) {
                let id = item.id;
                let tarea = item.tarea;
                let etiqueta = item.etiqueta;

                if(tareas.find(element => element.id == id)) {
                    let tarea_formateada = tareas.find(element => element.id == id);

                    tarea_formateada.etiquetas.push(etiqueta);
                }
                else {
                    let tarea_formateada = {
                        id: id,
                        tarea: tarea,
                        etiquetas: new Array(etiqueta)
                    };

                    tareas.push(tarea_formateada);
                }
            })

            const html = html_tareas(tareas);
            
            $('#listado-tareas table tbody').html(html);
        }
    });
}

function html_tareas(tareas) {
    let html = '';

    tareas.forEach(function (tarea) {
        html += '<tr>';
        html += `<td>${tarea.tarea}</td>`;
        html += '<td>';
        tarea.etiquetas.forEach(function (etiqueta) {
            html += `<span class="etiqueta">${etiqueta}</span>`;
        });
        html += '</td>';
        html += `<td><span class="aspa" onclick="borrar_tarea(${tarea.id})">x</td>`;
        html += '</tr>';
    }) 
    
    return html;
}

function borrar_tarea(id) {
    $.ajax({
        method: "POST",
        url: `${base_url}gestor_tareas/baja_tarea`,
        dataType: 'JSON',
        data: { id: id },
        success: function (respuesta) {
            listar_tareas();
        }
    });
}