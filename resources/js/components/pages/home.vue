<template>
    <twoColumns v-bind:app-name="appName">
        <template slot="left-tiles" v-if="areLeftTiles">
            <cv-tile :light="light" kind="expandable" expanded>
                <template slot="default">
                    <h1 class="home_box__usage">Usage</h1>
                </template>
                <template slot="below">
                    <p>This tool is for managing the process for gaining approval for planned paid overtime that is NOT 'Stand-by', 'Shift'</p>
                    <p>When 'Call-out' is instigated a retrospective OAT is required.</p>
                    <p>Individuals should raise a request themselves. When you raise the request, you will need to specify the Competency you sit in and the account you work on. This dictates who your approvers will be. Once the request has been created, emails are sent to these Approvers. The requestor will be e.mailed with updates as the approvers respond. Requestors can also track the progress of their requests in the tool.</p>
                </template>
            </cv-tile>

            <cv-tile :light="light" kind="expandable" expanded>
                <template slot="default">
                    <h1 class="home_box__problems">Known Problems</h1>
                </template>
                <template slot="below">
                    <p>None.</p>
                </template>
            </cv-tile>

            <cv-tile :light="light" kind="expandable" expanded>
                <template slot="default">
                    <h1 class="home_box__support">Support</h1>
                </template>
                <template slot="below">
                    <p>The support team are contactable via their Taskid ukiops@uk.ibm.com</p>
                    <p>Guidance for the tool, including the process, scope and a list of approvers can be found here: OAT Tool Guidance</p>
                    <p>In case of emergency:</p>
                </template>                
            </cv-tile>

            <cv-tile :light="light" kind="expandable" expanded>
                <template slot="default">
                    <h1 class="home_box__names">Names in the Tool</h1>
                </template>
                <template slot="below">
                    <p>When you add names to the request the tool automatically picks up the Notes address as you start to enter a name. Give the tool time to populate and ensure you select the correct name from the list that appears. If you do not, your request will not complete correctly. Note that any person working overtime must be present in Bluepages in order for OAT to handle the request.</p>
                </template>
            </cv-tile>

            <cv-tile :light="light" kind="expandable" expanded>
                <template slot="default">
                    <h1 class="home_box__admin">Access & Admin</h1>
                </template>
                <template slot="below">
                    <p>No special access is required to raise a request. Anyone with access to the 9. network and an Intranet Logon id can use the tool. There is a small admin team, who can approve/reject any request. They belong to a specific Bluegroup. For details on this group please refer to the FAQs section in the support Wiki (address above). Approvers require no special privileges on the system. They must always use the appropriate link in the email they receive, the system will confirm they are the requested approver before it processes their approval/rejection. One approver can Reject - that does not prevent the other from Approving, however the request will remain in the REJECTED status, until the rejector approves the request.</p>
                </template>
            </cv-tile>
        </template>
        <template slot="right-tiles" v-if="areRightTiles">
            <cv-tile :light="light" kind="expandable" expanded>
                <template slot="default">
                    <h1 class="home_box__news">OAT News</h1>
                </template>
                <template slot="below">
                    <p>Updates and news items will be listed here:</p>
                    <cv-list>
                        <cv-list-item>                        
                            4th Nov 2016. Competency Changes to Service Line. Changes to the Approver chain.
                        </cv-list-item>
                        <cv-list-item>
                            18th Aug 2013. Multiple Import Approvers can now be CC'd on request. As determined by membership of OAT_ImportApprover
                        </cv-list-item>
                        <cv-list-item>
                            24th Apr 2012. Details truncated to 120chars in the report screens. Full text visible via mouse over help icon.
                        </cv-list-item>
                        <cv-list-item>
                            21st Feb 2012. New format Status report available, groups Requests by their status.
                        </cv-list-item>
                        <cv-list-item>
                            13th Jan 2012. Fixed bug whereby approvers delegates were not being CC'd on approval requests.
                        </cv-list-item>
                        <cv-list-item>
                            15th Dec 2011. Enhanced the Log feature so administrators can easily review the progress of a ticket through the system.
                        </cv-list-item>
                        <cv-list-item>
                            15th Dec 2011. Delegates are now CC'd on approval notifications directly, removing the need for Notes Mail Rules to forward approval requests.
                        </cv-list-item>
                        <cv-list-item>
                            30th Nov 2011. Preparatory change in readiness for enabling CC function for My Delegates.
                        </cv-list-item>
                        <cv-list-item>
                            29th Nov 2011. Added specific error message when the contents of the HOURS box is not an integer.
                        </cv-list-item>
                    </cv-list>
                </template>
            </cv-tile>
        </template>
    </twoColumns>
</template>

<script>
    import twoColumns from '../layouts/TwoColumns'

    export default {
        components: { 
            twoColumns
        },
        props: {
            appName: String
        },
        data() {
            return {
                areLeftTiles: true,
                areRightTiles: true,
            
                title: 'Home Page from Home template',
                light: false
            }
        },
        mounted() {
            // console.log('My second Component mounted.')
        }
    }
</script>

<style lang="scss">
@import '../../styles/_carbon-utils';

.home_box__usage {
    @include carbon--type-style('productive-heading-03');
}
.home_box__problems {
    // @include type-style('body-long-01');
    @include carbon--type-style('productive-heading-03');
}
.home_box__support {
    @include carbon--type-style('productive-heading-03');
}
.home_box__names {
    @include carbon--type-style('productive-heading-03');
}
.home_box__admin {
    @include carbon--type-style('productive-heading-03');
}
.home_box__news {
    @include carbon--type-style('productive-heading-03');
}
</style>