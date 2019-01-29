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

$(".anadirGrado").click(function() {
    var nombreGrado = prompt("Introduce nombre del grado a añadir");
    var abreviacion = prompt("Introduce la abreviacion del grado");
    var idDepar = $(this).val();
    var array = {
        nombre: nombreGrado,
        idDepar: idDepar,
        abreviacion: abreviacion
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./anadirGrado",
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

$(".borrarGrado").click(function() {
    var array = {
        nombre: $(this).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./borrarGrado",
        type: "POST",
        data: {
            borrarGrado: valParam
        },
        success: function() {
            alert("Grado eliminado correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});
