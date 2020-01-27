import {
    getToken,
    setToken,
    unsetToken
} from "../base/tokenFunctions";
import ApiService from "../api";

const state = {
    token: Boolean(getToken),
    isAuth: false,
    userId: null,
    errors: []
};

const getters = {
    isAuth: (state) => state.isAuth,
    getErrors: (state) => state.errors,
    getUserId: (state) => state.userId,
};

const mutations = {
    clearErrors(state) {
        state.errors = [];
    },
    setError(state, {name, errorText}) {
        state.errors[name].push({
            message: errorText
        });
    },
    setAuth(state, {token, userId}) {
        state.token = token;
        state.userId = userId;
        state.isAuth = true;
        setToken(token);
    },
    resetAuth(state) {
        unsetToken();
        state.token = null;
        state.userId = null;
        state.isAuth = false;
        state.errors = [];
    }
};

const actions = {
    login(context, params) {
        return new Promise((resolve, reject) => {
            ApiService.post('/v1/login', {
                email: params.email,
                password: params.password
            })
                .then(({data}) => {
                    const {success: {token, userId}, success} = data;
                    if (success) {
                        context.commit('clearErrors');
                        context.commit(
                            'setAuth', {userId,token}
                        );
                        resolve(data);
                    }
                })
                .catch(({response}) => {
                    context.commit(
                        'setError', {
                            target: 'login',
                            message: response.data.error
                        }
                    );
                    reject(response);
                });
        });
    }
};

export default {
    getters,
    actions,
    mutations,
    state
}
