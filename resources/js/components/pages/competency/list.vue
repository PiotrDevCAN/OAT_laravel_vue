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
        name: 'CompetencyList',
        components: {
            ListTemplate
        },
        data() {
            return {

                storeName: 'competencies',

                // filters settings
                filtersData: [
                    {
                        lg: 12,
                        header: 'List Filters'
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'competencies', dataKey: 'competency', label: 'Service Lines', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'approvers', dataKey: 'approver', label: 'Approvers', type: 'select' }
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
                            { id: 'competencyAmount', dataType: 'competencies', label: 'Competency Requests', value: '0', type: 'input' }
                        ]
                    }
                ],

                dataTables: [
                    {
                        id: 'competencies',
                        title: 'Service Lines List',
                        label: 'Service Lines',
                        helperText: 'List below provides a possibility to approve or reject selected items'
                    }
                ],

                pageHeader: 'Request List'
            }
        }
    }
</script>