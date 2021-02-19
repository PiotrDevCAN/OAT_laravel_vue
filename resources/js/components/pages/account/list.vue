<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <cv-grid>

        <list-template
            :store-name="storeName"
            :filters-data="filtersData"
            :action-buttons-data="actionButtonsData"
            :summary-data="summaryData"
            :data-tables="dataTables"
            :page-header="pageHeader"
            >
        </list-template>

    </cv-grid>
</template>

<script>

    import ListTemplate from '../../elements/ListTemplate.vue'

    export default {
        name: 'accountList',
        components: {
            ListTemplate
        },
        data() {
            return {

                storeName: 'accounts',

                // filters settings
                filtersDefaultValue: 'Choose an option',
                filtersData: [
                    {
                        lg: 12,
                        header: 'List Filters'
                    },
                    {
                        lg: 3,
                        fields: [
                            { id: 'accounts', dataKey: 'account', label: 'Account', type: 'select' }
                        ]
                    },
                    {
                        lg: 3,
                        fields: [
                            { id: 'approvers', dataKey: 'approver', label: 'Approver', type: 'select' }
                        ]
                    },
                    {
                        lg: 3,
                        fields: [
                            { id: 'verifieds', dataKey: 'verified', label: 'Verified', type: 'select' }
                        ]
                    },
                    {
                        lg: 3,
                        fields: [
                            { id: 'locations', dataKey: 'location', label: 'Location', type: 'select' }
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
                            { id: 'applyFilters', label: 'Apply filters', kind: 'primary', type: 'button' },
                            { id: 'resetFilters', label: 'Reset filters', kind: 'secondary', type: 'button' }
                        ]
                    }
                ],

                summaryDefaultValue: 10,
                summaryData: [
                    {
                        lg: 12,
                        header: 'Summary'
                    },
                    {
                        lg: 6,
                        type: 'amount',
                        fields: [
                            { id: 'accountAmount', type: 'account', label: 'Account Requests', value: '0', type: 'input' }
                        ]
                    }
                ],

                dataTables: [
                    {
                        id: 'account',
                        title: 'Accounts List',
                        label: 'Accounts',
                        helperText: 'List below provides a possibility to approve or reject selected items'
                    }
                ],

                pageHeader: 'Accounts List'
            }
        }
    }
</script>