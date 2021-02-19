<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <!-- store.dispatch - calls an action -->
    <!-- store.commit - calls a mutation in action -->

    <cv-grid>
        
        <list-with-filters 
            :filters="filtersData"
            :check-is-loaded="getFilterMapStateById"
            :options-data="getFilterMapDataById">
        </list-with-filters>
        
        <action-buttons 
            :buttons="actionButtonsData"
            v-on:button-click="handlaActionButtonClick">
        </action-buttons>
        
        <summary-box
            :summary="summaryData"
            :check-is-loaded="getLoadedMapByType"
            :get-records-count="getRecordsCountByType"
            :get-hours-count="getHoursCountByType"
            >
        </summary-box>
        
        <list-content
            :tables="dataTables"
            :columns-data="getColumnsMapByType"
            :table-data="getRecordsMapByType"
            :load-table-data="getTableData"
            :owner-data="getOwnerId"
            :check-is-loading="getLoadingMapByType"
            :check-is-loaded="getLoadedMapByType"
            >
        </list-content>
        
    </cv-grid>
</template>

<script>

    // import { mapState } from 'vuex'
    // import { mapMutations } from 'vuex'
    import { mapActions } from 'vuex'
    // import { mapGetters } from 'vuex'

    import ListWithFilters from './ListWithFilters.vue'
    import ActionButtons from './ActionButtons.vue'
    import SummaryBox from './SummaryBox.vue'
    import ListContent from './ListContent.vue'

    export default {
        name: 'requestList',
        components: {
            ListWithFilters,
            ActionButtons,
            SummaryBox,
            ListContent
        },
        props: {
            storeName: String,
            filtersData: Array,
            actionButtonsData: Array,
            summaryData: Array,
            dataTables: Array,
            pageHeader: String
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
            /*
            ...mapState(
                {
                    // loadingFilters: state => state.requests.loadingFilters
                }
            ),
            */

            /*
            // without aliases
            ...mapGetters([
                'firstName',
                'lastName',
            ]),
            */

            // with aliases
            /*
            ...mapGetters({

                getFilterMapDataById: 'requests/getFilterDataById',
                getFilterMapStateById: 'requests/getFilterLoadedStateById',
                getFilterMapSelectedById: 'requests/getFilterSelectedValueById',

                getColumnsMapByType: 'requests/getColumnsByType',
                getRecordsMapByType: 'requests/getRecordsByType',
                getLoadingMapByType: 'requests/getLoadingByType',
                getLoadedMapByType: 'requests/getLoadedByType',

                getRecordsCountByType: 'requests/getRecordsCountByType',
                getHoursCountByType: 'requests/getRecordsHoursCountByType'
            }),
            */

            // map action to specified module
            getFilterMapDataById () {
                return this.$store.getters[this.storeName+'/getFilterDataById']
            },
            getFilterMapStateById () {
                return this.$store.getters[this.storeName+'/getFilterLoadedStateById']
            },
            getFilterMapSelectedById () {
                return this.$store.getters[this.storeName+'/getFilterSelectedValueById']
            },
            getColumnsMapByType () {
                return this.$store.getters[this.storeName+'/getColumnsByType']
            },
            getRecordsMapByType () {
                return this.$store.getters[this.storeName+'/getRecordsByType']
            },
            getLoadingMapByType () {
                return this.$store.getters[this.storeName+'/getLoadingByType']
            },
            getLoadedMapByType () {
                return this.$store.getters[this.storeName+'/getLoadedByType']
            },
            getRecordsCountByType () {
                return this.$store.getters[this.storeName+'/getRecordsCountByType']
            },
            getHoursCountByType () {
                return this.$store.getters[this.storeName+'/getRecordsHoursCountByType']
            }
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
            // this.getFiltersData().then(() => {
            
            // })

            // // fetch tables
            // this.getTableData().then(() => {

            // })

            this.$store.dispatch(this.storeName+'/fetchFiltersData').then(() => {
                // this.loading = false 
            })

            this.$store.dispatch(this.storeName+'/fetchTableData').then(() => {
                // this.loading = false 
            })

        },
        beforeMount() {
            // console.log('List Component before mount.')
        },
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
                // getFiltersData: 'accounts/fetchFiltersData',
                // getTableData: 'accounts/fetchTableData'
            }),


            getFiltersData () {
                return this.$store.getters[this.storeName+'/fetchFiltersData']
            },
            getTableData () {
                return this.$store.getters[this.storeName+'/fetchTableData']                
            },

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