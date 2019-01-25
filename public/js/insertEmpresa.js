$("#insertEmpresa").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        direccion: $("#direccion").val(),
        email: $("#email").val(),
        url: $("#url").val(),
        telefono: $("#telefono").val(),
        
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./anadirEmpresas",
        type: "POST",
        data: {
            nuevaEmpresa: valParam
        },
        success: function() {
            alert("Empresa añadida correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});
