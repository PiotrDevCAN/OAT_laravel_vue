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
                    <cv-select-option v-bind:key="row" v-for="row in accounts" :value="row.account">{{ row.account }}</cv-select-option>
                </cv-select>
                <cv-select label="Reason">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in reasons" :value="row.reason">{{ row.reason }}</cv-select-option>
                </cv-select>
                <cv-select label="Name">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in names" :value="row.name">{{ row.name }}</cv-select-option>
                </cv-select>
                <cv-select label="Type">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in types" :value="row.approvaltype">{{ row.approvaltype }}</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="Service Line">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in competencies" :value="row.competency">{{ row.competency }}</cv-select-option>
                </cv-select>
                <cv-select label="Status">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in statuses" :value="row.status">{{ row.status }}</cv-select-option>
                </cv-select>
                <cv-select label="Requestor">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in requestors" :value="row.requestor">{{ row.requestor }}</cv-select-option>
                </cv-select>
                <cv-select label="Location">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in locations" :value="row.location">{{ row.location }}</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="Weekend >=">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in weekendStart" :value="row.weekendstart">{{ row.weekendstart }}</cv-select-option>
                </cv-select>
                <cv-select label="Weekend <=">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in weekendEnd" :value="row.weekendend">{{ row.weekendend }}</cv-select-option>
                </cv-select>
                <cv-select label="Import">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in imports" :value="row.import">{{ row.import }}</cv-select-option>
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
                    <cv-select-option v-bind:key="row" v-for="row in firstApprovers" :value="row.approver_first_level">{{ row.approver_first_level }}</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="2nd Level Approver">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in secondApprovers" :value="row.approver_second_level">{{ row.approver_second_level }}</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="3rd Level Approver">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in thirdApprovers" :value="row.approver_third_level">{{ row.approver_third_level }}</cv-select-option>
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
                    <cv-select-option v-bind:key="row" v-for="row in approvalModes" :value="row.approval_mode">{{ row.approval_mode }}</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="Squad Leader">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in squadLeaders" :value="row.approver_squad_leader">{{ row.approver_squad_leader }}</cv-select-option>
                </cv-select>
            </cv-column>
            <cv-column :lg="4">
                <cv-select label="Tribe Leader">
                    <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                    <cv-select-option v-bind:key="row" v-for="row in tribeLeaders" :value="row.approver_tribe_leader">{{ row.approver_tribe_leader }}</cv-select-option>
                </cv-select>
            </cv-column>
        </cv-row>
        <cv-row>
            <br/>
            <cv-column :lg="12">
                <br/>
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
                <cv-text-input label="Awaiting Approval Requests" v-model="awaitingAmount"> </cv-text-input>
                <cv-text-input label="Approved Requests" v-model="approvedAmount"> </cv-text-input>
                <cv-text-input label="Other Requests" v-model="otherAmount"> </cv-text-input>
            </cv-column>
            <cv-column :lg="6">
                <cv-text-input label="Awaiting Approval Hours" v-model="awaitingHours"> </cv-text-input>
                <cv-text-input label="Approved Hours" v-model="approvedHours"> </cv-text-input>
                <cv-text-input label="Other Hours" v-model="otherHours"> </cv-text-input>
            </cv-column>
        </cv-row>

        <cv-row>
            <cv-column :lg="12">
                <br/>
                <cv-content-switcher 
                    @selected="actionSelected"
                    :light="true"
                    :size="size"
                >
                    <cv-content-switcher-button owner-id="csb-awaiting" :selected="isSelected('awaiting')">Awaiting Approval Requests</cv-content-switcher-button>
                    <cv-content-switcher-button owner-id="csb-approved" :selected="isSelected('approved')">Approved Requests</cv-content-switcher-button>
                    <cv-content-switcher-button owner-id="csb-other" :selected="isSelected('other')">Other Requests</cv-content-switcher-button>
                </cv-content-switcher>

                <section style="margin: 10px 0;">
                    <cv-content-switcher-content owner-id="csb-awaiting">
                        <data-table-skeleton :loading="loadingAwaiting" :columns="columns" title="Awaiting Overtime Requests List" helper-text="helperText"/>
                        <data-table :dataGetter="getAwaiting" type="awaiting" :columns="columns" title="Awaiting Overtime Requests List" helper-text="helperText" :loadData="loadAwaiting"/>
                    </cv-content-switcher-content>
                    <cv-content-switcher-content owner-id="csb-approved">
                        <data-table-skeleton :loading="loadingApproved" :columns="columns" title="Approved Overtime Requests List" helper-text="helperText"/>
                        <data-table :dataGetter="getApproved" type="approved" :columns="columns" title="Approved Overtime Requests List" helper-text="helperText" :loadData="loadApproved"/>
                    </cv-content-switcher-content>
                    <cv-content-switcher-content owner-id="csb-other">
                        <data-table-skeleton :loading="loadingOther" :columns="columns" title="Other Overtime Requests List" helper-text="helperText"/>
                        <data-table :dataGetter="getOther" type="other" :columns="columns" title="Other Overtime Requests List" helper-text="helperText" :loadData="loadOther"/>                        
                    </cv-content-switcher-content>
                </section>
            </cv-column>
        </cv-row>
    </cv-grid>
