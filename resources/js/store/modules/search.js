/**
 * Search
 */
const state = {
    search: null,
    locId: null,
    loc: null,
    page: null,
    employmentType: null,
    dateRange: null,
    salaryRange: null,
    radius: null,
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
        if(state.employmentType) {
            urlObj.append('employmentType', state.employmentType)
        }
        if(state.dateRange) {
            urlObj.append('dateRange', state.page)
        }
        if(state.salaryRange) {
            urlObj.append('salaryRange', state.salaryRange)
        }
        if(state.radius) {
            urlObj.append('radius', state.radius)
        }
        return urlObj.toString();
    }
}

const mutations = {
    SET_SEARCH(state, payload) {
        const { search, locId, loc, page, employmentType, dateRange, salaryRange, radius } = payload;
        state.search = search ? decodeURI(search) : state.search;
        state.locId = locId ? parseInt(locId) : state.locId;
        state.loc = loc ? decodeURI(loc) : state.loc;
        state.page = page ? parseInt(page) : state.page;
        state.employmentType = employmentType ? parseInt(employmentType) : state.employmentType;
        state.dateRange = dateRange ? parseInt(dateRange) : state.dateRange;
        state.salaryRange = salaryRange ? parseInt(salaryRange) : state.salaryRange;
        state.radius = radius ? parseInt(radius) : state.radius;
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
