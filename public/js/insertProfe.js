$("#insertProfe").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        email: $("#email").val(),
        apellidos: $("#apellidos").val(),
        password1: $("#password1").val(),
        rango: $("#rango").val(),
        
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./anadirProfesores",
        type: "POST",
        data: {
            nuevaProfe: valParam
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