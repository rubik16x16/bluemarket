require('../../bootstrap');

window.Vue= require('vue');

Vue.component('tabla-comentarios', require('./tabla'));
Vue.component('responder-modal', require('./responder-modal'));

const app= new Vue({
  el: "#comentarios-app"
});
