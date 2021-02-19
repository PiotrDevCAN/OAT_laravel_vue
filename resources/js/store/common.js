const state = {
    errors: []
}

const actions = {
    error: {
        root: true,
        handler({ commit }, error) {
            commit("ERROR", error)
        }
    }
}

const mutations = {
    ERROR (state, error) {
        /* this way we're gonna have the newest error on top of the list */
        state.errors = [error, ...state.errors]
    }
}

export default {
    name: 'common',
    namespaced: true,
    state,
    actions,
    mutations
}