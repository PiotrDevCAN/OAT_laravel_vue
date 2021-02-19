
// getters helpers
import { findByKey } from 'vuex-intern'
import { filterByKey } from 'vuex-intern'

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
    moduleType: 'request'

    /*
    form: {
        account: {
            data: [],
            loaded: false
        },
        country: {
            data: [],
            loaded: false
        },
        worksInCenter: {
            data: [],
            loaded: false
        },
        competency: {
            data: [],
            loaded: false
        },
        recoverable: {
            data: [],
            loaded: false
        },
        nature: {
            data: [],
            loaded: false
        },
        weekending: {
            data: [],
            loaded: false
        },
        import: {
            data: [],
            loaded: false
        }
    },
    */

    // filters data
    /*
    filters: {
        accounts: {
            data: [],
            loaded: false
        },
        reasons: {
            data: [],
            loaded: false
        },
        names: {
            data: [],
            loaded: false
        },
        types: {
            data: [],
            loaded: false
        },

        competencies: {
            data: [],
            loaded: false
        },
        statuses: {
            data: [],
            loaded: false
        },
        requestors: {
            data: [],
            loaded: false
        },
        locations: {
            data: [],
            loaded: false
        },

        weekendStart: {
            data: [],
            loaded: false
        },
        weekendEnd: {
            data: [],
            loaded: false
        },
        imports: {
            data: [],
            loaded: false
        },

        firstApprovers: {
            data: [],
            loaded: false
        },
        secondApprovers: {
            data: [],
            loaded: false
        },
        thirdApprovers: {
            data: [],
            loaded: false
        },

        approvalModes: {
            data: [],
            loaded: false
        },
        squadLeaders: {
            data: [],
            loaded: false
        },
        tribeLeaders: {
            data: [],
            loaded: false
        },
        promise: null
    },
    */
    // tables data and settings
    /*
    tables: {
        awaiting: {
            columns: [],
            records: [],
            loading: false,
            loaded: false
        },
        approved: {
            columns: [],
            records: [],
            loading: false,
            loaded: false
        },
        other: {
            columns: [],
            records: [],
            loading: false,
            loaded: false
        },
        promise: null
    }
    */
}

const mutations = {

    // SET_AUTHORIZED_USER: set('authorizedUser_prop'), // uses setProp
	// SET_AUTH_TOKEN: set(['authorizedUser_path', 'token']), // uses setPath

    // SET_AUTHORIZED_USER: set('filters'), // uses setProp
    // SET_AUTH_TOKEN: set(['filters', 'token']), // uses setPath

    // setProp1: set('prop1'),
    // setProp2: set('prop2'),

    // Form all fields
    /*
    SET_FORM(state, {id, data, loaded }) {
        if (state.form.hasOwnProperty(id)) {
            state.form[id].data = data
            state.form[id].loaded = loaded
        }
    },
    */
    SET_FORM: set('form'),

    // All filters option
    /*
    SET_FILTER(state, {id, data, loaded }) {
        if (state.filters.hasOwnProperty(id)) {
            state.filters[id].data = data
            state.filters[id].loaded = loaded   
        }
    },
    */
    SET_FILTERS: set('filters'),

    // Data Table section
    SET_TABLES: set('tables'),
    /*
    SET_COLUMNS(state, { type, columns }) {
        if (state.tables.hasOwnProperty(type)) {
            state.tables[type].columns = columns
        }
    },
    */
    // SET_COLUMNS: set('tables'),

    /*
    SET_RECORDS(state, { type, records }) {
        if (state.tables.hasOwnProperty(type)) {
            state.tables[type].records = records   
        }
    },
    */
    // SET_RECORDS: set('filters'),

    /*
    SET_LOADING(state, { type, loading }) {
        if (state.tables.hasOwnProperty(type)) {
            state.tables[type].loading = loading   
        }
    },
    */
    // SET_LOADING: set('filters'),

    /*
    SET_LOADED(state, { type, loaded }) {
        if (state.tables.hasOwnProperty(type)) {
            state.tables[type].loaded = loaded
        }
    },
    */
    // SET_LOADED: set('filters'),
}

const actions = {

    /*
    setAuthorizedUser ({commit}) {
        // context.commit
        // commit('SET_AUTHORIZED_USER', { token: 'abc', uid: '1' })
        // commit('SET_AUTHORIZED_USER', { data: {test: 'my_test'}, loaded: true })
    },
    */
    /*
    setAuthToken ({commit}) {
        // context.commit
        // commit('SET_AUTH_TOKEN', 'cbd')
        commit('SET_AUTH_TOKEN', 'cbd')
    },
    */

    actionWithTheSameName (context) {
        console.log('actionWithTheSameName - REQUESTS module')
        console.log(context)
    },

    callModuleAction(context) {
        console.log('callModuleAction')
        console.log(context)
    },

    // in {} is a key available in an passed array
    async fetchFormData({ state, commit, rootGetters }) {
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
    async fetchFiltersData({ state, commit, rootGetters }) {
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
    async fetchTableData({ state, commit, rootGetters }, type ) {

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

    // getters defined in module

    // `getters` is localized to this module's getters
    // you can use rootGetters via 4th argument of getters
    /*
    someGetter (state, getters, rootState, rootGetters) {
        getters.someOtherGetter // -> 'foo/someOtherGetter'
        rootGetters.someOtherGetter // -> 'someOtherGetter'
        rootGetters['bar/someOtherGetter'] // -> 'bar/someOtherGetter'
    },
    someOtherGetter: state => { ... }
    */

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

        console.log('requests.getFilterLoadedStateById')
        console.log(this)
        console.log(state)
        console.log(id)

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
    name: 'requests',
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}