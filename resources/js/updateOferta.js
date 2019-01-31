$(".updateOferta").click(function() {
    var array = {
        idoferta:$(this).val(),
        titulo: $(".titulo").val(),
        descripcion: $(".descripcion").val(),
        puestos: $(".puestos").val()
       
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarOferta",
        type: "POST",
        data: {
            actualizacionOferta: valParam
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