const getters = {
  isAuth: (state) => state.isAuth,
  getUserId: (state) => state.userId,
  getAllPosts: (state) => {
    return state.posts
  }
}

export default getters
