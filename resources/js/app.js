/*
 *
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
require("./contacto");
require("./curriculum");
require("./empresa");
require("./grado");
require("./mensaje");
require("./oferta");
require("./perfil");
require("./profesores");
require("./usuario");
require("./buscar");


window.Vue = require("vue");

import VeeValidate from "vee-validate";
Vue.use(VeeValidate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("passwords", require("./components/passwords.vue").default);
window.onload = function () {
new Vue({
    el: '#passwords',
    data: {
        credentials: {
          email: '',
        repemail: '',
        password: '',
        confirmPassword: '',
        normalInput: 'this input is not using vue-material'
      }
    }
  });
};