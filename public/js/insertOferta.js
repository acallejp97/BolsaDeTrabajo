$("#insertOferta").click(function() {
    var array = {
        titulo: $("#titulo").val(),
        descripcion: $("#descripcion").val(),
        id_empresa: $("#id_empresa").val(),
        id_grado: $("#id_grado").val(),
        id_profesor: $("#id_profesor").val(),
        puestos: $("#puestos").val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./añadiroferta",
        type: "POST",
        data: {
            insertaroferta: valParam
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