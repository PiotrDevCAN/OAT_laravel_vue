export default {
    namespaced: true,
    state: {

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
        // Form all fields
        setFormData(state, {id, data, loaded }) {
            if (state.form.hasOwnProperty(id)) {
                state.form[id].data = data
                /*                [
                    {
                      value: '10 value',
                      label: '10 label',
                      name: 'Tens',
                    },
                    {
                      value: '20s',
                      label: '20s',
                      name: 'Twenties',
                    },
                    {
                      value: '30s',
                      label: '30s',
                      name: 'Thirties',
                    },
                    {
                      value: '40s',
                      label: '40s',
                      name: 'Fourties',
                    },
                    {
                      value: '50s',
                      label: '50s',
                      name: 'Fifties',
                    },
                ]
                */
                state.form[id].loaded = loaded
            }
        },

        // All filters option
        setFilterData(state, {id, data, loaded }) {
            if (state.filters.hasOwnProperty(id)) {
                state.filters[id].data = data
                state.filters[id].loaded = loaded   
            }
        },

        // Data Table section
        setColumns(state, { type, columns }) {
            if (state.tables.hasOwnProperty(type)) {
                state.tables[type].columns = columns
            }
        },
        setRecords(state, { type, records }) {
            if (state.tables.hasOwnProperty(type)) {
                state.tables[type].records = records   
            }
        },
        setLoading(state, { type, loading }) {
            if (state.tables.hasOwnProperty(type)) {
                state.tables[type].loading = loading   
            }
        },
        setLoaded(state, { type, loaded }) {
            if (state.tables.hasOwnProperty(type)) {
                state.tables[type].loaded = loaded
            }
        },
    },
    actions: {
        // in {} is a key available in an passed array
        fetchFormData({ state, commit, rootState }) {
            const baseURI = rootState.baseUrl+'/api/request/formData'
            return axios.post(baseURI)
                .then(response => {

                    var data = response.data
                    for (const key in data) {
                        let filterData = {
                            id: key,
                            data: data[key],
                            loaded: true
                        }
                        commit('setFormData', filterData)
                    }
                })
        },
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
        
        // if (id in state.form)
        // if ('data' in state.form[id])

        getFormDataById: state => id => {
            if (state.form.hasOwnProperty(id)) {
                if (state.form[id].hasOwnProperty('data')) {
                    return state.form[id].data
                }
                return []
            }
            return []
        },
        getFormLoadedStateById: state => id => {
            if (state.form.hasOwnProperty(id)) {
                if (state.form[id].hasOwnProperty('loaded')) {
                    return state.form[id].loaded
                }
                return false
            }
            return false
        },

        getFilterDataById: state => id => {
            if (state.filters.hasOwnProperty(id)) {
                if (state.filters[id].hasOwnProperty('data')) {
                    return state.filters[id].data
                }
                return []
            }
            return []
        },
        getFilterLoadedStateById: state => id => {
            if (state.filters.hasOwnProperty(id)) {
                if (state.filters[id].hasOwnProperty('loaded')) {
                    return state.filters[id].loaded
                }
                return false
            }
            return false
        },
        getFilterSelectedValueById: state => id => {
            if (state.filters.hasOwnProperty(id)) {
                if (state.filters[id].hasOwnProperty('value')) {
                    return state.filters[id].value
                }
                return ''
            }
            return ''
        },

        getColumnsByType: state => type => {
            if (state.tables.hasOwnProperty(type)) {
                if (state.tables[type].hasOwnProperty('columns')) {
                    return state.tables[type].columns
                }
                return []
            }
            return []
        },
        getRecordsByType: state => type => {
            if (state.tables.hasOwnProperty(type)) {
                if (state.tables[type].hasOwnProperty('records')) {
                    return state.tables[type].records
                }
                return []
            }
            return []
        },
        getLoadingByType: state => type => {
            if (state.tables.hasOwnProperty(type)) {
                if (state.tables[type].hasOwnProperty('loading')) {
                    return state.tables[type].loading
                }
                return false
            }
            return false
        },
        getLoadedByType: state => type => {
            if (state.tables.hasOwnProperty(type)) {
                if (state.tables[type].hasOwnProperty('loaded')) {
                    return state.tables[type].loaded
                }
                return false
            }
            return false
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