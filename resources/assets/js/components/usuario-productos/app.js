require('../bootstrap');

window.Vue= require('vue');

Vue.component('tabla-productos', require('./tabla'));
Vue.component('img-panel', require('./img-panel'));

const app= new Vue({
  el: '#app'
});
