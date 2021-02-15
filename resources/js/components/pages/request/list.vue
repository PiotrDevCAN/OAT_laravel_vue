<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <cv-grid>

        <list-with-filters 
            :filters="filtersData"
            :check-is-loaded="getFilterMapStateById"
            :options-data="getFilterMapDataById">
            </list-with-filters>
        
        <action-buttons 
            :buttons="actionButtonsData">
            </action-buttons>
            
        <summary 
            :summary="summaryData">
            </summary>
        
        <list-content 
            :tables="dataTables"
            :columns-data="getColumnsMapByType"
            :table-data="getRecordsMapByType"
            :loadTableData="getTableData"
            :owner-data="getOwnerId"
            :check-is-loading="getLoadingMapByType"
            :check-is-loaded="getLoadedMapByType"
            >
            </list-content>
        
    </cv-grid>
</template>

<script>

    import store from '../../../store/'

    import { mapState } from 'vuex'
    import { mapMutations } from 'vuex'
    import { mapActions } from 'vuex'
    import { mapGetters } from 'vuex'

    import ListWithFilters from '../../elements/ListWithFilters.vue'
    import ActionButtons from '../../elements/ActionButtons.vue'
    import Summary from '../../elements/Summary.vue'
    import ListContent from '../../elements/ListContent.vue'

    export default {
        name: 'requestList',
        components: {
            ListWithFilters,
            ActionButtons,
            Summary,
            ListContent
        },
        props: {

        },
        data() {
            return {

                // filters settings
                filtersData: [
                    {
                        lg: 12,
                        header: 'List Filters'
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'accounts', dataKey: 'account', label: 'Accounts', type: 'select' },
                            { id: 'reasons', dataKey: 'nature', label: 'Reason', type: 'select' },
                            { id: 'names', dataKey: 'worker', label: 'Name', type: 'select' },
                            { id: 'types', dataKey: 'approvaltype', label: 'Type', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'competencies', dataKey: 'competency', label: 'Service Line', type: 'select' },
                            { id: 'statuses', dataKey: 'status', label: 'Status', type: 'select' },
                            { id: 'requestors', dataKey: 'requestor', label: 'Requestor', type: 'select' },
                            { id: 'locations', dataKey: 'location', label: 'Location', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'weekendStart', dataKey: 'weekendstart', label: 'Weekend Start', type: 'select' },
                            { id: 'weekendEnd', dataKey: 'weekendend', label: 'Weekend End', type: 'select' },
                            { id: 'imports', dataKey: 'import', label: 'Import', type: 'select' }
                        ]
                    },
                    {
                        lg: 12,
                        header: 'Approvers'
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'firstApprovers', dataKey: 'approver_first_level', label: '1st Level Approver', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'secondApprovers', dataKey: 'approver_second_level', label: '2nd Level Approver', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'thirdApprovers', dataKey: 'approver_third_level', label: '3rd Level Approver', type: 'select' }
                        ]
                    },
                    {
                        lg: 12,
                        header: 'Approval Flow'
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'approvalModes', dataKey: 'approval_mode', label: 'Approval Mode', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'squadLeaders', dataKey: 'approver_squad_leader', label: 'Squad Leader', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'tribeLeaders', dataKey: 'approver_tribe_leader', label: 'Tribe Leader', type: 'select' }
                        ]
                    }
                ],

                actionButtonsData: [
                    {
                        lg: 12,
                        header: 'Action Buttons'
                    },
                    {
                        lg: 12,
                        fields: [
                            { id: 'applyFilters', label: 'Apply filters', kind: 'primary', action: this.submitForm, type: 'button' },
                            { id: 'resetFilters', label: 'Reset filters', kind: 'secondary', action: this.resetForm, type: 'button' }
                        ]
                    }
                ],

                summaryData: [
                    {
                        lg: 12,
                        header: 'Summary'
                    },
                    {
                        lg: 6,
                        type: 'amount',
                        fields: [
                            { id: 'awaitingAmount', dataType: 'awaiting', label: 'Awaiting Approval Requests', value: '0', type: 'input' },
                            { id: 'approvedAmount', dataType: 'approved', label: 'Approved Requests', value: '0', type: 'input' },
                            { id: 'otherAmount', dataType: 'other', label: 'Other Requests', value: '0', type: 'input' }
                        ]
                    },
                    {
                        lg: 6,
                        type: 'hours',
                        fields: [
                            { id: 'awaitingHours', dataType: 'awaiting', label: 'Awaiting Approval Hours', value: '0', type: 'input' },
                            { id: 'approvedHours', dataType: 'approved', label: 'Approved Hours', value: '0', type: 'input' },
                            { id: 'otherHours', dataType: 'other', label: 'Other Hours', value: '0', type: 'input' }
                        ]
                    }
                ],

                dataTables: [
                    {
                        id: 'awaiting',
                        title: 'Awaiting Overtime Requests List',
                        label: 'Awaiting Approval',
                        helperText: 'List below provides a possibility to approve or reject selected items'
                    },
                    {
                        id: 'approved',
                        title: 'Approved Overtime Requests List',
                        label: 'Approved',
                        helperText: 'List below provides a possibility to approve or reject selected items'
                    },
                    {
                        id: 'other',
                        title: 'Other Overtime Requests List',
                        label: 'Other',
                        helperText: 'List below provides a possibility to approve or reject selected items'
                    }
                ],

                pageHeader: 'Request List',
                size: 'xl'
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

            // accountsLength() {
            //     return this.getFilterMapDataById('accounts').length
            // },

            ...mapState(
                {
                    // loadingFilters: state => state.requests.loadingFilters
                }
            ),

            /*
            // without aliases
            ...mapGetters([
                'firstName',
                'lastName',
            ]),
            */

            // with aliases
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
            })
        },
        beforCreate() {
            // console.log('List Component before create.')
        },
        created() {
            // console.log('List Component created.')

            // dispatch with a payload
            /*
            store.dispatch('incrementAsync', {
                amount: 10
            })
            */

            // dispatch with an object
            /*
            store.dispatch({
                type: 'incrementAsync',
                amount: 10
            })
            */

            // fetch fiters
            this.getFiltersData().then(() => {
            
            })

            // store.dispatch('fetchFiltersData').then(() => {
            //     this.loading = false 
            // })

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

            handleFieldCreate(data) {
                console.log('Child field has been created - LIST.');
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
                getFiltersData: 'requests/fetchFiltersData',
                getTableData: 'requests/fetchTableData'
            }),

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
            },

            updateLists() {
                alert('we need to update lists content')
            },

            submitForm() {
                alert('apply filters and refresh lists')
            },
            resetForm() {
                alert('reset filters and refresh lists')
            }
        }
    }
</script>