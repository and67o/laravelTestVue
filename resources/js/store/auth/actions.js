import ApiService from "../../../api";

const actions = {
    login(context, params) {
        ApiService
            .post('/v1/login', {
                email: params.email,
                password: params.password
            })
            .then(({data}) => {
                const {
                    success: {
                        token,
                        userId
                    },
                    success
                } = data;

                if (success) {
                    context.commit('clearErrors');
                    context.commit(
                        'setAuth', {userId, token}
                    );
                }
            })
            .catch(({response}) => {
                setError(
                    context,
                    'login',
                    response.data.error
                );
            });
    },
    logout(context) {
        context.commit('resetAuth');
        ApiService
            .get('/v1/login')
            .then(({data}) => {
                context.commit('resetAuth');
            })
            .catch(({response}) => {
                setError(
                    context,
                    'logout',
                    response.data.error
                );
            });
    },
    register(context, regParam) {
        const {name, email, password, c_password} = regParam;
        ApiService
            .post("/v1/register", {email, name, password, c_password})
            .then(({data}) => {
                console.log(data);
                context.commit('setAuth', {
                    userId: data.userId,
                    token: data.success.token
                });
            })
            .catch(({response}) => {
                setError(
                    context,
                    'register',
                    response.data.error
                );
            });
    },
    //TODO Проверку токена
};

const setError = (context, target, message) => {
    context.commit(
        'setError', {target, message}
    );
};

export default actions;
