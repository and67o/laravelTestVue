require('./bootstrap');

import Vue from 'vue';
import ApiService from "./api";
import router from './router/router';
import store from './store/index';

//Components
import App from './App.vue';

ApiService.init();

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
