// const perfil = new Vue({
//     el: "#datosPerfil",
//     data: {
//         nombre: $("#nombre").val(),
//         apellido: $("#apellido").val(),
//         email: $("#email").val(),
//         imagen: $("#imagen").val(),
//         password1: $("#password1").val(),
//         password2: $("#password2").val()
//     },
//     methods: {
//         updateUser: function() {
//             console.log(this.imagen);
//             axios
//                 .post("../public/actualizarUsuario", {
//                     nombre: this.nombre,
//                     apellido: this.nombre,
//                     email: this.email,
//                     imagen: this.imagen,
//                     password1: this.password1,
//                     password2: this.password2
//                 })
//                 .then(function() {
//                     console.log("Departamento insertado correctamente");
//                 }),
//                 response => {
//                     console.log(response);
//                 };
//         }
//     },
//     deleteUser: function() {}
// });

// function matchPasswd(passwd1, passwd2) {
//     if (passwd1 == passwd2) return true;
//     else return false;
// }

$("#updateUser").click(function() {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var email = $("#email").val();
    var imagen = $("#imagen").val();
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();
    var array = new Array({
        nombre: nombre,
        apellido: apellido,
        email: email,
        imagen: imagen,
        password1: password1,
        password2: password2
    });
    $.ajax({
        
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "/actualizarUsuarios/" + array,
        dataType: "json",
        type: "POST",
        data: {},
        contentType: false,
        processData: false,
        log: console.log("pene"),
        success: function(response) {
            console.log(response);
        }
    });
});
