$("#anadirDepartamento").click(function() {
    var nombreDepar = prompt("Introduce nombre del departamento a añadir");
    var array = {
        nombre: nombreDepar
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./anadirDepartamento",
        type: "POST",
        data: {
            nuevoDepartamento: valParam
        },
        success: function() {
            alert("Departamento añadido correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});
