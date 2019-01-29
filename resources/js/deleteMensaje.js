$(".deleteMensaje").click(function() {
    var array = {
        nombre: $(this).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./deleteMensaje",
        type: "POST",
        data: {
            borrarGrado: valParam
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