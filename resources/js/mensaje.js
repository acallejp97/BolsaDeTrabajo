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





/*-----------------------------------------------------RESPUESTA EMAIL---------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------*/
$(".respuestaEmail").click(function() {
    /*var array = {
        usuario: ("#usuario").val(),
        respuesta: $("#respuesta").val()
    };*/

    var respuesta  = $("#respuesta").val();

    var valParam = JSON.stringify(respuesta);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./respuestaEmail",
        type: "POST",
        data: {
            respuesta: valParam
        },
        success: function() {
            alert(respuesta);
        },
        error: function() {
            alert(respuesta);
        }
    });
});