/**
 * Search
 */
const state = {
    search: '',
    location: {
        name: '',
        id: '',
    },
    url: process.env.APP_URL + '/jobs',
}

const getters = {
    searchUrl(state) {
        const urlObj = new URL(state.url);
        urlObj.searchParams.append('locId', state.location.id);
        urlObj.searchParams.append('loc', state.location.name);
        urlObj.searchParams.append('search', state.search);
        return urlObj.href;
    }
}

const mutations = {
    SET_SEARCH(state, payload) {
        state.location = payload.location ?? {};
        state.search = payload.search ?? null;
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
