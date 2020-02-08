import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes'

Vue.use(Router)
const router = new Router({
  mode: 'history',
  routes: routes
})

router.beforeEach((to, _, next) => {
  document.title = to.meta.title ? `${to.meta.title}` : 'Блог'
  next()
})

export default router
