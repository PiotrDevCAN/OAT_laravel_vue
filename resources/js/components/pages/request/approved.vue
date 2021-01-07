<template>
    <cv-grid>
        <cv-row>
            <cv-column :lg="12">
                <h3>List Filters</h3>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="4">
                <cv-select label="Account">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
                <cv-select label="Reason">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
                <cv-select label="Name">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
                <cv-select label="Type">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="Service Line">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
                <cv-select label="Status">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
                <cv-select label="Requestor">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
                <cv-select label="Location">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="Weekend >=">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
                <cv-select label="Weekend <=">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
                <cv-select label="Import">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="12">
                <h3>Approvers</h3>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="4">
                <cv-select label="1st Level Approver">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="2nd Level Approver">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="3rd Level Approver">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="12">
                <h3>Approval Flow</h3>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="4">
                <cv-select label="Approval Mode">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="Squad Leader">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="Tribe Leader">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                    <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                </cv-select>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="12">
                <cv-button-set>
                    <cv-button kind="primary" @click="submitForm">Apply filters</cv-button>
                    <cv-button kind="secondary" @click="resetForm">Reset filters</cv-button>
                </cv-button-set>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="12">
                <h3>Summary</h3>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="6">
                <cv-text-input label="Approved Requests" v-model="approvedAmount"> </cv-text-input>
            </cv-column>
            <cv-column :lg="6">
                <cv-text-input label="Approved Hours" v-model="approvedHours"> </cv-text-input>
            </cv-column>
        </cv-row>

        <cv-row>
            <cv-column :lg="12">
                <cv-data-table-skeleton
                    v-if="loading"
                    :columns="columns"
                    :title="title"
                    :helper-text="helperText"
                    :rows="10"
                />

                <cv-data-table                    
                    ref="table"
                    v-model="rowSelects" 
                    :row-size="rowSize"
                    :auto-width="autoWidth"
                    :sortable="sortable"
                    :title="title"
                    :action-bar-aria-label="actionBarAriaLabel"
                    :batch-cancel-label="batchCancelLabel"
                    :zebra="zebra"
                    :columns="columns"
                    :overflow-menu="sampleOverflowMenu"
                    :helper-text="helperText" 
                    :data="data" 
                    :pagination="{ numberOfItems: 23, pageSizes: [5, 10, 15, 20, 25]  }" 
                    @search="onFilter"                   
                    @pagination="actionOnPagination"                    
                    @row-select-change="actionRowSelectChange"
                    @sort="onSort"
                    @overflow-menu-click="onOverflowMenuClick"                     
                >
                    <template v-if="use_actions" slot="actions">
                        <cv-data-table-action @click="action1">
                            <svg fill-rule="evenodd" height="16" name="download" role="img" viewBox="0 0 14 16" width="14" aria-label="Download" alt="Download">
                                <title>Download</title>
                                <path d="M7.506 11.03l4.137-4.376.727.687-5.363 5.672-5.367-5.67.726-.687 4.14 4.374V0h1v11.03z"></path>
                                <path d="M13 15v-2h1v2a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-2h1v2h16z"></path>
                            </svg>
                        </cv-data-table-action>
                        <cv-data-table-action @click="action2">
                            <svg fill-rule="evenodd" height="16" name="edit" role="img" viewBox="0 0 16 16" width="16" aria-label="Edit" alt="Edit">
                                <title>Edit</title>
                                <path d="M7.926 3.38L1.002 9.72V16h2.304l6.926-6.316L7.926 3.38zm.738-.675l2.308 2.304 1.451-1.324-2.308-2.309-1.451 1.329zM.002 9.28L9.439.639a1 1 0 0 1 1.383.03l2.309 2.309a1 1 0 0 1-.034 1.446L3.694 13H.002V9.28zM0 16.013v-1h16v1z"></path>
                            </svg>
                        </cv-data-table-action>
                        <cv-data-table-action @click="action3">
                            <svg fill-rule="evenodd" height="16" name="settings" role="img" viewBox="0 0 15 16" width="15" aria-label="Settings" alt="Settings">
                                <title>Settings</title>
                                <path d="M7.53 10.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 1a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7z"></path>
                                <path d="M6.268 2.636l-.313.093c-.662.198-1.28.52-1.822.946l-.255.2-1.427-.754-1.214 1.735 1.186 1.073-.104.31a5.493 5.493 0 0 0-.198 2.759l.05.274L1 10.33l1.214 1.734 1.06-.56.262.275a5.5 5.5 0 0 0 2.42 1.491l.316.093L6.472 15H8.59l.204-1.636.313-.093a5.494 5.494 0 0 0 2.21-1.28l.26-.248 1.09.576 1.214-1.734-1.08-.977.071-.29a5.514 5.514 0 0 0-.073-2.905l-.091-.302 1.15-1.041-1.214-1.734-1.3.687-.257-.22a5.487 5.487 0 0 0-1.98-1.074l-.313-.093L8.59 1H6.472l-.204 1.636zM5.48.876A1 1 0 0 1 6.472 0H8.59a1 1 0 0 1 .992.876l.164.997a6.486 6.486 0 0 1 1.761.954l.71-.375a1 1 0 0 1 1.286.31l1.215 1.734a1 1 0 0 1-.149 1.316l-.688.622a6.514 6.514 0 0 1 .067 2.828l.644.581a1 1 0 0 1 .148 1.316l-1.214 1.734a1 1 0 0 1-1.287.31l-.464-.245c-.6.508-1.286.905-2.029 1.169l-.164.997A1 1 0 0 1 8.59 16H6.472a1 1 0 0 1-.992-.876l-.165-.997a6.499 6.499 0 0 1-2.274-1.389l-.399.211a1 1 0 0 1-1.287-.31L.181 10.904A1 1 0 0 1 .329 9.59l.764-.69a6.553 6.553 0 0 1 .18-2.662l-.707-.64a1 1 0 0 1-.148-1.315l1.214-1.734a1 1 0 0 1 1.287-.31l.86.454a6.482 6.482 0 0 1 1.576-.819L5.48.876z"></path>
                            </svg>
                        </cv-data-table-action>
                        <cv-button small @click="actionNew">Add new</cv-button>
                    </template>
                    <template v-if="use_batchActions" slot="batch-actions">
                        <cv-button @click="onBatchAction1">
                            Delete
                            <TrashCan16 class="bx--btn__icon"/>
                        </cv-button>
                        <cv-button @click="onBatchAction2">
                            Save
                            <Save16 class="bx--btn__icon"/>
                        </cv-button>
                        <cv-button @click="onBatchAction3">
                            Download
                            <Download16 class="bx--btn__icon"/>
                        </cv-button>
                    </template>
                </cv-data-table>
            </cv-column>
        </cv-row>
    </cv-grid>
