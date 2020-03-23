import ApiService from '../api'

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
        .catch(({ response: { data: { errors } } }) => {
          context.commit('setError', errors)
          reject(errors)
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
          resolve()
        })
        .catch(({
          response: { data: { errors } }
        }) => {
          context.commit('setError', errors)
          reject(errors)
        })
    })
  },
  posts (context, {
    page,
    search
    // eslint-disable-next-line no-undef
  } = postsParam
  ) {
    return new Promise((resolve, reject) => {
      search = search ? '&search=' + search : ''
      const url = '/v1/posts?page=' + page + search
      ApiService
        .get(url)
        .then(({
          data: { posts }
          // eslint-disable-next-line no-undef
        } = response) => {
          context.commit('setPosts', posts)
          resolve()
        })
        .catch(error => {
          reject(error)
        })
    })
  },
  post (context, id) {
    return new Promise((resolve, reject) => {
      const url = '/v1/post/show/' + id
      ApiService
        .get(url)
        .then(({
          data: { post }
          // eslint-disable-next-line no-undef
        } = response) => {
          context.commit('setPost', post)
          resolve()
        })
        .catch(error => {
          reject(error)
        })
    })
  },
  createPost (context, postParam) {
    return new Promise((resolve, reject) => {
      ApiService
        .post('/v1/post', postParam)
        .then(response => {
          resolve(response)
        })
        .catch(({ response: { data: { errors } } }) => {
          context.commit('setError', errors)
          reject(errors)
        })
    })
  }
}

export default actions
