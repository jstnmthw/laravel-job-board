 // Libraries
import axios from 'axios'
import { createApp } from 'vue'
import router from './router'
import store from './store'

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

// !! Development mode !!
app.config.devtools = true

app.use(router)
app.use(store)
app.mount('#app')

// Before creation callback
router.beforeEach((to, from, next) => {
    store.dispatch('requestToken/CANCEL_PENDING_REQUESTS').then(function() {
        const auth = localStorage.getItem('Authenticated') === 'true';
        if (auth) {
            axios.get('/api/user').then((res) => {
                store.commit('ADD_USER_INFO', res.data)
                store.commit('SET_AUTHENTICATED', true)
            })
        }
        next();
    })
})