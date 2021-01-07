<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Request</h3>

<div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>

<h3 class="ibm-bold ibm-h4 ibm-textcolor-red-40">New Features</h3>
<ul>
	<li><b>Usability: New approval flow of overtime requests has been implemented. For details please refer to description in Flow selection section below.</b></li>
	<li><b>Usability: For now on it is possible to check all Approvers Persons names before submitting request.</b></li>
    <li>Usability: Accounts are now in true alphabetical order, regardless of case.</li>
    <li>Usability: To find your account, begin typing it's name in the select box and the list of options will instantly be filtered to just that match the characters you've typed</li>
    <li>Performance: Page loads a lot faster</li>
    <li>If you experience any technical problems using the tool, please contact <a href='mailto:piotr.tajanowicz@ibm.com'>Piotr Tajanowicz</a></li>
</ul>
<h3 class="ibm-bold ibm-h4 ibm-textcolor-red-40">Account Rationalisation</h3>
<p>November 2016. We have reduced the available accounts, removing many entries for accounts we no longer support, renaming others to reflect changes to the contract. If you cannot find an account you need, contact OAT Support <a href='mailto:ukiops@uk.ibm.com'>ukiops@uk.ibm.com</a> with the details
</p>

<div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>

<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Request for Overtime to be worked</h3>
<form id="create" class="ibm-column-form" method="post" action="">
    <div class="ibm-fluid">
        <div class="ibm-col-12-12">
            <p>
                <label class="ibm-column-field-label ibm-bold" for="STATUS">Status</label>
                <span id="STATUS">
                	@isset($record)
                		<b>{{ $record->status }}</b>
                    @endisset
                </span>
            </p>
        	<x-ibmv18form-input field-name="worker" label="Name of individual working overtime" :value="$record->worker"/>
    	    <p class="ibm-bold">If changing this entry please allow time for Bluepages Auto Completion to work, it will overwrite this text and re-populate the two fields below.</p>
        	<x-ibmv18form-input field-name="workerName" label="Name"/>
        	<x-ibmv18form-input field-name="workerJob" label="Job Title"/>
        </div>
    </div>
    <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
    <div class="ibm-fluid">
        <div class="ibm-col-12-12">
        	<x-ibmv18form-input field-name="title" label="Title" :value="$record->title"/>
        </div>
	</div>
	<div class="ibm-fluid">
        <div class="ibm-col-12-12">
            <x-ibmv18form-textarea field-name="details" :value="$record->details" label="Details of overtime activity"/>
        </div>
	</div>
	<div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
	<div class="ibm-fluid">
        <div class="ibm-fluid">
            <div class="ibm-col-12-6">
            	<x-ibmv18form-select way-to-handle-array="displayKeyReturnKey" :array-of-selectable-values="$allAccounts" label="Account" field-name="account"/>
           		<x-ibmv18form-input field-name="claim_acc_id" label="Claim Code/ Account Id" :value="$record->claim_acc_id"/>
                <x-ibmv18form-input field-name="hours" label="Hours required" :value="$record->hours"/>
                <x-ibmv18form-select way-to-handle-array="displayValueReturnKey" :array-of-selectable-values="$allLocations" label="IBM country of employment" field-name="location"/>
                <x-ibmv18form-select way-to-handle-array="displayValueReturnKey" :array-of-selectable-values="$allLocations" label="Work in Client Innovation Center" field-name="cic"/>
            </div>
            <div class="ibm-col-12-6">
                <x-ibmv18form-select way-to-handle-array="displayKeyReturnKey"  :array-of-selectable-values="$allCompetencies" label="Service Line of person working overtime" field-name="competency" />
                <x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$allRecoverable" label="Recoverable" field-name="recoverable"/>
                <x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$allNatures" label="Nature" field-name="nature"/>
                <x-ibmv18form-select way-to-handle-array="displayKeyReturnKey" :array-of-selectable-values="$allWeekends" label="Weekending" field-name="weekenddate"/>     
                <x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$allImports" label="Is worker an Import to SO Delivery ?" field-name="import"/>
            </div>
       </div>
   </div>
   
   <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
   
   <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Appropriate approval flow which will be applied to this Overtime request</h3>
   
   <div class="ibm-fluid" data-widget="setsameheight" data-items=".ibm-card">
   		<div class="ibm-col-12-6">
			<div class="ibm-card">
                <div class="ibm-card__content">
                    <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Agile Tribes and Squads flow</h3>
					<x-ibmv18form-input field-name="squad_leader" label="Squad Leader" disabled="true" placeholder="" :value="$record->approver_squad_leader"/>
					<x-ibmv18form-input field-name="tribe_leader" label="Tribe Leader" disabled="true" placeholder="" :value="$record->approver_tribe_leader"/>
					<p>New Squad Approvals info:</p>
					<p>
                        Using data from the Europe Squadalog IBM Forms tool, pulled via API Add feature that gives user option to set approver based on their squad (default) or use the existing options by picking an account.
                        Not all users are aligned to squads so upon login we can use the user id to look the person up in the squadalog. 
                        Lvl 1 will be auto approved, Lvl 2 approver will be the Squad leader, Lvl 3 the Tribe leader.
                    </p>
                    <ul>
                        <li>If the user is found, default to the squad approach but should have option to change to the old method.</li>
                        <li>If the user is not found in the squadalog data then just use the existing std approver setup.</li>
                	</ul>
                	<p class="ibm-btn-row ibm-button-link ibm-right">
                       <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Check Leaders</button>
                   	</p>
                </div>
            </div>
		</div>
		<div class="ibm-col-12-6">
       		<div class="ibm-card">
                <div class="ibm-card__content">
                	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Account flow</h3>
           			
           			<x-ibmv18form-input field-name="approver_first_level" label="1st Level Approver" disabled="true" placeholder="Auto-populated upon submission."/>
                   	<x-ibmv18form-input field-name="approver_second_level" label="2nd Level Approver" disabled="true" placeholder="Auto-populated upon submission."/>
                   	<x-ibmv18form-input field-name="approver_third_level" label="3rd Level Approver" disabled="true" placeholder="Auto-populated upon submission."/>
           			
           			<p>
                        <label class="ibm-column-field-label ibm-bold" for="APPROVER_FIRST_CHECK">Predicted 1st Level Approver</label>
                        <span id="APPROVER_FIRST_CHECK">
                        Use Check Approvers option to discover who is suitable 1st Level Approver
                    	</span>
                    <p>
                        <label class="ibm-column-field-label ibm-bold" for="APPROVER_SECOND_CHECK">Predicted 2nd Level Approver</label>
                        <span id="APPROVER_SECOND_CHECK">
                        Use Check Approvers option to discover who is suitable 2nd Level Approver
                    	</span>
                    </p>
                    <p>
                        <label class="ibm-column-field-label ibm-bold" for="APPROVER_THIRD_CHECK">Predicted 3rd Level Approver</label>
                        <span id="APPROVER_THIRD_CHECK">
                            Use Check Approvers option to discover who is suitable 3rd Level Approver
                        </span>
                    </p>
           		
           			<p class="ibm-btn-row ibm-button-link ibm-right">
                       <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Check Approvers</button>
                   </p>
                </div>
            </div>
   		</div>
   </div>
   
   <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
   
   <p><b>Click Submit to Create the Request.</b></p>
   <p class="ibm-btn-row ibm-button-link">
       <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Submit</button>
       <button type="button" class="ibm-btn-sec ibm-btn-blue-50">Reset</button>
   </p>
   
</form>

<h3 class="ibm-h3"><a href='https://w3-connections.ibm.com/wikis/home?lang=en-us#!/wiki/ITDBO/page/OVERTIME%20APPROVAL%20TOOL%20%28OAT%29%20Guidance' target='_blank' >OAT Tool Guidance</a> for List of Approvers (opens in a new window)</h3>