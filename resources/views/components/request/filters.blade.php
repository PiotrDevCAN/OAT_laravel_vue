{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
	            <x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$accounts" label="Account:" field-name="account" :selected-value="$account"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$natures" label="Reason:" field-name="nature" :selected-value="$nature"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$workers" label="Name:" field-name="worker" :selected-value="$worker"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$approvalTypes" label="Type:" field-name="approvaltype" :selected-value="$approvalType"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$competencies" label="Service Line:" field-name="competency" :selected-value="$competency"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$statuses" label="Status:" field-name="status" :selected-value="$status"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$requestors" label="Requestor:" field-name="requestor" :selected-value="$requestor"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$locations" label="Location:" field-name="location" :selected-value="$location"/>
            </div>
            <div class="ibm-col-12-4">
        		<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$weekendStartDates" label="Weekend >=:" field-name="weekendstart" :selected-value="$weekendDateStart"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$weekendEndDates" label="Weekend <=:" field-name="weekendend" :selected-value="$weekendDateEnd"/>
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$imports" label="Import:" field-name="import" :selected-value="$import"/>
            </div>
		</div>
	</div>
</div>
<div class="ibm-card">
    <div class="ibm-card__content">
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Approvers</h3>
            </div>
        </div>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$firstApprovers" label="1st Level Approver:" field-name="approver_first_level" :selected-value="$approverFirstLevel"/>
            </div>
            <div class="ibm-col-12-4">                	
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$secondApprovers" label="2nd Level Approver:" field-name="approver_second_level" :selected-value="$approverSecondLevel"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$thirdApprovers" label="3rd Level Approver:" field-name="approver_third_level" :selected-value="$approverThirdLevel"/>
            </div>
       	</div>
    </div>
</div>
<div class="ibm-card">
    <div class="ibm-card__content">
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Approval Flow</h3>
            </div>
        </div>
        <div class="ibm-fluid">
            <div class="ibm-col-12-4">
	            <x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$approvalModes" label="Approval Mode" field-name="approval_mode" :selected-value="$approvalMode"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$approverSquadLeaders" label="Squad Leader:" field-name="approver_squad_leader" :selected-value="$approverSquadLeader"/>
            </div>
            <div class="ibm-col-12-4">
        		<x-ibmv18form-select way-to-handle-array="displayValueReturnValue" :array-of-selectable-values="$approverTribeLeaders" label="Tribe Leader:" field-name="approver_tribe_leader" :selected-value="$approverTribeLeader"/>
            </div>
		</div>
    </div>
</div>

<div class="ibm-card">
    <div class="ibm-card__content">
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<p class="ibm-button-link ibm-ind-link">
            		<a id="filterFormSubmit" class="ibm-btn-pri ibm-btn-blue-50 ibm-confirm-link" href="javascript:;" onclick="jQuery('#myForm').submit();">Apply filters</a>
                	<a id="filterFormReset" class="ibm-btn-sec ibm-btn-blue-50 ibm-reset-link" href="javascript:;" onclick="commonDocumentList.resetFilters('#myForm')">Reset filters</a>
               	</p>
            </div>
		</div>
	</div>
</div>
{{ Form::close() }}