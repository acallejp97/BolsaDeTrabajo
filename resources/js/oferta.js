$(".borrarOferta").click(function() {
    var array = {
        id: $(this).val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./borrarOferta",
        type: "POST",
        data: {
            borrarOferta: valParam
        },
        success: function() {
            alert("Oferta eliminada correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});

$("#insertOferta").click(function() {
    var array = {
        titulo: $("#titulo").val(),
        descripcion: $("#descripcion").val(),
        id_empresa: $("#id_empresa").val(),
        id_grado: $("#id_grado").val(),
        id_profesor: $("#id_profesor").val(),
        puestos: $("#puestos").val()
    };

    var valParam = JSON.stringify(array);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./anadirOferta",
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

$(".updateOferta").click(function() {
    var array = {
        idoferta: $(this).val(),
        titulo: $("#titulo"+$(this).val()).val(),
        descripcion: $("#descripcion"+$(this).val()).val(),
        puestos: $("#puestos"+$(this).val()).val(),
    };

    var valParam = JSON.stringify(array);


    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./actualizarOferta",
        type: "POST",
        data: {
            actualizarOferta: valParam
        },
        success: function() {
            alert("Oferta modificada correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});

$(".inscribirse").click(function() {
    var array = {
        idoferta: $(this).val(),
    };

    var valParam = JSON.stringify(array);


    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "./inscribirse",
        type: "POST",
        data: {
            inscripcion: valParam
        },
        success: function() {
            alert("Inscrito correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});