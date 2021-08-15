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
        isAuthenticated: false,
        user : {}
    },
    getters: {
        isAuthenticated: (state) => {
            return state.isAuthenticated
        }
    },
    mutations: {
        ADD_USER_INFO(state, payload) {
            state.user = payload
        },
        SET_AUTHENTICATED(state, payload) {
            state.isAuthenticated = payload
        }
    },
})
export default store
