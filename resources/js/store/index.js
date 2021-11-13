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
})
export default store
