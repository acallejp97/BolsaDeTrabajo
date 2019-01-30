/*
 *
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./abrirMensaje");
require("./bootstrap");
require("./contacto");
require("./empresa");
require("./grado");
require("./usuario");
require("./insertEmpresa");
require("./insertOferta");
require("./insertProfe");
require("./insertUsers");
require("./oferta");
require("./profesores");
require("./updateCV");
require("./updateEmpresa");
require("./updateUser");
require("./deleteMensaje");

window.Vue = require("vue");

import VueMaterial from 'vue-material'
import VeeValidate from "vee-validate";
Vue.use(VueMaterial);
Vue.use(VeeValidate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("passwords", require("./components/passwords.vue"));

// new Vue({
//     el: '#app',
//     data: {
//         credentials: {
//           email: '',
//         repemail: '',
//         password: '',
//         confirmPassword: '',
//         normalInput: 'this input is not using vue-material'
//       }
//     }
//   });