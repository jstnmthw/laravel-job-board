import RequestToken from '@/store/modules/request-token'
import account from "@/store/modules/account";
import api from '@/store/modules/api'
import { createStore } from 'vuex'

// Create a new store instance.
const store = createStore({
    strict: true,
    modules: {
        requestToken: RequestToken,
        account: account,
        api: api,
    },
})
export default store
