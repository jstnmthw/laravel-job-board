import { createRouter, createWebHistory } from 'vue-router'
import Homepage from '@/views/Homepage'
const routes = [
    {
        path: '/',
        name: 'Homepage',
        component: Homepage
    },
    {
        path: '/my/account',
        name: 'UserAccount',
        component: () => import(/* webpackChunkName: "account" */ '@/views/account/Index'),
        meta: { requiresAuth: true }
    },
    {
        path: '/jobs',
        name: 'JobsIndex',
        component: () => import(/* webpackChunkName: "account" */ '@/views/jobs/Index'),
        meta: { requiresAuth: true }
    },
    {
        path: '/docs/styleguide',
        name: 'Styleguide',
        component: () => import(/* webpackChunkName: "styleguide" */ '@/views/styleguide/Index'),
        meta: { requiresAuth: true }
    }
]
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
export default router