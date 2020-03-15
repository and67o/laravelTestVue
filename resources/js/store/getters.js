const getters = {
  isAuth: (state) => state.isAuth,
  getUserId: (state) => state.userId,
    getAllPosts: (state) => {
      // console.log(state.posts)
        return state.posts;
    }
}

export default getters
