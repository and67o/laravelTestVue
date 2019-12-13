require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import routes from "./routes";

//Components
import App from './App.vue';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
axios.defaults.baseURL = 'http://localhost:8000/api';

Vue.router = new VueRouter({
    routes: routes
});

App.router = Vue.router;
new Vue(App).$mount('#app');
