{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
			<div class="ibm-col-12-4">
            	<x-ibmv18form-select field-name="user_intranet" label="User Intranet:" :array-of-selectable-values="$userIntranets" :selected-value="request()->input('user_intranet')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select field-name="delegate_intranet" label="Delegate Intranet:" :array-of-selectable-values="$delegateIntranets" :selected-value="request()->input('delegate_intranet')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select field-name="delegate_notesid" label="Delegate Notes Id:" :array-of-selectable-values="$delegateNotesIds" :selected-value="request()->input('delegate_notesid')"/>
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