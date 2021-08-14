import RequestToken from '@/store/modules/request-token'
import api from '@/store/modules/api'
import { createStore } from 'vuex'

// Create a new store instance.
const store = createStore({
    strict: true,
    modules: {
        requestToken: RequestToken,
        api: api
    },
    state: {
        user: [],
    },
    mutations: {
        ADD_USER_INFO(state, payload) {
            state.user = payload
        },
    },
})
export default store

