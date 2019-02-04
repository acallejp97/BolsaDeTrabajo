$(".borrarEmpresa").click(function() {
    var array = {
        id: $(this).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./borrarEmpresa",
        type: "POST",
        data: {
            borrarEmpresa: valParam
        },
        success: function() {
            alert("Empresa eliminada correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});

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

$(".updateEmpresa").click(function() {
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
