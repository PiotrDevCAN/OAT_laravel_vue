
// getters helpers
import { findByKey } from 'vuex-intern'
import { filterByKey } from 'vuex-intern'

// mutations helpers
// import { adjustListIndex } from 'vuex-intern'
// import { assignConstant } from 'vuex-intern'
// import { extendRecordInList } from 'vuex-intern'
// import { replaceRecordInList } from 'vuex-intern'
import { set } from 'vuex-intern'
// import { setPath } from 'vuex-intern'
// import { setProp } from 'vuex-intern'
// import { toggle } from 'vuex-intern'
// import { without } from 'vuex-intern'

const state = {
    moduleType: 'delegate'
}

const mutations = {
    SET_FORM: set('form'),
    SET_FILTERS: set('filters'),
    SET_TABLES: set('tables')
}

const actions = {
    // in {} is a key available in an passed array
    async fetchFormData({ state, commit, rootState, rootGetters }) {
        const source = 'formData'
        const baseURI = rootGetters.getBaseUrl(state.moduleType, source)
        return axios.post(baseURI)
            .then(response => {

                var data = response.data
                for (const key in data) {
                    let filterData = {
                        id: key,
                        data: data[key],
                        loaded: true
                    }
                    commit('SET_FORM', filterData)
                }
            })
    },
    // in {} is a key available in an passed array
    async fetchFiltersData({ state, commit, rootState, rootGetters }) {
        const source = 'filters'
        const baseURI = rootGetters.getBaseUrl(state.moduleType, source)
        return axios.post(baseURI)
            .then(response => {

                var data = response.data
                var filtersData = {}
                for (const key in data) {
                    let filterData = {
                        id: key,
                        data: data[key],
                        loaded: true
                    }
                    filtersData[key] = filterData
                    // commit('SET_FILTER', filterData)
                }
                commit('SET_FILTERS', filtersData)
            })
    },
    // in {} is a key available in an passed array
    async fetchTableData({ state, commit, rootState, rootGetters }, type ) {

        // var data = {
        //     type: type,
        //     loading: true
        // }
        // commit('SET_LOADING', data)
        
        let params = {
            requestType: type
        }

        const source = 'list'
        const baseURI = rootGetters.getBaseUrl(state.moduleType, source)
        return axios.post(baseURI, params)
            .then(response => {
                var data = {
                    type: type,
                    columns: response.data.columns,
                    records: response.data.data,
                    loading: false,
                    loaded: true
                }
                commit('SET_TABLES', data)
            })
    }
}

const getters = {

    // if (id in state.form)
    // if ('data' in state.form[id])

    getFormDataById: state => id => {
        // if (state.form.hasOwnProperty(id)) {
        //     if (state.form[id].hasOwnProperty('data')) {
        //         return state.form[id].data
        //     }
        //     return []
        // }
        return []
    },
    getFormLoadedStateById: state => id => {
        // if (state.form.hasOwnProperty(id)) {
        //     if (state.form[id].hasOwnProperty('loaded')) {
        //         return state.form[id].loaded
        //     }
        //     return false
        // }
        // field is loaded by default
        return true
    },

    getFilterDataById: state => id => {
        // if (state.filters.hasOwnProperty(id)) {
        //     if (state.filters[id].hasOwnProperty('data')) {
        //         return state.filters[id].data
        //     }
        //     return []
        // }
        return []
    },
    getFilterLoadedStateById: state => id => {
        // if (state.filters.hasOwnProperty(id)) {
        //     if (state.filters[id].hasOwnProperty('loaded')) {
        //         return state.filters[id].loaded
        //     }
        //     return false
        // }
        // field is loaded by default
        return true
    },
    getFilterSelectedValueById: state => id => {
        // if (state.filters.hasOwnProperty(id)) {
        //     if (state.filters[id].hasOwnProperty('value')) {
        //         return state.filters[id].value
        //     }
        //     return ''
        // }
        return ''
    },

    getColumnsByType: state => type => {
        // if (state.tables.hasOwnProperty(type)) {
        //     if (state.tables[type].hasOwnProperty('columns')) {
        //         return state.tables[type].columns
        //     }
        //     return []
        // }
        return []
    },
    getRecordsByType: state => type => {
        // if (state.tables.hasOwnProperty(type)) {
        //     if (state.tables[type].hasOwnProperty('records')) {
        //         return state.tables[type].records
        //     }
        //     return []
        // }
        return []
    },
    getLoadingByType: state => type => {
        // if (state.tables.hasOwnProperty(type)) {
        //     if (state.tables[type].hasOwnProperty('loading')) {
        //         return state.tables[type].loading
        //     }
        //     return false
        // }
        return false
    },
    getLoadedByType: state => type => {
        // if (state.tables.hasOwnProperty(type)) {
        //     if (state.tables[type].hasOwnProperty('loaded')) {
        //         return state.tables[type].loaded
        //     }
        //     return false
        // }
        // field is loaded by default
        return true
    },

    getRecordsCountByType: (state, getters) => type => {
        return String(getters.getRecordsByType(type).length)
    },
    getRecordsHoursCountByType: (state, getters) => type => {
        return String(getters.getRecordsByType(type).length)
    }
}

export default {
    name: 'delegates',
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}