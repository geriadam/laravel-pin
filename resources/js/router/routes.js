const routes = [
  {
    path: '',
    component: () => import('@/pages/Main.vue'),
    name: 'Main'
  },
  {
    path: '/login',
    component: () => import('@/pages/Login.vue'),
    name: 'Login'
  },
  {
    path: '/favorites',
    component: () => import('@/pages/Favorites.vue'),
    name: 'Favorites'
  },
  {
    path: '/upload',
    component: () => import('@/pages/Upload.vue'),
    name: 'Upload'
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)',
    name: "NotFound",
    component: () => import('@/pages/Error404.vue')
  }
]

export default routes