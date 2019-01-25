$("#deleteGrado").click(function() {
    

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./aniadirDepartamento",
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
