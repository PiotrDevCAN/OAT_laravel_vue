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
        name: 'DelegateList',
        components: {
            ListTemplate
        },
        data() {
            return {

                storeName: 'delegates',

                // filters settings
                filtersData: [
                    {
                        lg: 12,
                        header: 'List Filters'
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'userIntranets', dataKey: 'user_intranet', label: 'User Intranet', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'delegateIntranets', dataKey: 'delegate_intranet', label: 'Delegate Intranet', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'delegateNotesIds', dataKey: 'delegate_notesid', label: 'Delegate Notes Id', type: 'select' }
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
                            { id: 'delegateAmount', dataType: 'delegates', label: 'Delegate Requests', value: '0', type: 'input' }
                        ]
                    }
                ],

                dataTables: [
                    {
                        id: 'delegates',
                        title: 'Delegates List',
                        label: 'Delegates',
                        helperText: 'List below provides a possibility to approve or reject selected items'
                    }
                ],

                pageHeader: 'Request List'
            }
        }
    }
</script>