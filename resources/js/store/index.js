import account from "@/store/modules/account";
import api from '@/store/modules/api'
import search from '@/store/modules/search'
import requestToken from '@/store/modules/request-token'
import { createStore } from 'vuex'

// Create a new store instance.
const store = createStore({
    strict: true,
    modules: {
        account: account,
        api: api,
        requestToken: requestToken,
        search: search,
    },
    state: {
        // We set loading to a number and increase the number
        // for every request that requires loading until all
        // requests are finished loading.
        loading: 0
    },
    mutations: {
        ACTIVATE_LOADING(state) {
            console.log('activated loading')
            state.loading++
        },
        DEACTIVATE_LOADING(state) {
            state.loading--
        }
    }
})
export default store
