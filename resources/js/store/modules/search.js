/**
 * Search
 */
const state = {
    search: null,
    searchQuery: null,
    locationName: null,
    locationId: null,
    // TODO: Get process.env.VUE_APP_URL working
    host: 'http://localhost',
}

const getters = {
    searchUrl(state) {
        const urlObj = new URL(state.host);
        urlObj.searchParams.append('locationId', state.locationId)
        urlObj.searchParams.append('location', state.locationName)
        urlObj.searchParams.append('search', state.search)
        return urlObj.href;
    }
}

const mutations = {
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
