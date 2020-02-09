import Home from '../components/Home.vue'
import Register from '../components/Register.vue'
import Login from '../components/Login.vue'
import Post from '../components/Post'
import CreatePost from '../components/CreatePost'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      title: 'Home'
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      title: 'Register'
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      title: 'Login'
    }
  },
  {
    path: '/post/show/:id',
    name: 'post',
    component: Post,
    meta: {
      title: 'Post'
    }
  },
  {
    path: '/post/create',
    name: 'postCreate',
    component: CreatePost,
    meta: {
      title: 'Create Post'
    }
  }
]

export default routes
