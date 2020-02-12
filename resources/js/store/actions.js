import ApiService from '../api'
import {getToken} from "../base/tokenFunctions";

const actions = {
  login (context, { email, password }) {
    return new Promise((resolve, reject) => {
      ApiService
        .post('/v1/login', { email, password })
        .then(({ data: { result, token, error } }) => {
          if (result) {
            context.commit('clearErrors')
            context.commit('setAuth', { result, token })
            resolve(result)
          }
        })
        .catch(({ response: { data: { error } } }) => {
          context.commit('setError', error)
          reject(error)
        })
    })
  },
  logout (context) {
    context.commit('resetAuth')
    return new Promise((resolve, reject) => {
      ApiService
        .get('/v1/logout')
        .then(({ data }) => {
          context.commit('resetAuth')
          resolve()
        })
        .catch(({ response: { data: { error } } }) => {
          context.commit('setError', error)
          reject(error)
        })
    })
  },
  register (context, regParam) {
    return new Promise((resolve, reject) => {
      // eslint-disable-next-line camelcase
      const { name, email, password, c_password } = regParam
      ApiService
        .post('/v1/register', { email, name, password, c_password })
        .then(({ userId, success: token }) => {
          context.commit('setAuth', { userId, token })
        })
        .catch(({ response: { data: { error } } }) => {
          context.commit('setError', error)
        })
    })
  },
  checkAuth (context) {

  }
}

export default actions
