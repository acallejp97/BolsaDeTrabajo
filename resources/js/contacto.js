$("#enviarContacto").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        email: $("#email").val(),
        mensaje: $("#mensaje").val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./enviarCorreo",
        type: "POST",
        data: {
            nuevoContacto: valParam
        },
        success: function() {
            alert("Datos modificados correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});