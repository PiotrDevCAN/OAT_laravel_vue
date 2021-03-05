
// getters helpers
// import { findByKey } from 'vuex-intern'
// import { filterByKey } from 'vuex-intern'

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
    errors: [],
    infos: [],
    successes: [],
    warnings: []
}

const mutations = {
    ERROR (state, error) {
        /* this way we're gonna have the newest error on top of the list */
        state.errors = [error, ...state.errors]
    },
    INFO (state, info) {
        /* this way we're gonna have the newest info on top of the list */
        state.infos = [info, ...state.infos]
    },
    SUCCESS (state, success) {
        /* this way we're gonna have the newest success on top of the list */
        state.successes = [success, ...state.successes]
    },
    WARNING (state, warning) {
        /* this way we're gonna have the newest warning on top of the list */
        state.warnings = [warning, ...state.warnings]
    },

    // SET_FORM: set('form'),
    SET_FORM (state, data) {
        console.log('common SET_FORM mutation')
    },
    // SET_FILTERS: set('filters'),
    SET_FILTERS (state, data) {
        console.log('common SET_FILTERS mutation')
    },
    // SET_TABLES: set('tables'),
    SET_TABLES (state, data) {
        console.log('common SET_TABLES mutation')
    },
    // SET_FILTERS_PROMISE: function (state, data) {
    SET_FILTERS_PROMISE (state, data) {
        state.fetchFiltersPromise = data
    }
}

const actions = {
    error: {
        // set as root action
        root: true,
        handler({ commit }, msg) {
            let item = {
                kind: 'error',
                title: msg,
                subTitle: 'Error encountered'
            }
            commit("ERROR", item)
        }
    },
    info: {
        // set as root action
        root: true,
        handler({ commit }, msg) {
            let item = {
                kind: 'info',
                title: msg,
                subTitle: 'Information'
            }
            commit("INFO", item)
        }
    },
    success: {
        // set as root action
        root: true,
        handler({ commit }, msg) {
            let item = {
                kind: 'success',
                title: msg,
                subTitle: 'Action successed'
            }
            commit("SUCCESS", item)
        }
    },
    warning: {
        // set as root action
        root: true,
        handler({ commit }, msg) {
            let item = {
                kind: 'warning',
                title: msg,
                subTitle: 'Warning'
            }
            commit("WARNING", item)
        }
    },

    fetchFormData: {
        // set as root action
        root: true,
        // handler({ state, commit, rootState, rootGetters }, storeName) {
        handler({ commit, dispatch, getters, rootGetters, rootState, state }, storeName) {
            
            console.log('common fetchFormData ')
            
            var apiModuleName = getters.getApiModulName(storeName)

            const source = 'formData'
            const baseURI = rootGetters.getBaseUrl(apiModuleName, source)
            return axios.post(baseURI)
                .then(response => {
    
                    var data = response.data
                    for (const key in data) {
                        let filterData = {
                            // id: key,
                            data: data[key],
                            loaded: true
                        }
                        // commit('SET_FORM', filterData)
                    }
                    commit(storeName+"/SET_FORM", filtersData, { root: true })
                    // dispatch(storeName+'/setForm', data, { root: true })
                    dispatch('info', 'Fetch form data', { root: true })
                }).catch( error => {
                    dispatch('error', error.response, { root: true })
                })
        }
    },

    // keys available in context in actions
    // { commit, dispatch, getters, rootGetters, rootState, state }
    
    fetchFiltersData: {
        // set as root action
        root: true,
        // handler({ state, commit, rootState, rootGetters }, storeName) {
        handler({ commit, dispatch, getters, rootGetters, rootState, state }, storeName) {
            
            console.log('common fetchFiltersData '+storeName)
            
            var apiModuleName = getters.getApiModulName(storeName)

            const source = 'filters'
            const baseURI = rootGetters.getBaseUrl(apiModuleName, source)
            return axios.post(baseURI)
                .then(response => {
    
                    var data = response.data
                    var filtersData = {}
                    for (const key in data) {
                        let filterData = {
                            // id: key,
                            data: data[key],
                            loaded: true
                        }
                        filtersData[key] = filterData
                        // commit('SET_FILTER', filterData)
                    }
                    // dispatch('someOtherAction') // -> 'foo/someOtherAction'
                    // dispatch('someOtherAction', null, { root: true }) // -> 'someOtherAction'
            
                    // commit('someMutation') // -> 'foo/someMutation'
                    // commit('someMutation', null, { root: true }) // -> 'someMutation'

                    // commit("common/SET_FILTERS", filtersData, { root: true })
                    // commit("SET_FILTERS", filtersData, { root: true })
                    // commit("SET_FILTERS", filtersData)
                    commit(storeName+"/SET_FILTERS", filtersData, { root: true })
                    // dispatch(storeName+'/setFilters', data, { root: true })
                    dispatch('info', 'Fetch filters data', { root: true })
                }).catch( error => {
                    dispatch('error', error.response, { root: true })
                })
        }
    },

    fetchTableData: {
        // set as root action
        root: true,
        // handler({ state, commit, rootState, rootGetters }, storeName ) {
        handler({ commit, dispatch, getters, rootGetters, rootState, state }, storeName) {
            
            console.log('common fetchTableData '+storeName)
            
            // var data = {
            //     type: type,
            //     loading: true
            // }
            // commit('SET_LOADING', data)
            
            let params = {
                // requestType: type
            }
            
            var apiModuleName = getters.getApiModulName(storeName)

            const source = 'list'
            const baseURI = rootGetters.getBaseUrl(apiModuleName, source)
            return axios.post(baseURI, params)
                .then(response => {

                    var data = {}
                    data[storeName] = {
                        // type: storeName,
                        columns: response.data.columns,
                        records: response.data.data,
                        meta: response.data.meta,
                        draw: '',
                        loading: false,
                        loaded: true
                    }
                    // commit("common/SET_TABLES", data, { root: true })
                    // commit("SET_TABLES", data, { root: true })
                    // commit("SET_TABLES", data)
                    commit(storeName+"/SET_TABLES", data, { root: true })
                    // dispatch(storeName+'/setTables', data, { root: true })
                    dispatch('info', 'Fetch table data', { root: true })
                })
                .catch( error => {
                    dispatch('error', error.response, { root: true })
                })
        }
    }
    // setForm: {
    //     commit(storeName+"/SET_FORM", filtersData, { root: true })
    // }, 
    // setFilters: {
    //     commit(storeName+"/SET_FILTERS", filtersData, { root: true })
    // },
    // setTables: {
    //     commit(storeName+"/SET_TABLES", filtersData, { root: true })
    // }
}

