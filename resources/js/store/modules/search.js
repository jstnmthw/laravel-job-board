/**
 * Search
 */
const state = {
    search: null,
    locId: null,
    loc: null,
    page: null,
}

const getters = {
    searchParams(state) {
        const urlObj = new URLSearchParams();
        if(state.search) {
            urlObj.append('search', encodeURI(state.search));
        }
        if(state.locId) {
            urlObj.append('locId', state.locId);
        }
        if(state.loc) {
            urlObj.append('loc', encodeURI(state.loc));
        }
        if(state.page) {
            urlObj.append('page', state.page)
        }
        return urlObj.toString();
    }
}

const mutations = {
    SET_SEARCH(state, payload) {
        const { search, locId, loc, page } = payload;
        state.search = search ? decodeURI(search) : state.search;
        state.locId = locId ?? state.locId;
        state.loc = loc ? decodeURI(loc) : state.loc;
        state.page = page ?? state.page;
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
