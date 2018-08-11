require('../bootstrap');

window.Vue= require('vue');

Vue.component('tabla-productos', require('./tabla'));

const app= new Vue({
  el: '#app'
});
