import routes from './routes'
import { createRouter, createWebHistory } from 'vue-router'
const router = createRouter({
  routes,
  history: createWebHistory()
})
export default router