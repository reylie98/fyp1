/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Vuex from "vuex"; //import vuex script documentation
import storeVuex from "./store/index";
import filter from "./filter";

Vue.use(Vuex);
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

const store = new Vuex.Store(storeVuex);

Vue.component("main-app", require("./components/MainApp.vue").default);
window.moment = require('moment');

const app = new Vue({
    el: "#app",
    store //constante from line 14
});

