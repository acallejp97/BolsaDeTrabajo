const insertarCurso = new Vue({
    el: "#modificarCursos",
    data: {
        nombreDepartamento: "",
        nombre: ""
    },
    methods: {
        aniadirDepartamento: function() {
            console.log("aaaaa");
            this.nombre = prompt(
                "Introduce el nombre del departamento a añadir"
            );
            console.log(this.nombre);
            this.$http
                .post("./aniadirDepartamento", {
                    nombre: this.nombre
                })
                .then(function() {
                    alert("Departamento insertado correctamente");
                });
        },

        aniadirGrado: function() {
            this.$http.post("/aniadirGrado", {
                departamento: this.nombreDepartamento
            });
        }
    }
});

// var app = new Vue({
//     el: "#botones",
//     data: {
//         nombre: '',
//         email: '',
//         password1: '',
//         password2: ''
//     },
//     methods: {
//         updateTable: function() {
//             console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
//             this.$http
//                 .post(asset("/actualizarUsuario"), {
//                     nombre: this.nombre,
//                     email: this.email,
//                     password1: this.password1,
//                     password2: this.password2
//                 })
//                 .then(function() {
//                     alert("Datos modificados correctamente");
//                 });
//         }
//     }
// });
