window.Vue = require("vue");
window.axios = require("axios");

Vue.component("mainmenu", require("./components/menu.vue").default);

const menuApp = new Vue({
    el: "#vueMenu"
});

const toggler = new Vue({
    el: "#hasToggler",
    methods: {
        toggle: function(event) {
            this.isShown = !this.isShown;
        }
    },
    data: function() {
        return {
            isShown: false
        };
    }
});
