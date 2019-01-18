const app = new Vue({
    el: "#botones",
    data: {
        nombre: "CARACOLA",
        email: "",
        password1: "",
        password2: ""
    },
    methods: {
        updateTable: function() {
            Console.console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
            this.$http
                .post("/actualizarUsuario", {
                    nombre: this.nombre,
                    email: this.email,
                    password1: this.password1,
                    password2: this.password2
                })
                .then(function() {
                    alert("Datos modificados correctamente");
                });
        }
    }
});
