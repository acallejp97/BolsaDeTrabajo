$("#aniadirGrado").click(function() {
    var nombreGrado = prompt("Introduce nombre del grado a añadir");
    var array = {
        nombre: nombreGrado
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./aniadirGrado",
        type: "POST",
        data: {
            nuevoGrado: valParam
        },
        success: function() {
            alert("Grado añadido correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});
