import {
  setToken,
  unsetToken
} from '../../base/tokenFunctions'

const mutations = {
  clearErrors (state) {
    state.errors = []
  },
  setError (state, { target, message }) {
    state.errors[target] = []
    state.errors[target].push({
      message: message
    })
  },
  setAuth (state, { token, userId }) {
    state.token = token
    state.userId = userId
    state.isAuth = true
    setToken(token)
  },
  resetAuth (state) {
    unsetToken()
    state.token = null
    state.userId = null
    state.isAuth = false
    state.errors = []
  }
}

export default mutations
