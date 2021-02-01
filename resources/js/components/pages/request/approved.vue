<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <cv-grid>
        <cv-row class="bx--row-padding">
            <cv-column v-bind:key="index" v-for="(row, index) in filters" :lg="row.lg">
                <h3 v-if="row.header">{{ row.header }}</h3>
                <div v-bind:key="selectsIndex" v-for="(select, selectsIndex) in row.selects" >
                    <cv-select v-if="getFilterMapStateById(select.id)" v-model="select.selected" v-on:change="updateLists" :label="select.label">
                        <cv-select-option disabled selected hidden>{{ filtersDefaultValue }}</cv-select-option>
                        <cv-select-option v-bind:key="optionIndex" v-for="(option, name, optionIndex ) in getFilterMapDataById(select.id)" :value="option[select.dataKey]">{{ option[select.dataKey] }}</cv-select-option>
                    </cv-select>
                    <div v-else>
                        <label class="bx--label">{{ select.label }}</label>
                        <cv-skeleton-text></cv-skeleton-text>
                    </div>
                </div>
            </cv-column>
        </cv-row>

        <cv-row class="bx--row-padding">
            <cv-column v-bind:key="index" v-for="(row, index) in actionButtons" :lg="row.lg">
                <h3 v-if="row.header">{{ row.header }}</h3>
                <cv-button-set v-else>
                    <cv-button v-bind:key="buttonIndex" v-for="(button, buttonIndex) in row.buttons" :kind="button.kind" v-on:click="button.action">{{ button.label }}</cv-button>
                </cv-button-set>
            </cv-column>
        </cv-row>

        <cv-row class="bx--row-padding">
            <cv-column v-bind:key="index" v-for="(row, index) in summary" :lg="row.lg">
                <h3 v-if="row.header">{{ row.header }}</h3>
                <div v-bind:key="inputsIndex" v-for="(input, inputsIndex) in row.inputs" >
                    <div v-if="getLoadedMapByType(input.type)">
                        <cv-text-input v-if="row.type === 'amount'" :value="getRecordsCountByType(input.type)" :label="input.label"></cv-text-input>
                        <cv-text-input v-else-if="row.type === 'hours'" :value="getHoursCountByType(input.type)" :label="input.label"></cv-text-input>
                    </div>
                    <div v-else>
                        <label class="bx--label">{{ input.label }}</label>
                        <cv-skeleton-text></cv-skeleton-text>
                    </div>
                </div>
            </cv-column>
        </cv-row>

        <cv-row class="bx--row-padding">
            <cv-column :lg="12">
                <br/>
                <cv-content-switcher v-on:selected="actionSelected" :light="true" :size="size">
                    <cv-content-switcher-button :owner-id="getOwnerId(table.id)" :selected="isSelected(table.id)" v-bind:key="index" v-for="(table, index) in dataTables">{{ table.label }}</cv-content-switcher-button>
                </cv-content-switcher>
                <section style="margin: 10px 0;">
                    <cv-content-switcher-content :owner-id="getOwnerId(table.id)" v-bind:key="index" v-for="(table, index) in dataTables" >
                        <data-table :columns="getColumnsMapByType(table.id)" :type="table.id" :data-table-data="getRecordsMapByType(table.id)" :title="table.title" :helper-text="table.helperText" :loading="getLoadingMapByType(table.id)" :loaded="getLoadedMapByType(table.id)"/>
                    </cv-content-switcher-content>                    
                </section>
            </cv-column>
        </cv-row>
    </cv-grid>
</template>

<script>
    import store from '../../../store/'

    import { mapState } from 'vuex'
    import { mapMutations } from 'vuex'
    import { mapActions } from 'vuex'
    import { mapGetters } from 'vuex'

    import DataTable from '../../elements/DataTable'

    export default {
        name: 'requestList',
        components: {
            DataTable
        },
        data() {
            return {

                // filters settings
                filtersDefaultValue: 'Choose an option',
                filters: [
                    {
                        lg: 12,
                        header: 'List Filters'
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'accounts', dataKey: 'account', label: 'Accounts' },
                            { id: 'reasons', dataKey: 'nature', label: 'Reason' },
                            { id: 'names', dataKey: 'worker', label: 'Name' },
                            { id: 'types', dataKey: 'approvaltype', label: 'Type' }
                        ]
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'competencies', dataKey: 'competency', label: 'Service Line' },
                            { id: 'statuses', dataKey: 'status', label: 'Status' },
                            { id: 'requestors', dataKey: 'requestor', label: 'Requestor' },
                            { id: 'locations', dataKey: 'location', label: 'Location' }
                        ]
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'weekendStart', dataKey: 'weekendstart', label: 'Weekend Start' },
                            { id: 'weekendEnd', dataKey: 'weekendend', label: 'Weekend End' },
                            { id: 'imports', dataKey: 'import', label: 'Import' }
                        ]
                    },
                    {
                        lg: 12,
                        header: 'Approvers'
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'firstApprovers', dataKey: 'approver_first_level', label: '1st Level Approver' }
                        ]
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'secondApprovers', dataKey: 'approver_second_level', label: '2nd Level Approver' }
                        ]
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'thirdApprovers', dataKey: 'approver_third_level', label: '3rd Level Approver' }
                        ]
                    },
                    {
                        lg: 12,
                        header: 'Approval Flow'
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'approvalModes', dataKey: 'approval_mode', label: 'Approval Mode' }
                        ]
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'squadLeaders', dataKey: 'approver_squad_leader', label: 'Squad Leader' }
                        ]
                    },
                    {
                        lg: 4,
                        selects: [
                            { id: 'tribeLeaders', dataKey: 'approver_tribe_leader', label: 'Tribe Leader' }
                        ]
                    }
                ],

                actionButtons: [
                    {
                        lg: 12,
                        header: 'Action Buttons'
                    },
                    {
                        lg: 12,
                        buttons: [
                            { id: 'applyFilters', label: 'Apply filters', kind: 'primary', action: this.submitForm },
                            { id: 'resetFilters', label: 'Reset filters', kind: 'secondary', action: this.resetForm }
                        ]
                    }
                ],

                summaryDefaultValue: 10,
                summary: [
                    {
                        lg: 12,
                        header: 'Summary'
                    },
                    {
                        lg: 6,
                        type: 'amount',
                        inputs: [
                            { id: 'approvedAmount', type: 'approved', label: 'Approved Requests', value: '0' }
                        ]
                    },
                    {
                        lg: 6,
                        type: 'hours',
                        inputs: [
                            { id: 'approvedHours', type: 'approved', label: 'Approved Hours', value: '0' }
                        ]
                    }
                ],

                dataTables: [
                    {
                        id: 'approved',
                        title: 'Approved Overtime Requests List',
                        label: 'Approved',
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
                this.summaryDefaultValue = 'aaa'
            },

            submitForm() {
                alert('apply filters and refresh lists')
            },
            resetForm() {
                alert('reset filters and refresh lists')
            },
            
            loadTable: function (type) {
                var loaded = this.getLoadedMapByType(type)
                if (loaded === false) {
                    this.getTableData(type).then(() => {

                    })
                }
            },

            // content switcher
            actionSelected: function (type) {
                switch(type) {
                    case 'csb-approved':
                        this.loadTable('approved')
                        return false
                    break
                    default:
                        return false
                }
            },
            
            isSelected: function (type) {
                switch(type) {
                    case 'approved':
                        this.loadTable('approved')
                        return true
                    break
                    default:
                        return false
                }
            }
        }
    }
</script>