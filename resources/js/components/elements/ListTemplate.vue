<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <!-- store.dispatch - calls an action -->
    <!-- store.commit - calls a mutation in action -->

    <cv-grid>

        <inline-notifications></inline-notifications>

        <list-with-filters
            :store-name="storeName"
            :filters="filtersData"
            :check-is-loaded="getFilterMapStateById"
            :options-data="getFilterMapDataById">
        </list-with-filters>
        
        <action-buttons
            :store-name="storeName"
            :buttons="actionButtonsData"
            v-on:button-click="handlaActionButtonClick">
        </action-buttons>
        
        <summary-box
            :store-name="storeName"
            :summary="summaryData"
            :check-is-loaded="getLoadedMapByType"
            :get-records-count="getRecordsCountByType"
            :get-hours-count="getHoursCountByType">
        </summary-box>
        
        <list-content
            :store-name="storeName"
            :tables="dataTables"
            :columns-data="getColumnsMapByType"
            :table-data="getRecordsMapByType"
            :load-table-data="getTableData"
            :owner-data="getOwnerId"
            :check-is-loading="getLoadingMapByType"
            :check-is-loaded="getLoadedMapByType">
        </list-content>
        
    </cv-grid>
</template>

<script>

    // import { mapState } from 'vuex'
    // import { mapMutations } from 'vuex'
    import { mapActions } from 'vuex'
    // import { mapGetters } from 'vuex'

    import { createNamespacedHelpers } from 'vuex'
    const { mapGetters } = createNamespacedHelpers('common')

    import InlineNotifications from './InlineNotifications.vue'

    import ListWithFilters from './ListWithFilters.vue'
    import ActionButtons from './ActionButtons.vue'
    import SummaryBox from './SummaryBox.vue'
    import ListContent from './ListContent.vue'
    
    export default {
        name: 'ListTemplate',
        components: {
            InlineNotifications,
            ListWithFilters,
            ActionButtons,
            SummaryBox,
            ListContent
        },
        props: {
            storeName: String,  // for eg. accounts
            filtersData: Array,
            actionButtonsData: Array,
            summaryData: Array,
            dataTables: Array,
            pageHeader: String,
        },
        data() {
            return {

            }
        },
        /*
        watch: {

            // whenever question changes, this function will run
            // question: function (newQuestion, oldQuestion) {
            //     this.answer = 'Waiting for you to stop typing...'
            //     this.debouncedGetAnswer()
            // },
        },
        */
        // computed variables are cached !!!
        computed: {
            
            // ...mapState(
            //     {
            //         loadingFilters: state => state.requests.loadingFilters
            //     }
            // ),

            /*
            // without aliases
            ...mapGetters([
                'firstName',
                'lastName',
            ]),
            */

            // with aliases
            // ...mapGetters('common', {
            //     getFilterMapDataById: 'getFilterDataById',
            //     getFilterMapStateById: 'getFilterLoadedStateById',
            //     getFilterMapSelectedById: 'getFilterSelectedValueById',

            //     getColumnsMapByType: 'getColumnsByType',
            //     getRecordsMapByType: 'getRecordsByType',
            //     getLoadingMapByType: 'getLoadingByType',
            //     getLoadedMapByType: 'getLoadedByType',

            //     getRecordsCountByType: 'getRecordsCountByType',
            //     getHoursCountByType: 'getRecordsHoursCountByType'
            // }),

            // store getters in common.js
            ...mapGetters({
                getFilterMapDataById: 'getFilterDataById',
                getFilterMapStateById: 'getFilterLoadedStateById',
                getFilterMapSelectedById: 'getFilterSelectedValueById',

                getColumnsMapByType: 'getColumnsByType',
                getRecordsMapByType: 'getRecordsByType',
                getMetaMapByType: 'getMetaByType',
                getLoadingMapByType: 'getLoadingByType',
                getLoadedMapByType: 'getLoadedByType',

                getRecordsCountByType: 'getRecordsCountByType',
                getHoursCountByType: 'getRecordsHoursCountByType'
            }),
            
            // map action to specified module
            // getFilterMapDataById () {
            //     return this.$store.getters[this.storeName+'/getFilterDataById']
            // },
            // getFilterMapStateById () {
            //     return this.$store.getters[this.storeName+'/getFilterLoadedStateById']
            // },
            // getFilterMapSelectedById () {
            //     return this.$store.getters[this.storeName+'/getFilterSelectedValueById']
            // },
            // getColumnsMapByType () {
            //     return this.$store.getters[this.storeName+'/getColumnsByType']
            // },
            // getRecordsMapByType () {
            //     return this.$store.getters[this.storeName+'/getRecordsByType']
            // },
            // getLoadingMapByType () {
            //     return this.$store.getters[this.storeName+'/getLoadingByType']
            // },
            // getLoadedMapByType () {
            //     return this.$store.getters[this.storeName+'/getLoadedByType']
            // },
            // getRecordsCountByType () {
            //     return this.$store.getters[this.storeName+'/getRecordsCountByType']
            // },
            // getHoursCountByType () {
            //     return this.$store.getters[this.storeName+'/getRecordsHoursCountByType']
            // },

            // computed properties not functions
            // getFiltersData () {
            //     console.log('computed getFiltersData')
            //     this.$store.dispatch(this.storeName+'/fetchFiltersData')
            //     // return this.$store.getters[this.storeName+'/fetchFiltersData']
            // },
            // getTableData () {
            //     console.log('computed getTableData')
            //     this.$store.dispatch(this.storeName+'/fetchTableData')
            //     // return this.$store.getters[this.storeName+'/fetchTableData']
            // }
        },
        beforCreate() {
            // console.log('List Component before create.')
        },
        created() {

            // console.log(this.$store)

            // this.$store.dispatch('callModuleActionFromRoot')

            // this.$store.dispatch('callModuleActionFromRoot', null, { root: true })

            // this.$store.dispatch('requests/actionWithTheSameName')

            // this.$store.dispatch('actionWithTheSameName', null, { root: true })

            // this.$store.dispatch('actionWithTheSameName')

            // this.$store.dispatch('callModuleAction')

            // dispatch with a payload
            /*
            this.$store.dispatch('incrementAsync', {
                amount: 10
            })
            */

            // dispatch with an object
            /*
            this.$store.dispatch({
                type: 'incrementAsync',
                amount: 10
            })
            */
            
            // fetch fiters
            this.getFiltersData(this.storeName).then(() => {
            
            })
            // dispatch action
            // this.$store.dispatch(this.storeName+'/fetchFiltersData').then(() => {
            //     // this.loading = false 
            // })

            // fetch tables
            this.getTableData(this.storeName).then(() => {

            })
            // dispatch action
            // this.$store.dispatch(this.storeName+'/fetchTableData').then(() => {
            //     // this.loading = false 
            // })
        },
        // async beforeMount() {
        //     // console.log('List Component before mount.')
        
            // await this.$store.dispatch(this.storeName+'/fetchFiltersDataExample')
            // await this.$store.dispatch(this.storeName+'/fetchFiltersDataExample')
            // await this.$store.dispatch(this.storeName+'/fetchFiltersDataExample')

        // },
        mounted() {
            // console.log('List Component mounted.')
        },
        beforeUpdate() {
            // console.log('List Component before update.')
        }, 
        updated() {
            // console.log('List Component updated.')
        },
        beforeDestroy() {
            // console.log('List Component before destroy.')
        }, 
        destroyed() {
            // console.log('List Component destroyed.')
        },
        methods: {

            handlaActionButtonClick(data) {
                console.log(data.target.id)
            },

            // walkaround replaced by getters map
            /*
            getObjectPropertyByName (property) {
                if (this[property] !== undefined ) {              
                    return this[property]
                }
                return
            },
            */

            // walkaround replaced by getters map
            /*
            getObjectDataPropertyByName: function (property) {
                if (this.$data.hasOwnProperty(property)) {
                    return this.$data[property]
                }
                return
            },
            */

            /*
            ...mapActions([
                'increment', // map `this.increment()` to `this.$store.dispatch('increment')`

                // `mapActions` also supports payloads:
                'incrementBy' // map `this.incrementBy(amount)` to `this.$store.dispatch('incrementBy', amount)`
            ]),
            */

            ...mapActions({
                // add: 'increment' // map `this.add()` to `this.$store.dispatch('increment')`
                // getFiltersData: 'fetchFiltersData',
                // getTableData: 'fetchTableData'
                // getFiltersData: 'accounts/fetchFiltersData',
                // getTableData: 'accounts/fetchTableData'
                getFiltersData: 'fetchFiltersData',
                getTableData: 'fetchTableData'
            }),

            // methods
            // getFiltersData () {
            //     console.log('methods getFiltersData')
            //     return this.$store.getters[this.storeName+'/fetchFiltersData']
            //     return this.$store.getters['fetchFiltersData']
            // },
            // getTableData () {
            //     console.log('methods getTableData')
            //     return this.$store.getters[this.storeName+'/fetchTableData']
            //     // return this.$store.getters['fetchTableData']
            // },

            /*
            ...mapMutations([
                'search', // map `this.increment()` to `this.$store.commit('search')`

                // `mapMutations` also supports payloads:
                'searchBy' // map `this.incrementBy(amount)` to `this.$store.commit('searchBy', amount)`
                ]),
                ...mapMutations({
                find: 'search' // map `this.add()` to `this.$store.commit('search')`
            })
            */

            // An arrow function without this 
            getOwnerId: type => {
                return 'csb-'+type
            }
        }
    }
</script>