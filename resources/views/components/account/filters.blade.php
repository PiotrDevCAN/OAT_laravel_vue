{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select field-name="account" label="Account:" :array-of-selectable-values="$accounts" :selected-value="request()->input('account')"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select field-name="approver" label="Approver:" :array-of-selectable-values="$approvers" :selected-value="request()->input('approver')"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select field-name="verified" label="Verified:" :array-of-selectable-values="$verified" :selected-value="request()->input('verified')"/>
            </div>
            <div class="ibm-col-12-3">
            	<x-ibmv18form-select field-name="location" label="Location" :array-of-selectable-values="$locations" :selected-value="request()->input('location')"/>
            </div>
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