<template>
    <cv-grid>
        <cv-form @submit.prevent="actionSubmit">
            <cv-row class="bx--row-padding">
                <cv-column :lg="6">
                    <h1 class="page-title">Request for Overtime to be worked</h1>
                    <h2 class="page-subtitle">Current status</h2>
                    <cv-progress
                        :initial-step="initialStep"
                        :steps="steps"
                        :vertical="vertical"></cv-progress>
                    <form-section 
                        :section="formFields.section1" 
                        v-on:created="handleSectionCreated"
                        :check-is-loaded="getFormMapStateById"
                        :options-data="getFormMapDataById"
                        ></form-section>
                </cv-column>
                <cv-column :lg="6">
                    <cv-tile :light="light" kind="expandable" expanded>
                        <template slot="default">
                            <h1>New Features</h1>
                        </template>
                        <template slot="below">
                            <cv-list :ordered="ordered">
                                <cv-list-item>
                                    Usability: New approval flow of overtime requests has been implemented. For details please refer to description in Flow selection section below.
                                </cv-list-item>
                                <cv-list-item>
                                    Usability: For now on it is possible to check all Approvers Persons names before submitting request.
                                </cv-list-item>
                                <cv-list-item>
                                    Usability: Accounts are now in true alphabetical order, regardless of case.
                                </cv-list-item>
                                <cv-list-item>
                                    Usability: To find your account, begin typing it's name in the select box and the list of options will instantly be filtered to just that match the characters you've typed
                                </cv-list-item>
                                <cv-list-item>
                                    Performance: Page loads a lot faster
                                </cv-list-item>
                                <cv-list-item>
                                    If you experience any technical problems using the tool, please contact Piotr Tajanowicz
                                </cv-list-item>
                            </cv-list>
                        </template>
                    </cv-tile>
                    <cv-tile :light="light" kind="expandable" expanded>
                        <template slot="default">
                            <h1>Account Rationalisation</h1>
                        </template>
                        <template slot="below">
                            <p>This tool is for managing the process for gaining approval for planned paid overtime that is NOT 'Stand-by', 'Shift'</p>
                            <p>When 'Call-out' is instigated a retrospective OAT is required.</p>
                            <p>Individuals should raise a request themselves. When you raise the request, you will need to specify the Competency you sit in and the account you work on. This dictates who your approvers will be. Once the request has been created, emails are sent to these Approvers. The requestor will be e.mailed with updates as the approvers respond. Requestors can also track the progress of their requests in the tool.</p>
                        </template>
                    </cv-tile>
                </cv-column>
            </cv-row>
            <cv-row class="bx--row-padding">
                <cv-column :lg="6">
                    <form-section 
                        :section="formFields.section2" 
                        v-on:created="handleSectionCreated"
                        :check-is-loaded="getFormMapStateById"
                        :options-data="getFormMapDataById"
                        ></form-section>
                </cv-column>
                <cv-column :lg="6">
                    <form-section 
                        :section="formFields.section3" 
                        v-on:created="handleSectionCreated"
                        :check-is-loaded="getFormMapStateById"
                        :options-data="getFormMapDataById"
                        ></form-section>
                </cv-column>
            </cv-row>
            <cv-row class="bx--row-padding">
                <cv-column :lg="12">
                    <h3>Appropriate approval flow which will be applied to this Overtime request</h3>
                </cv-column>
                <cv-column :lg="6">
                    <form-section 
                        :section="formFields.section4" 
                        v-on:created="handleSectionCreated"
                        :check-is-loaded="getFormMapStateById"
                        :options-data="getFormMapDataById"
                        ></form-section>
                    <p>New Squad Approvals info:</p>
                    <p>
                        Using data from the Europe Squadalog IBM Forms tool, pulled via API Add feature that gives user option to set approver based on their squad (default) or use the existing options by picking an account. 
                        Not all users are aligned to squads so upon login we can use the user id to look the person up in the squadalog. Lvl 1 will be auto approved, Lvl 2 approver will be the Squad leader, Lvl 3 the Tribe leader.
                    </p>
                    <cv-list :ordered="ordered">
                        <cv-list-item>
                            If the user is found, default to the squad approach but should have option to change to the old method.
                        </cv-list-item>
                        <cv-list-item>
                            If the user is not found in the squadalog data then just use the existing std approver setup.
                        </cv-list-item>
                    </cv-list>
                    <cv-button kind="primary" @click="checkLeaders">Check Leaders</cv-button>
                </cv-column>
                <cv-column :lg="6">
                    <form-section 
                        :section="formFields.section5" 
                        v-on:created="handleSectionCreated"
                        :check-is-loaded="getFormMapStateById"
                        :options-data="getFormMapDataById"
                        ></form-section>
                    <cv-structured-list :condensed="condensed">
                        <template slot="items">
                            <cv-structured-list-item checked>
                                <cv-structured-list-data>Predicted 1st Level Approver</cv-structured-list-data>
                                <cv-structured-list-data>Use Check Approvers option to discover who is suitable 1st Level Approver </cv-structured-list-data>
                            </cv-structured-list-item>
                            <cv-structured-list-item>
                                <cv-structured-list-data>Predicted 2nd Level Approver</cv-structured-list-data>
                                <cv-structured-list-data>Use Check Approvers option to discover who is suitable 2nd Level Approver </cv-structured-list-data>
                            </cv-structured-list-item>
                            <cv-structured-list-item checked>
                                <cv-structured-list-data>Predicted 3rd Level Approver</cv-structured-list-data>
                                <cv-structured-list-data>Use Check Approvers option to discover who is suitable 3rd Level Approver </cv-structured-list-data>
                            </cv-structured-list-item>
                        </template>
                    </cv-structured-list>
                    <cv-button kind="primary" @click="checkApprovers">Check Approvers</cv-button>
                </cv-column>
            </cv-row>
            <cv-row class="bx--row-padding">
                <cv-column :lg="12">
                    <h4>Click Submit to Create the Request.</h4>
                    <cv-button-set>
                        <cv-button kind="primary" @click="submitForm">Submit</cv-button>
                        <cv-button kind="primary" @click="cancelForm">Cancel</cv-button>
                        <cv-button kind="secondary" @click="resetForm">Reset</cv-button>
                    </cv-button-set>
                </cv-column>
            </cv-row>
        </cv-form>
    </cv-grid>    