</template>

<script>
    import { mapState } from 'vuex';

    import store from '../../../store/';

    import DataTableSkeleton from '../../elements/DataTableSkeleton';
    import DataTable from '../../elements/DataTable';

    export default {
        components: {
            DataTableSkeleton,
            DataTable
        },

        computed: {
            ...mapState({
                accounts: state => state.requests.accounts,
                reasons: state => state.requests.reasons,
                names: state => state.requests.names,
                types: state => state.requests.types,

                competencies: state => state.requests.competencies,
                statuses: state => state.requests.statuses,
                requestors: state => state.requests.requestors,
                locations: state => state.requests.locations,

                weekendStart: state => state.requests.weekendStart,
                weekendEnd: state => state.requests.weekendEnd,
                imports: state => state.requests.imports,

                firstApprovers: state => state.requests.firstApprovers,
                secondApprovers: state => state.requests.secondApprovers,
                thirdApprovers: state => state.requests.thirdApprovers,

                approvalModes: state => state.requests.approvalModes,
                squadLeaders: state => state.requests.squadLeaders,
                tribeLeaders: state => state.requests.tribeLeaders,
            }),
        },

        data() {
            return {

                // data sources
                getAwaiting: 'fetchAwaitingRequests',
                getApproved: 'fetchApprovedRequests',
                getOther: 'fetchOtherRequests',

                // initial table state
                loadAwaiting: true,
                loadApproved: false,
                loadOther: false,

                // skeleton options
                loadingAwaiting: false,
                loadingApproved: false,
                loadingOther: false,

                pageHeader: 'Request List',
                size: 'xl',

                awaitingAmount: "0",
                approvedAmount: "0",
                otherAmount: "0",
                awaitingHours: "0",
                approvedHours: "0",
                otherHours: "0",

                columns: [
                    "Ref",
                    "Account",
                    "Service Line",
                    "Reason",
                    "Title",
                    "Details",
                    "Week Ending",
                    "Name",
                    "Serial",
                    "Country",
                    "Hours",
                    "Status",
                    "1st Level Approval",
                    "2nd Level Approval",
                    "3rd Level Approval",
                    "Requestor",
                    "Approval",
                    "Squad Leader",
                    "Tribe Leader",
                    "Pre",
                    "Post",
                    "Claim Acc",
                    "Created"
                ],
                helperText: "List below provides a possibility to approve or reject selected items"
            }
        },
        methods: {
            submitForm() {
                alert('apply filters and refresh lists');
            },
            resetForm() {
                alert('reset filters and refresh lists');
            },
            // content switcher
            actionSelected(event) {
                console.log(event);
                switch(type) {
                    case 'csb-awaiting':
                        
                        return true;
                    break;
                    case 'csb-approved':
                        
                        return false;
                    break;
                    case 'csb-other':
                        
                        return false;
                    break;
                    default:
                        return false;
                }
            },
            isSelected(type) {
                switch(type) {
                    case 'awaiting':
                        return true;
                    break;
                    case 'approved':
                        return false;
                    break;
                    case 'other':
                        return false;
                    break;
                    default:
                        return false;
                }
            }
        },
        init() {
            console.log('List Component initialized.')
        },
        beforCreate() {
            console.log('List Component before create.')
        },
        created() {
            console.log('List Component created.')

            store.dispatch('fetchFiltesData').then(() => { this.loading = false; });
        },
        beforeMount() {
            console.log('List Component before mount.')
        },
        mounted() {
            console.log('List Component mounted.')
        },
        beforeUpdate() {
            console.log('List Component before update.')
        }, 
        updated() {
            console.log('List Component updated.')
        },
        beforeDestroy() {
            console.log('List Component before destroy.')
        }, 
        destroyed() {
            console.log('List Component destroyed.')
        }
    }
</script>