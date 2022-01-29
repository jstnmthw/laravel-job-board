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
        state.search = payload;
    },
    SET_LOCATION(state, payload) {
        state.location = payload;
    },
    SET_PAGE(state, payload) {
        state.page = payload;
    },
    SET_SEARCH_DATA(state, payload) {
        const { search, locId, loc, page } = payload;
        state.search = search ? decodeURI(search) : null;
        state.locId = locId ?? null;
        state.loc = loc ? decodeURI(loc) : null;
        state.page = page ?? null;
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
