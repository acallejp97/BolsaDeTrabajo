$(".updateOferta").click(function() {
    var array = {
        idoferta: $(this).val(),
        titulo: $("#titulo"+$(this).val()).val(),
        descripcion: $("#descripcion"+$(this).val()).val(),
        puestos: $("#puestos"+$(this).val()).val()
    };

    var valParam = JSON.stringify(array);
    alert(array["titulo"]);

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
