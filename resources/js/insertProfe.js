$("#insertProfe").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        email: $("#email").val(),
        apellidos: $("#apellidos").val(),
        password: $("#password").val(),
        id_depar: $("#id_depar").val(),
        rango: $("#rango").val(),
        id_user: $("#id_user").val(),
        
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./insertarProfesores",
        type: "POST",
        data: {
            nuevaProfe: valParam
        },
        success: function() {
            alert("Profesor añadido correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});