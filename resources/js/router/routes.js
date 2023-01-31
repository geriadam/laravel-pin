import auth from "@/middleware/auth";
import admin from "@/middleware/admin";
import guest from "@/middleware/guest";

const routes = [
  {
    path: '',
    component: () => import('@/pages/Main.vue'),
    name: 'Main',
    meta: { middleware: [guest] },
  },
  {
    path: '/login',
    component: () => import('@/pages/Login.vue'),
    name: 'Login',
    meta: { middleware: [guest] },
  },
  {
    path: '/favorites',
    component: () => import('@/pages/Favorites.vue'),
    name: 'Favorites',
    meta: { middleware: [auth] },
  },
  {
    path: '/upload',
    component: () => import('@/pages/Upload.vue'),
    name: 'Upload',
    meta: { middleware: [auth] },
  },
  {
    path: '/moderation',
    component: () => import('@/pages/Moderation.vue'),
    name: 'Moderation',
    meta: { middleware: [auth, admin] },
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