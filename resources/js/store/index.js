import Vue from "vue";
import Vuex from "vuex";
 
Vue.use(Vuex);

// import application modules
import modules from './modules';

const state = {
    baseUrl: window.appUrl+'/api',
    user: {
        username: 'matt',
        fullName: 'Matt Maribojoc'
    },
    data: [],
    todos: [],
    promise: null
}

const actions = {
    actionWithTheSameName (context, data) {
        console.log('actionWithTheSameName - ROOT')
        console.log(context)
    },
    callModuleActionFromRoot (context, data) {
        console.log('callModuleActionFromRoot')
        console.log(context)
    }
}

const mutations = {
    SOME_MUTATION (state, data) {
        state.data = data
    }
}

const getters = {

    firstName: state => {
        return state.user.fullName.split(' ')[0]
    },
    lastName (state, getters) {
        return state.user.fullName.replace(getters.firstName, '')
    },
    prefixedName: (state, getters) => (prefix) => {
        return prefix + getters.lastName
    },

    getBaseUrl: (state) => (moduleType, source) => {
        return state.baseUrl + '/' + moduleType + '/' + source
    },

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
        // field is loaded by default
        return true
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

    doneTodos: state => {
        return state.todos.filter(todo => todo.done)
    },

    // returns value        
    doneTodosCount: (state, getters) => {
        return getters.doneTodos.length
    },

    // // returns function in VUE component
    // doneTodosCount () {
    //     return this.$store.getters.doneTodosCount
    // },

    getTodoById: (state) => (id) => {
        return state.todos.find(todo => todo.id === id)
    },

    // getFilterLoadedStateById: state => id => {
    getFilterLoadedStateById (state, getters, rootState) {

        console.log('index.getFilterLoadedStateById')
        // console.log(this)
        // console.log(state)
        // console.log(id)

        console.log('state')
        console.log(state)
        
        console.log('getters')
        console.log(getters)

        console.log('rootState')
        console.log(rootState)

        return true
        /*
        if (state.hasOwnProperty(filters)) {
            if (state.filters.hasOwnProperty(id)) {
                if (state.filters[id].hasOwnProperty('loaded')) {
                    return state.filters[id].loaded
                }
                return false
            }
            // field is loaded by default
            return true
        } else {
            return true
        }
        */
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

export default new Vuex.Store({
    strict: true,
    namespaced: true,
    modules,
    state,
    getters,
    mutations,
    actions
})