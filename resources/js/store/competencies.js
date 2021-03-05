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
    apiModuleName: 'competency',
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
    SET_FORM: set('form'),
    SET_FILTERS: set('filters'),
    SET_TABLES: set('tables')
}

const actions = {

}

const getters = {

}

export default {
    name: 'competencies',
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}