import Vue from 'vue';
import Vuex from 'vuex';

import auth from './auth.module';

Vue.use(Vuex);

const authModule = {
    state: auth.state,
    mutations: auth.mutations,
    actions: auth.actions,
    getters: auth.getters
};

export default new Vuex.Store({
    modules: {
        auth: authModule,
    },
});
