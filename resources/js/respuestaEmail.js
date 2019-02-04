$("#respuestaEmail").click(function() {
    /*var array = {
        usuario: ("#usuario").val(),
        respuesta: $("#respuesta").val()
    };*/

    var respuesta  = $("#respuesta").val();

    var valParam = JSON.stringify(respuesta);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./respuestaEmail",
        type: "POST",
        data: {
            respuesta: valParam
        },
        success: function() {
            alert(respuesta);
        },
        error: function() {
            alert(respuesta);
        }
    });
});