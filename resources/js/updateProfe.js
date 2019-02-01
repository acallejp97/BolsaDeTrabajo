$(".updateProfe").click(function() {
    var array = {
        idprofe: $(this).val(),
        nombre: $("#nombre"+$(this).val()).val(),
        apellidos: $("#apellidos"+$(this).val()).val(),
        departamentos: $("#departamentos"+$(this).val()).val(),
        email: $("#email"+$(this).val()).val()
    };
   
    var valParam = JSON.stringify(array);
   

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarProfe",
        type: "POST",
        data: {
            actualizacionProfe: valParam
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
