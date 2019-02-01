$(".updateUsuarios").click(function() {
    var array = {
        iduser: $(this).val(),
        nombre: $("#nombre"+$(this).val()).val(),
        apellidos: $("#apellidos"+$(this).val()).val(),
        email: $("#email"+$(this).val()).val(),
        anio: $("#anio"+$(this).val()).val(),
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarUsuarios",
        type: "POST",
        data: {
            actualizacionUsuarios: valParam
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