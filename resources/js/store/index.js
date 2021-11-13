import account from "@/store/modules/account";
import api from '@/store/modules/api'
import requestToken from '@/store/modules/request-token'
import { createStore } from 'vuex'

// Create a new store instance.
const store = createStore({
    strict: true,
    modules: {
        account: account,
        api: api,
        requestToken: requestToken,
    },
})
export default store
