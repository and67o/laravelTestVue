import ApiService from "../../../api";

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
                            'setAuth', {userId, token}
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

export default actions;
