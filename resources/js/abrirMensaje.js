$(".abrirMensaje").click(function() {
    var array = {
        nombre: $(this).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./abrirMensaje",
        type: "POST",
        data: {},
        success: function() {
            alert("el mensaje ha sido abierto");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});