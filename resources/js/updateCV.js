$("#updateCV").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        apellidos: $("#apellido").val(),
        telefono: $("#telefono").val(),
        direccion: $("#direccion").val(),
        email: $("#email").val(),
        formacion: $("#formacion").val(),
        idiomas: $("#idiomas").val(),
        experiencia: $("#experiencia").val(),
        otros: $("#otros").val(),
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizandoCV",
        type: "POST",
        data: {
            updateCV: valParam
        },
        success: function() {
            alert("Curriculum actualizado correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});
