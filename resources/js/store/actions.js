import ApiService from '../api'

const actions = {
  login (context, { email, password }) {
    ApiService
      .post('/v1/login', { email, password })
      .then(({ data: { result, token, error } }) => {
        if (result) {
          context.commit('clearErrors')
          context.commit('setAuth', { result, token })
        }
      })
      .catch(({ response: { data: { error } } }) => {
        setError(context, 'login', error)
      })
  },
  logout (context) {
    context.commit('resetAuth')
    ApiService
      .get('/v1/logout')
      .then(({ data }) => {
        context.commit('resetAuth')
      })
      .catch(({ response }) => {
        setError(
          context,
          'logout',
          response.data.error
        )
      })
  },
  register (context, regParam) {
    // eslint-disable-next-line camelcase
    const { name, email, password, c_password } = regParam
    ApiService
      .post('/v1/register', { email, name, password, c_password })
      .then(({ userId, success: token }) => {
        context.commit('setAuth', { userId, token })
      })
      .catch(({ response: { data: { error } } }) => {
        setError(context, 'register', error)
      })
  }
}

const setError = (context, target, message) => {
  context.commit(
    'setError', { target, message }
  )
}

export default actions
