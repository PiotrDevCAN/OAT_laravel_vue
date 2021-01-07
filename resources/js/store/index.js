import Vue from "vue";
import Vuex from "vuex";
 
Vue.use(Vuex);

// import modules
import requests from './requests';
import accounts from './accounts';
import competencies from './competencies';
import delegates from './delegates';
import logs from './logs';

export default new Vuex.Store({
    strict: true,
    modules: {
        accounts,
        competencies,
        delegates,
        logs,
        requests
    },
    state: {
        user: {
            username: 'matt',
            fullName: 'Matt Maribojoc'
        },
        data: []
    },
    /*
    init() {
        const baseURI = 'http://localhost/OAT_laravel_vue/api/request/list';
        this.$http
            .get(baseURI)
            .then((response) => {
                // additional data key in data
                this.data = response.data.data;
            });
    },
    */
    getters: {
        firstName: state => {
            return state.user.fullName.split(' ')[0]
        },
        lastName (state, getters) {
            return state.user.fullName.replace(getters.firstName, '');
        },
        prefixedName: (state, getters) => (prefix) => {
            return prefix + getters.lastName;
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
                context.commit("changeName", payload);
            }, 2000);
        }
    }
});