window.Vue = require("vue");
window.axios = require("axios");

Vue.component("mainmenu", require("./components/menu.vue").default);

const menuApp = new Vue({
    el: "#vueMenu"
});

const toggler = new Vue({
    el: "#hasToggler",
    methods: {
        toggle1: function(event) {
            this.isShown1 = !this.isShown1;
        },
        toggle2: function(event) {
            this.isShown2 = !this.isShown2;
        },
    },
    data: function() {
        return {
            isShown1: false,
            isShown2: false,
        };
    }
});

const dynamicInputs = new Vue({
    el: '#orderForm',
    data: {
        count: 0,
    },
    methods: {
        add: function() {
            this.count++
        },
        remove: function() {
            if(this.count > 0) {
                this.count--
            }
        }
    }
});
