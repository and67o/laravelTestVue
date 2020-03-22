const getters = {
  isAuth: (state) => state.isAuth,
  getUserId: (state) => state.userId,
  getAllPosts: (state) => state.posts,
  getPost: (state) => state.post,
  errors: (state) => state.errors,
}

export default getters