</template>

<script>
    import TrashCan16 from '@carbon/icons-vue/es/trash-can/16';
    import Save16 from '@carbon/icons-vue/es/save/16';
    import Download16 from '@carbon/icons-vue/es/download/16';
    
    export default {
        components: { 
            TrashCan16, 
            Save16, 
            Download16
        },
        data() {
            return {
                pageHeader: 'Request List',

                awaitingAmount: 0,
                approvedAmount: 0,
                otherAmount: 0,
                awaitingHours: 0,
                approvedHours: 0,
                otherHours: 0,
                
                sampleOverflowMenu: [],

                rowSelects: [],
                rowSize: "",
                autoWidth: false,
                sortable: false,
                title: "Overtime Requests List",
                actionBarAriaLabel: "Custom action bar aria label",
                batchCancelLabel: "Cancel",
                zebra: false,
                columns: [
                    "Name",
                    "Protocol",
                    "Port",
                    "Rule",
                    "Attached Groups",
                    "Status"
                ],
                data: this.$store.state.data,
                use_actions: true,
                use_batchActions: true,
                helperText: "List below provides a possibility to approve or reject selected items"                
            }  
        },
        methods: {

            actionChange() {

            },

            submitForm() {
                this.modelValue = 'submitted'
            },
            resetForm() {
                this.modelValue = 'reset'
            },
            actionSubmit() {

            },

            action1() {

            },
            action2() {

            },
            action3() {

            },
            actionNew() {

            },
            onBatchAction1() {

            },
            onBatchAction2() {

            },
            onBatchAction3() {

            },

            onFilter() {

            },
            actionOnPagination() {

            },
            actionRowSelectChange() {

            },
            onSort() {

            },
            onOverflowMenuClick() {

            },

            actionSelected() {

            }
        },
        mounted() {
            // console.log('My first Component mounted.')
        }
    }
</script>