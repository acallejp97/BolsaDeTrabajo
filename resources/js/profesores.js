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
            alert("Empresa eliminada correctamente");
            location.reload();
        },
        error: function() {
            alert("Por favor, revise los datos");
        }
    });
});
