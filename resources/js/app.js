 // Libraries
import axios from 'axios'
import { createApp } from 'vue'
import router from '@/router'
import store from '@/store'

// Axios settings
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.withCredentials = true

// Axios cancel token request interceptor
axios.interceptors.request.use(
    function (config) {
        //  Generate cancel token source
        let source = axios.CancelToken.source()

        // Set cancel token on this request
        config.cancelToken = source.token

        // Add to vuex to make cancellation available from anywhere
        store.commit('requestToken/ADD_CANCEL_TOKEN', source)

        return config
    },
    function (error) {
        return Promise.reject(error)
    }
)

const app = createApp({
    router,
    store,
})

app.use(router)
app.use(store)
app.mount('#app')

// Before creation callback
router.beforeEach((to, from, next) => {
    store.dispatch('requestToken/CANCEL_PENDING_REQUESTS').then(function() {
        // We let axios finish canceling previous route requests before checking auth.
        const auth = localStorage.getItem('Authenticated') === 'true';

        // If authenticated, get user data otherwise continue to gate.
        if (auth) {
            store.dispatch('account/getUser').then(() => { authCheck(to) })
        } else {
            authCheck(to)
        }

        // Check dark mode
        if (localStorage.getItem('darkMode') === 'true') {
            console.log('Dark Mode: True');
            document.getElementsByTagName('html').item(0).classList.add('dark');
        }

        // Check if route requires authentication
        function authCheck(to) {
            if (to.matched.some(record => record.meta.requiresAuth)) {
                // This route requires auth, check if logged in if not, redirect to login page.
                if (!store.state.account.isAuthenticated) {
                    next({
                        path: '/',
                        query: { login: true }
                    })
                } else {
                    next()
                }
            } else {
                next() // Make sure to always call next().
            }
        }
    })
})