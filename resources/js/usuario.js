$(".borrarUsuario").click(function() {
    var array = {
        id: $(this).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./borrarUsuario",
        type: "POST",
        data: {
            borrarUsuario: valParam
        },
        success: function() {
            alert("Usuario eliminado correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});

$("#updateUser").click(function() {
    var array = {
        nombre: $("#nombre").val(),
        apellido: $("#apellido").val(),
        email: $("#email").val(),
        password1: $("#password1").val(),
        password2: $("#password2").val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarUsuario",
        type: "POST",
        data: {
            actualizacionUsuario: valParam
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

$("#descargarPlantilla").click(function() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./descargarPlantilla",
        type: "GET",
        data: {},
        success: function(data) {

            alert("Descargando datos");
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});

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
            alert("Usuarios correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});

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
            alert("Usuarios correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});
$(".updateUsuarios").click(function() {
    var array = {
        iduser: $(this).val(),
        nombre: $("#nombre"+$(this).val()).val(),
        apellidos: $("#apellidos"+$(this).val()).val(),
        email: $("#email"+$(this).val()).val(),
        anio: $("#anio"+$(this).val()).val(),
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarUsuarios",
        type: "POST",
        data: {
            actualizacionUsuarios: valParam
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
