/**
 * Search
 */
const state = {
    // Setting blank strings instead of null results in the
    // search query being built like: locId=& instead of locId=null&.
    // Is a shorter url query string better in this case?
    search: '',
    location: {
        name: '',
        id: '',
    },
}

const getters = {
    searchParams(state) {
        const urlObj = new URLSearchParams();
        if(state.search) {
            urlObj.append('search', encodeURI(state.search));
        }
        if(state.location.id) {
            urlObj.append('locId', state.location.id);
        }
        if(state.location.name) {
            urlObj.append('loc', encodeURI(state.location.name));
        }
        return '?' + urlObj.toString();
    }
}

const mutations = {
    SET_SEARCH(state, payload) {
        state.search = payload;
    },
    SET_LOCATION(state, payload) {
        state.location = payload;
    }
}

const actions = {
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
