require('./bootstrap');
import Vue from "vue";
import mavonEditor from 'mavon-editor';
import 'mavon-editor/dist/css/index.css';
import App from "@Views/App.vue";
import axios from "@Assets/js/axios";
import "@Assets/js/element";
import "@Assets/js/func";
import "@Assets/font/iconfont.css";
import cookie from "@Assets/js/cookie";
import router from "@/router/index";
Vue.prototype.$axios = axios;
Vue.prototype.$cookie = cookie;
Vue.use(mavonEditor);

new Vue({
    router,
    render: function (h) {
        return h(App);
    }
}).$mount('#app');