const getters = {

    // if (id in state.form)
    // if ('data' in state.form[id])

    getErrors: ( state ) => {
        return state.errors
    },
    countErrors: ( state, getters ) => {
        return getters.getErrors.length
    },

    getInfos: ( state ) => {
        return state.infos
    },
    countInfos: ( state, getters ) => {
        return getters.getInfos.length
    },

    getSuccesses: ( state ) => {
        return state.successes
    },
    countSuccesses: ( state, getters ) => {
        return getters.getSuccesses.length
    },

    getWarnings: ( state ) => {
        return state.warnings
    },
    countWarnings: ( state, getters ) => {
        return getters.getWarnings.length
    },

    countNotifications: ( state, getters ) => {
        return getters.getErrors + getters.getInfos + getters.getSuccesses + getters.getWarnings;
    },

    // keys available in getters
    // { state, getters, rootState, rootGetters }

    getStoreByName: ( state, getters, rootState, rootGetters ) => storeName => {
        if (rootState.hasOwnProperty(storeName)) {
            return rootState[storeName]
        }
        return false
    },

    getStoreStateByKey: ( state, getters, rootState, rootGetters ) => (key, storeName) => {
        let store = getters.getStoreByName(storeName)
        if (store) {
            if (store.hasOwnProperty(key)) {
                return store[key]
            }
        }
        return false
    },

    getApiModulName: ( state, getters, rootState, rootGetters ) => storeName => {
        ////
        // console.log('getApiModulName')
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('apiModuleName')) {
                return rootState[storeName].apiModuleName
            }
        }
        return ''
    },

    // getFormDataById: state => id => {
    getFormDataById: ( state, getters, rootState, rootGetters ) => (id, storeName) => {
        ////
        // console.log('getFormDataById')
        // console.log(id)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('form')) {
                if (rootState[storeName].form.hasOwnProperty(id)) {
                    if (rootState[storeName].form[id].hasOwnProperty('data')) {
                        return rootState[storeName].form[id].data
                    }
                }
            }
        }
        return []
    },

    // getFormLoadedStateById: state => id => {
    getFormLoadedStateById: ( state, getters, rootState, rootGetters ) => (id, storeName) => {
        ////
        // console.log('getFormLoadedStateById')
        // console.log(id)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('form')) {
                if (rootState[storeName].form.hasOwnProperty(id)) {
                    if (rootState[storeName].form[id].hasOwnProperty('loaded')) {
                        return rootState[storeName].form[id].loaded
                    }
                }
            }
        }
        return false
    },

    // getFilterDataById: state => id => { 
    getFilterDataById: ( state, getters, rootState, rootGetters ) => (id, storeName) => {
        ////
        // console.log('getFilterDataById')
        // console.log(id)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('filters')) {
                if (rootState[storeName].filters.hasOwnProperty(id)) {
                    if (rootState[storeName].filters[id].hasOwnProperty('data')) {
                        return rootState[storeName].filters[id].data
                    }
                }
            }
        }
        return []
    },

    // getFilterLoadedStateById: state => id => {
    getFilterLoadedStateById: ( state, getters, rootState, rootGetters ) => (id, storeName) => {
        ////
        // console.log('getFilterLoadedStateById')
        // console.log(id)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('filters')) {
                if (rootState[storeName].filters.hasOwnProperty(id)) {
                    if (rootState[storeName].filters[id].hasOwnProperty('loaded')) {
                        return rootState[storeName].filters[id].loaded
                    }
                }
            }
        }
        return false
    },

    // getFilterSelectedValueById: state => id => {
    getFilterSelectedValueById: ( state, getters, rootState, rootGetters ) => (id, storeName) => {
        ////
        // console.log('getFilterSelectedValueById')
        // console.log(id)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('filters')) {
                if (rootState[storeName].filters.hasOwnProperty(id)) {
                    if (rootState[storeName].filters[id].hasOwnProperty('value')) {
                        return rootState[storeName].filters[id].value
                    }
                }
            }
        }
        return ''
    },

    // getColumnsByType: state => type => {
    getColumnsByType: ( state, getters, rootState, rootGetters ) => (type, storeName) => {
        ////
        // console.log('getColumnsByType')
        // console.log(type)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('tables')) {
                if (rootState[storeName].tables.hasOwnProperty(type)) {
                    if (rootState[storeName].tables[type].hasOwnProperty('columns')) {
                        return rootState[storeName].tables[type].columns
                    }
                }
            }
        }
        return []
    },

    // getRecordsByType: state => type => {
    getRecordsByType: ( state, getters, rootState, rootGetters ) => (type, storeName) => {
        ////
        // console.log('getRecordsByType')
        // console.log(type)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('tables')) {
                if (rootState[storeName].tables.hasOwnProperty(type)) {
                    if (rootState[storeName].tables[type].hasOwnProperty('records')) {
                        return rootState[storeName].tables[type].records
                    }
                }
            }
        }
        return []  
    },

    // getMetaByType: state => type => {
    getMetaByType: ( state, getters, rootState, rootGetters ) => (type, storeName) => {
        ////
        // console.log('getRecordsByType')
        // console.log(type)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('tables')) {
                if (rootState[storeName].tables.hasOwnProperty(type)) {
                    if (rootState[storeName].tables[type].hasOwnProperty('meta')) {
                        return rootState[storeName].tables[type].meta
                    }
                }
            }
        }
        return []  
    },

    // getLoadingByType: state => type => {
    getLoadingByType: ( state, getters, rootState, rootGetters ) => (type, storeName) => {
        ////
        // console.log('getLoadingByType')
        // console.log(type)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('tables')) {
                if (rootState[storeName].tables.hasOwnProperty(type)) {
                    if (rootState[storeName].tables[type].hasOwnProperty('loading')) {
                        return rootState[storeName].tables[type].loading
                    }
                }
            }
        }
        return false
    },

    // getLoadedByType: state => type => {
    getLoadedByType: ( state, getters, rootState, rootGetters ) => (type, storeName) => {
        ////
        // console.log('getLoadedByType')
        // console.log(type)
        // console.log(storeName)
        if (rootState.hasOwnProperty(storeName)) {
            if (rootState[storeName].hasOwnProperty('tables')) {
                if (rootState[storeName].tables.hasOwnProperty(type)) {
                    if (rootState[storeName].tables[type].hasOwnProperty('loaded')) {
                        return rootState[storeName].tables[type].loaded
                    }
                }
            }
        }
        return false
    },

    getRecordsCountByType: ( state, getters, rootState, rootGetters ) => (type, storeName) => {
        return String(getters.getRecordsByType(type, storeName).length)
    },
    getRecordsHoursCountByType: ( state, getters, rootState, rootGetters ) => (type, storeName) => {
        return String(getters.getRecordsByType(type, storeName).length)
    }
}

export default {
    name: 'common',
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}