</template>

<script>

    import { mapState } from 'vuex'
    import { mapMutations } from 'vuex'
    import { mapActions } from 'vuex'
    import { mapGetters } from 'vuex'

    import FormSection from '../../elements/FormSection'

    export default {
        components: {
            FormSection
        },
        data() {
            return {

                pageHeader: 'Request',

                // fields default values
                intranetId: 'Piort.Tajanowicz@ibm.com',
                notesId: '',
                employeeName: 'Piot Tajanowicz',
                employeeJobTitle: 'Software Developer',

                title: '',
                details: '',
                account: '',
                claimCode: '',

                hoursValue: 0,
                country: '',
                serviceLine: '',
                recoverable: '',
                nature: '',
                weekending: '',
                imported: '',

                squadLeader: 'INITIAL SQUAD',
                tribeLeader: 'INITIAL TRIBE',

                firstLevelApprover: 'fff',
                secondLevelApprover: 'aaa',
                thirdLevelApprover: 'aaa',

                initialStep: 0,
                steps: [
                    "Adress new request",
                    "Approved at first level",
                    "Approved at second level",
                    "Approved at third level",
                    "Fully approved"
                ],
                vertical: false,
                light: false,
                ordered: false,            
                condensed: false,
                noWrap: false,

                formFields: {
                    section1: {
                        heading: null,
                        fields: [
                            { id: 'intranetId', label: 'Name of individual working overtime', type: 'input' },
                            { id: 'name', label: 'Name', type: 'input' },
                            { id: 'jobTitle', label: 'Job Title', type: 'input' },
                            { id: 'title', label: 'Title', type: 'input' },
                            { id: 'details', label: 'Details of overtime activity', type: 'textarea', helperText: "Provide a brief description of an activity" },
                        ]
                    },
                    section2: {
                        heading: null,
                        fields: [
                            { id: 'account', label: 'Account', type: 'select' },
                            { id: 'claimCode', label: 'Claim Code/ Account Id', type: 'input' },
                            { id: 'hours', label: 'Hours required', type: 'number', 
                                helperText: "",
                                mobile: false,
                                min: 0,
                                max: 40,
                                step: 0.1,
                                value: 0 
                            },
                            { id: 'country', label: 'IBM country of employment', type: 'select' },
                            { id: 'worksInCenter', label: 'Work in Client Innovation Center', type: 'select' }
                        ]
                    },
                    section3: {
                        heading: null,
                        fields: [
                            { id: 'competency', label: 'Service Line of person working overtime', type: 'select' },
                            { id: 'recoverable', label: 'Recoverable', type: 'select' },
                            { id: 'nature', label: 'Nature', type: 'select' },
                            { id: 'weekending', label: 'Weekending', type: 'select' },
                            { id: 'import', label: 'Is worker an Import to SO Delivery ?', type: 'select' }
                        ]
                    },
                    section4: {
                        heading: 'Agile Tribes and Squads flow',
                        fields: [
                            { id: 'squadLeader', label: 'Squad Leader', type: 'input', readonly: true },
                            { id: 'tribeLeader', label: 'Tribe Leader', type: 'input', readonly: true }
                        ]
                    },
                    section5: {
                        heading: 'Account flow',
                        fields: [
                            { id: 'firstLevelApprover', label: '1st Level Approver', type: 'input', readonly: true },
                            { id: 'secondLevelApprover', label: '2nd Level Approver', type: 'input', readonly: true },
                            { id: 'thirdLevelApprover', label: '3rd Level Approver', type: 'input', readonly: true }
                        ]
                    }
                }
            }  
        },
        computed: {
            // with aliases
            ...mapGetters({

                getFormMapDataById: 'requests/getFormDataById',
                getFormMapStateById: 'requests/getFormLoadedStateById',
                getFormMapSelectedById: 'requests/getFormSelectedValueById',
            
            })
        },
        methods: {

            ...mapActions({
                // add: 'increment' // map `this.add()` to `this.$store.dispatch('increment')`
                getFormData: 'requests/fetchFormData'
            }),

            handleSectionCreated(data) {
                console.log('Child section has been created - FORM.');
                // console.log(data)
            },
            
            submitForm() {
            
            },
            cancelForm() {
            
            },
            resetForm() {
            
            },
            actionSubmit() {

            },

            getSquadLeader() {
                return this.squadLeader
            },
            getTribeLeader() {
                return this.tribeLeader
            },
            getFirstLevelApprover() {
                return this.firstLevelApprover
            },
            checkLeaders() {
                this.squadLeader = 'Name read from Squad data - SQUAD',
                this.tribeLeader = 'Name read from Squad data - TRIBE'
            },
            checkApprovers() {
                this.firstLevelApprover = 'Name read from acocunts data - first',
                this.secondLevelApprover = 'Name read from acocunts data - second'
                this.thirdLevelApprover = 'Name read from acocunts data - third'
            }
        },
        created() {
            // fetch form fields
            this.getFormData().then(() => {
            
            })
        },
        mounted() {
            // console.log('My first Component mounted.')
        }
    }
</script>

<style lang="scss">
@import '../../../styles/_carbon-utils';

.cv-select, .cv-text-input, .cv-number-input, .cv-combo-box {
    width: 100%;
}
.page-title {
    @include carbon--type-style('productive-heading-05');
}
.page-subtitle {
    @include carbon--type-style('productive-heading-03');
}
</style>