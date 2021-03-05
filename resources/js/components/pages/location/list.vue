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
        name: 'LocationList',
        components: {
            ListTemplate
        },
        data() {
            return {

                storeName: 'locations',

                // filters settings
                filtersData: [
                    {
                        lg: 12,
                        header: 'List Filters'
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'locations', dataKey: 'location', label: 'Locations', type: 'select' }
                        ]
                    },
                    {
                        lg: 4,
                        fields: [
                            { id: 'shores', dataKey: 'shore', label: 'Shore', type: 'select' }
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
                            { id: 'locationAmount', dataType: 'locations', label: 'Location Requests', value: '0', type: 'input' }
                        ]
                    }
                ],

                dataTables: [
                    {
                        id: 'locations',
                        title: 'Locations List',
                        label: 'Locations',
                        helperText: 'List below provides a possibility to approve or reject selected items'
                    }
                ],

                pageHeader: 'Locations List'
            }
        }
    }
</script>