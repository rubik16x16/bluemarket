require('../../bootstrap');

window.Vue= require('vue');

Vue.component('tabla-productos', require('./tabla'));
Vue.component('imgs-panel', require('./imgs-panel'));
Vue.component('imgs-add', require('./imgs-add'));
Vue.component('edit-form', require('./edit-form'));
Vue.component('show-view', require('./show-view'));

const app= new Vue({
  el: '#productos-app'
});
