
// getters helpers
// import { findByKey } from 'vuex-intern'
// import { filterByKey } from 'vuex-intern'

// // mutations helpers
// import { adjustListIndex } from 'vuex-intern'
// import { assignConstant } from 'vuex-intern'
// import { extendRecordInList } from 'vuex-intern'
// import { replaceRecordInList } from 'vuex-intern'
import { set } from 'vuex-intern'
// import { setPath } from 'vuex-intern'
// import { setProp } from 'vuex-intern'
// import { toggle } from 'vuex-intern'
// import { without } from 'vuex-intern'

// const set = key => (state, val) => {
//     state[key] = val
// }

const state = {
    apiModuleName: 'request',
    form: {
        promise: null
    },
    filters: {
        promise: null
    },
    tables: {
        promise: null
    }
}

const mutations = {
    // SET_FORM: set('form'),
    // SET_FILTERS: set('filters'),
    // SET_TABLES: set('tables'),
    SET_FORM (state, data) {
        console.log('requests SET_FORM mutation')
        state.form = data
    },
    SET_FILTERS (state, data) {
        console.log('requests SET_FILTERS mutation')
        state.filters = data
    },
    SET_TABLES (state, data) {
        console.log('requests SET_TABLES mutation')
        state.tables = data
    },
    // SET_FILTERS_PROMISE: function (state, data) {
    SET_FILTERS_PROMISE (state, data) {
        state.fetchFiltersPromise = data
    }
}

const actions = {

}

const getters = {

}

export default {
    name: 'requests',
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}