require('../bootstrap');

window.Vue = require('vue');

Vue.component('productos', require('./productos.vue'));

const app = new Vue({
    el: '#app'
});
