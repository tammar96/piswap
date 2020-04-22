require('./bootstrap');
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import '../sass/app.scss'


window.Vue = require('vue');
Vue.use(VueAxios, axios)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.component('booklist', require('./components/BookList.vue').default);
Vue.component('bookdetail', require('./components/BookDetail.vue').default);

const app = new Vue({
    el: '#app',
});
