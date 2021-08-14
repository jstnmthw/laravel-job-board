import { createRouter, createWebHistory } from 'vue-router'
import Homepage from '@/views/Homepage'
const routes = [
    {
        path: '/',
        name: 'Homepage',
        component: Homepage
    },
    // {
    //     path: '/about',
    //     name: 'About',
    //     component: () => import(/* webpackChunkName: "about" */ '@/views/About')
    // }
]
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
export default router