window.Vue = require('vue');

Vue.component('mainmenu', require('./components/menu.vue').default);

const menuApp = new Vue({
    el: '#vueMenu',
});