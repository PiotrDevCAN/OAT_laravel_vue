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
        name: 'LogList',
        components: {
            ListTemplate
        },
        data() {
            return {

                storeName: 'logs',

                // filters settings
                filtersData: [
                    {
                        lg: 12,
                        header: 'List Filters'
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'logEntries', dataKey: 'log_entry', label: 'Log Entry', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'lastUpdates', dataKey: 'last_updated', label: 'Last Updated', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'lastUpdaters', dataKey: 'last_updater', label: 'Last Updater', type: 'select' }
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
                            { id: 'logAmount', dataType: 'logs', label: 'Log Requests', value: '0', type: 'input' }
                        ]
                    }
                ],

                dataTables: [
                    {
                        id: 'logs',
                        title: 'Logs List',
                        label: 'Logs',
                        helperText: 'List below provides a possibility to approve or reject selected items'
                    }
                ],

                pageHeader: 'Request List'
            }
        }
    }
</script>