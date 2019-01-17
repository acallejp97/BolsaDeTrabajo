 function deleteGrado() {
    if(document.getElementById("{{$grado['nombre']}}")){
        var sql = "DELETE FROM customers WHERE address = 'Mountain 21'";
        location.reload();
        }
}
