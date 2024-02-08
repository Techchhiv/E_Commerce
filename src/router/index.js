import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CartView from '@/views/CheckoutView.vue'
import CheckoutView from '../views/CartView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/products',
      name: 'products',
      component: () => import('../components/AllProduct.vue'),
    },
    {
      path: '/product/:productId',
      name: 'productDetails',
      component: () => import('../views/ProductView.vue'),
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/Login.vue'),
      meta: { hideNavbar: true },
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/Register.vue'),
      meta: { hideNavbar: true },
    },
    {
      path: '/cart',
      name: 'cart',
      component: CartView,
    },
    {
      path: '/checkout',
      name: 'checkout',
      component: CheckoutView,
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/AdminView.vue'),
      meta: { hideNavbar: true },
    }
    ,
    {
      path: '/admin/insert',
      name: 'insertProduct',
      component: () => import('../components/insertProduct.vue'),
      meta: { hideNavbar: true },
    }
    ,
    {
      path: '/admin/edit/:productId',
      name: 'updateProduct',
      component: () => import('../components/UpdateProduct.vue'),
      meta: { hideNavbar: true },
    }
  ]
})

export default router
