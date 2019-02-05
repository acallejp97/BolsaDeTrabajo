$(".borrarCorreo").click(function() {
    var array = {
        id: $(this).val()
    };

    var valParam = JSON.stringify(array);


    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./borrarCorreo",
        type: "POST",
        data: {
            borrarCorreo: valParam
        },
        success: function() {
            alert("Correo eliminado correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});


/*------------------------------------------------------------ABRIR MENSAJE-------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------*/

$(".abrirMensaje").click(function() {
    var array = {
        nombre: $(this).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./abrirMensaje",
        type: "POST",
        data: {},
        success: function() {
            alert("el mensaje ha sido abierto");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});


$(".respuestaEmail").click(function() {
    var array = {
        idMensaje: $(this).val(),
        respuesta:$('#respuesta'+$(this).val()).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./respuestaEmail",
        type: "POST",
        data: {
            respuestaMail: valParam
        },
        success: function() {
            alert("Mensaje ha sido enviado");
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});

