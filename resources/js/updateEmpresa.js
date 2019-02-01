$(".updateEmpresa").click(function() {
    var array = {
        idempresa: $(this).val(),
        nombre: $("#nombre"+$(this).val()).val(),
        direccion: $("#direccion"+$(this).val()).val(),
        email: $("#email"+$(this).val()).val(),
        url: $("#url"+$(this).val()).val(),
        telefono: $("#telefono"+$(this).val()).val(),
        
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


