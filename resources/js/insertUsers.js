$("#insertUsers").click(function() {
    var array = {
        file: $("#puestos").val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./subiendoCSV",
        type: "POST",
        data: {
            nuevaOferta: valParam
        },
        success: function() {
            alert("Oferta añadida correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});