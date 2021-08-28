import RequestToken from '@/store/modules/request-token'
import api from '@/store/modules/api'
import { createStore } from 'vuex'
import axios from "axios";
import router from "@/router";

// Create a new store instance.
const store = createStore({
    strict: true,
    modules: {
        requestToken: RequestToken,
        api: api
    },
    state: {
        isAuthenticated: false,
        authLoading: false,
        user: {},
        errors: false,
    },
    getters: {
        isAuthenticated: (state) => {
            return state.isAuthenticated
        },
        authLoading: (state) => {
            return state.authLoading
        },
        user: (state) => {
            return state.user
        }
    },
    mutations: {
        ADD_USER_INFO(state, payload) {
            Object.assign(state.user, payload)
        },
        SET_AUTHENTICATED(state, payload) {
            state.isAuthenticated = payload
        },
        AUTH_LOADING(state, payload) {
            state.authLoading = payload
        },
        SET_ERRORS(state, payload) {
            state.errors = Object.assign({}, payload)
        }
    },
    actions: {
        login({ commit, state }, credentials) {
            return new Promise((resolve, reject) => {
                commit('AUTH_LOADING', true)
                // TODO: Remove setTimeout() after tests
                // setTimeout(() => {
                     axios.get('/sanctum/csrf-cookie').then(() => {
                        axios
                            .post('/api/login', credentials)
                            .then(() => {
                                axios.get('/api/user').then((res) => {
                                    commit('ADD_USER_INFO', res.data.data)
                                    commit('SET_AUTHENTICATED', true)
                                    commit('AUTH_LOADING', false)
                                    localStorage.setItem('Authenticated', 'true')
                                    resolve()
                                    router.push({ path: '/my/account' }).then()
                                }).catch((error) => {
                                    commit('AUTH_LOADING', false)
                                    if (error.response.status <= 400) {
                                        commit('SET_ERRORS', error.response.errors)
                                    }
                                    reject(error)
                                })
                            })
                            .catch((error) => {
                                commit('AUTH_LOADING', false)
                                console.log(error.response.status)
                                if (error.response.status >= 400) {
                                    commit('SET_ERRORS', error.response.data.errors)
                                }
                            });
                    }).catch((error) => {
                        commit('AUTH_LOADING', false)
                        reject(error)
                     })
                // }, 1000)
            })
        },
        logout() {
            axios.post('/api/logout').then(function() {
                localStorage.removeItem('Authenticated')
                router.push('/').then(() => {
                    store.commit('ADD_USER_INFO', {})
                    store.commit('SET_AUTHENTICATED', false)
                })
            }).catch((e) => {
                console.log(e);
            })
        },
    }
})
export default store
