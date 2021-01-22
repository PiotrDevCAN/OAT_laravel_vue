import Vue from "vue";
import Vuex from "vuex";
 
Vue.use(Vuex);

// import modules
import accounts from './accounts';
import competencies from './competencies';
import delegates from './delegates';
import locations from './locations';
import logs from './logs';
import requests from './requests';

export default new Vuex.Store({
    strict: true,
    modules: {
        accounts,
        competencies,
        delegates,
        locations,
        logs,
        requests
    },
    state: {
        baseUrl: window.appUrl,
        // baseUrl: 'https://soiwapi-new.icds.ibm.com/OAT_laravel_vue', 
        user: {
            username: 'matt',
            fullName: 'Matt Maribojoc'
        },
        data: []
    },
    getters: {
        firstName: state => {
            return state.user.fullName.split(' ')[0]
        },
        lastName (state, getters) {
            return state.user.fullName.replace(getters.firstName, '')
        },
        prefixedName: (state, getters) => (prefix) => {
            return prefix + getters.lastName
        }
    },
    mutations: {
        changeNameByValue (state, payload) {
            state.user.fullName = payload
        },
        changeName (state, payload) {
            state.user.fullName = payload.newName
        }
    },
    actions: {
        changeName (context, payload) {
            setTimeout(() => {
                context.commit("changeName", payload)
            }, 2000)
        },
        exampleAction ({ state, commit, rootState }, data) {
            // trimmed object
            console.log('state')
            console.log(state)

            // trimmed object
            console.log('commit')
            console.log(commit)

            // trimmed object
            console.log('rootState')
            console.log(rootState)
        },
        exampleActionWithContext(context, data) {
            // main vuex object
            console.log('this in exampleActionWithContext')
            console.log(this)

            // trimmed object
            console.log('context')
            console.log(context)
        }
    }
});