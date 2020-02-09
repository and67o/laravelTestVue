import {
  getToken
} from '../base/tokenFunctions'

const state = {
  token: null,
  isAuth: Boolean(getToken()),
  userId: null,
  errors: []
}

export default state
