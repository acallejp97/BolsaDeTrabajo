window.addEventListener('updateTable', function () {
    var formulario = new Vue({
        el: "#botones",
        data: {
            nombre: "",
            email: "",
            password1: "",
            password2: ""
        },
        methods: {
            updateTable: function() {
                this.$http
                    .post("/actualizarUsuario", {
                        nombre: this.nombre,
                        email: this.email,
                        password1: this.password1
                    })
                    .then(function() {
                        alert("Datos modificados correctamente");
                    });
            },

            deleteUser: function() {}
        }
    });
});