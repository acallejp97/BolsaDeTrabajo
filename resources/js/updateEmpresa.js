$("#updateEmpresa").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        apellido: $("#direccion").val(),
        email: $("#email").val(),
        password1: $("#url").val(),
        password2: $("#telefono").val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarEmpresa",
        type: "POST",
        data: {
            actualizacionEmpresa: valParam
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

$("#deleteEmpresa").click(function() {
    
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarEmpresa",
        type: "POST",
        data: {},
        success: function() {
            alert("Usuario Eliminado Correctamente");
            location.reload();
        },
        error: function() {
            alert("No se ha podido eliminar el usuario...");
        }
    });
});