const app = new Vue({
    el: "#datosPerfil",
    data: {
        nombre: "admin",
        apellido: "admin",
        email: "admin@admin.com",
        password1: "admin",
        password2: "admin"
    },
    methods: {

        updateUser: function() {
            this.$http
                .post("./actualizarUsuario", {
                    nombre: this.nombre,
                    email: this.email,
                    password1: this.password1,
                    password2: this.password2
                })
                .then(function() {
                    alert("Datos modificados correctamente");
                });
        },
        deleteUser: function() {},
        mounted() {
            this.getTasks();
        }
    }
});
