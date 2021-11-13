import axios from 'axios'
import router from "@/router";

/**
 * Authentication
 */
const state = {
    isAuthenticated: false,
    authLoading: false,
    user: {},
    errors: false,
}

const getters = {
    isAuthenticated: (state) => state.isAuthenticated,
    authLoading: (state) => state.authLoading,
    user: (state) => state.user,
}

const mutations = {
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
}

const actions = {
    login({ commit, state }, credentials) {
        return new Promise((resolve, reject) => {
            commit('AUTH_LOADING', true)
            axios.get('/sanctum/csrf-cookie').then(() => {
                axios.post('/api/login', credentials).then(() => {
                    axios.get('/api/user').then((res) => {
                        commit('ADD_USER_INFO', res.data.data)
                        commit('SET_AUTHENTICATED', true)
                        commit('AUTH_LOADING', false)
                        localStorage.setItem('Authenticated', 'true')
                        resolve()
                        router.push({ path: '/my/account' }).then()
                    }).catch((error) => {
                        if (error.response.status === 401) {
                            localStorage.removeItem('Authenticated')
                            router.push('/').then()
                        }
                        reject(error)
                        commit('AUTH_LOADING', false)
                    })
                })
                    .catch((error) => {
                        if (error.response.status >= 400) {
                            commit('SET_ERRORS', error.response.data.errors)
                        }
                        commit('AUTH_LOADING', false)
                    });
            }).catch((error) => {
                commit('AUTH_LOADING', false)
                reject(error)
            })
        })
    },
    logout({ commit }) {
        axios.post('/api/logout').then(function() {
            localStorage.removeItem('Authenticated')
            router.push('/').then(() => {
                commit('ADD_USER_INFO', {})
                commit('SET_AUTHENTICATED', false)
            })
        }).catch((e) => {
            console.log(e);
        })
    },
    getUser({ commit }) {
        return new Promise((resolve, reject) => {
            axios
                .get('/api/user').then((res) => {
                commit('ADD_USER_INFO', res.data.data)
                commit('SET_AUTHENTICATED', true)
                commit('AUTH_LOADING', false)
                localStorage.setItem('Authenticated', 'true')
                resolve()
            })
                .catch((error) => {
                    if (error.response.status === 401) {
                        localStorage.removeItem('Authenticated')
                        router.push('/').then()
                    }
                    reject(error)
                    commit('AUTH_LOADING', false)
                });
        });
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
