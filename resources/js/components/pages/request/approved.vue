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
        name: 'requestList',
        components: {
            ListTemplate
        },
        data() {
            return {

                storeName: 'requests',

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
                            { id: 'applyFilters', label: 'Apply filters', kind: 'primary', type: 'button' },
                            { id: 'resetFilters', label: 'Reset filters', kind: 'secondary', type: 'button' }
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
                        id: 'approved',
                        title: 'Approved Overtime Requests List',
                        label: 'Approved',
                        helperText: 'List below provides a possibility to approve or reject selected items',
                        expandedContent: "A variety of content types can live here. Be sure to follow Carbon design guidelines for spacing and alignment."
                    }
                ],

                pageHeader: 'Approved Request List'
            }
        }
    }
</script>