$(".borrarProfesor").click(function() {
    var array = {
        id: $(this).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./borrarProfesor",
        type: "POST",
        data: {
            borrarProfesor: valParam
        },
        success: function() {
            alert("Profesor eliminado correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});

$(".updateProfe").click(function() {
    var array = {
        iduser: $(this).val(),
        nombre: $("#nombre" + $(this).val()).val(),
        apellidos: $("#apellidos" + $(this).val()).val(),
        departamento: $(
            "#departamento" + $(this).val() + " option:selected"
        ).val(),
        email: $("#email" + $(this).val()).val()
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

$("#insertProfe").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        email: $("#email").val(),
        apellidos: $("#apellidos").val(),
        password: $("#password").val(),
        id_depar: $("#id_depar").val(),
        rango: $("#rango").val(),
        id_user: $("#id_user").val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./insertarProfesores",
        type: "POST",
        data: {
            nuevoProfe: valParam
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
