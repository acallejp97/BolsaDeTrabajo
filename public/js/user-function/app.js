const app = new Vue({
    el: "#botones",
    data: {
        nombre: '',
        email: '',
        password1: '',
        password2: ''
    },
    methods: {
        updateTable: function() {
            console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
            this.$http
                .post(asset("/actualizarUsuario"), {
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
