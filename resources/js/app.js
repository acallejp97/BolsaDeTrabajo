/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("../../resources/js/bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue")
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var perfil = new Vue({
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
                    password1: this.password1,
                    password2: this.password2
                })
                .then(function() {
                    alert("Datos modificados correctamente");
                });
        },

        deleteUser: function() {}
    }
});

var insertarCurso = new Vue({
    el: "#modificarCursos",
    data: {
        nombreDepartamento: ""
    },
    methods: {
        aniadirDepartamento: function() {
            var nombre = prompt("Introduce el nombre del departamento a añadir"
            );
            this.$http
                .post("/aniadirDepartamento", {
                    nombre: nombre
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
