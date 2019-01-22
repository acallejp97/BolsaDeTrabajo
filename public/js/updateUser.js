$("#updateUser").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        apellido: $("#apellido").val(),
        email: $("#email").val(),
        password1: $("#password1").val(),
        password2: $("#password2").val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarUsuario",
        type: "POST",
        data: {
            actualizacionUsuario: valParam
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
