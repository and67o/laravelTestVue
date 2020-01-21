require('./bootstrap');

import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import router from './router';
import store from './store';

//Components
import App from './App.vue';

Vue.use(VueAxios, axios);
axios.defaults.baseURL = 'http://localhost:8000/api';

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
