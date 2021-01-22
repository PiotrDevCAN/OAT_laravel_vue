export default {
    namespaced: true,
    state: {

        // loadingFilters: true,

        // filters data
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
            }
        },
        // tables data and settings
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
            }
        }
    },

    mutations: {
        // All filters option
        setFilterData(state, {id, data, loaded }) {
            state.filters[id].data = data
            state.filters[id].loaded = loaded
        },

        // Data Table section
        setColumns(state, { type, columns }) {
            state.tables[type].columns = columns
        },
        setRecords(state, { type, records }) {
            state.tables[type].records = records
        },
        setLoading(state, { type, loading }) {
            state.tables[type].loading = loading
        },
        setLoaded(state, { type, loaded }) {
            state.tables[type].loaded = loaded
        },
    },
    actions: {
        // in {} is a key available in an passed array
        fetchFiltersData({ state, commit, rootState }) {
            const baseURI = rootState.baseUrl+'/api/request/filters'
            return axios.post(baseURI)
                .then(response => {

                    var data = response.data
                    for (const key in data) {
                        let filterData = {
                            id: key,
                            data: data[key],
                            loaded: true
                        }
                        commit('setFilterData', filterData)
                    }
                })
        },
        // in {} is a key available in an passed array
        fetchTableData({ state, commit, rootState }, type ) {

            var data = {
                type: type,
                loading: true
            }
            commit('setLoading', data)
            
            let params = {
                requestType: type
            }

            const baseURI = rootState.baseUrl+'/api/request/list'
            return axios.post(baseURI, params)
                .then(response => {
                    var data = {
                        type: type,
                        columns: response.data.columns,
                        records: response.data.data,
                        loading: false,
                        loaded: true
                    }
                    commit('setColumns', data)
                    commit('setRecords', data)
                    
                    commit('setLoading', data)
                    commit('setLoaded', data)
                })
        }
    },
    getters: {

        getFilterDataById: state => id => {
            return state.filters[id].data
        },
        getFilterLoadedStateById: state => id => {
            return state.filters[id].loaded
        },
        getFilterSelectedValueById: state => id => {
            return state.filters[id].value
        },

        getColumnsByType: state => type => {
            return state.tables[type].columns
        },
        getRecordsByType: state => type => {
            return state.tables[type].records
        },
        getLoadingByType: state => type => {
            return state.tables[type].loading
        },
        getLoadedByType: state => type => {
            return state.tables[type].loaded
        },

        getRecordsCountByType: (state, getters) => type => {
            return String(getters.getRecordsByType(type).length)
        },
        getRecordsHoursCountByType: (state, getters) => type => {
            return String(getters.getRecordsByType(type).length)
        },

        getCustomerById: state => id => {
            return state.customers.find(customer => customer.id === id)
        }
    }
}