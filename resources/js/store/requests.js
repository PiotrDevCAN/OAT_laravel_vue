export default {
    state: {

        // filters data
        accounts: [],
        reasons: [],
        names: [],
        types: [],

        competencies: [],
        statuses: [],
        requestors: [],
        locations: [],

        weekendStart: [],
        weekendEnd: [],
        imports: [],

        firstApprovers: [],
        secondApprovers: [],
        thirdApprovers: [],

        approvalModes: [],
        squadLeaders: [],
        tribeLeaders: [],

        // list data
        awaiting: [],
        apporved: [],
        other: []
    },

    getters: {
        getCustomerById: state => id => {
            return state.customers.find(customer => customer.id === id)
        },
    },

    actions: {

        fetchFiltesData({ commit }) {
            const baseURI = 'http://localhost/OAT_laravel_vue/api/request/filters';
            return axios.get(baseURI)
                .then(response => {

                    var data = response.data;

                    commit('setAccounts', data.accounts);
                    commit('setReasons', data.reasons);
                    commit('setNames', data.names);
                    commit('setTypes', data.types);

                    commit('setCompetecies', data.competencies);
                    commit('setStatuses', data.statuses);
                    commit('setRequestors', data.requestors);
                    commit('setLocations', data.locations);

                    commit('setWeekendStart', data.weekendStart);
                    commit('setWeekendEnd', data.weekendEnd);
                    commit('setImports', data.imports);

                    commit('setFirstApprovers', data.firstApprovers);
                    commit('setSecondApprovers', data.secondApprovers);
                    commit('setThirdApprovers', data.thirdApprovers);

                    commit('setApprovalModes', data.approvalModes);
                    commit('setSquadLeaders', data.squadLeaders);
                    commit('setTribeLeaders', data.tribeLeaders);
                });
        },

        fetchAwaitingRequests({ commit }) {
            const baseURI = 'http://localhost/OAT_laravel_vue/api/request/list';
            return axios.get(baseURI)
                .then(response => {
                    commit('setAwaiting', response.data.data);
                });
        },
        fetchApprovedRequests({ commit }) {
            const baseURI = 'http://localhost/OAT_laravel_vue/api/request/list';
            return axios.get(baseURI)
                .then(response => {
                    commit('setApporved', response.data.data);
                });
        },
        fetchOtherRequests({ commit }) {
            const baseURI = 'http://localhost/OAT_laravel_vue/api/request/list';
            return axios.get(baseURI)
                .then(response => {
                    commit('setOther', response.data.data);
                });
        },
    },

    mutations: {

        setAccounts(state, records) {
            state.accounts = records;
        },
        setReasons(state, records) {
            state.reasons = records;
        },
        setNames(state, records) {
            state.names = records;
        },
        setTypes(state, records) {
            state.types = records;
        },

        setCompetecies(state, records) {
            state.competencies = records;
        },
        setStatuses(state, records) {
            state.statuses = records;
        },
        setRequestors(state, records) {
            state.requestors = records;
        },
        setLocations(state, records) {
            state.locations = records;
        },

        setWeekendStart(state, records) {
            state.weekendStart = records;
        },
        setWeekendEnd(state, records) {
            state.weekendEnd = records;
        },
        setImports(state, records) {
            state.imports = records;
        },

        setFirstApprovers(state, records) {
            state.firstApprovers = records;
        },
        setSecondApprovers(state, records) {
            state.secondApprovers = records;
        },
        setThirdApprovers(state, records) {
            state.thirdApprovers = records;
        },

        setApprovalModes(state, records) {
            state.approvalModes = records;
        },
        setSquadLeaders(state, records) {
            state.squadLeaders = records;
        },
        setTribeLeaders(state, records) {
            state.tribeLeaders = records;
        },

        setAwaiting(state, records) {
            state.awaiting = records;
        },
        setApporved(state, records) {
            state.apporved = records;
        },
        setOther(state, records) {
            state.other = records;
        },
    }
}