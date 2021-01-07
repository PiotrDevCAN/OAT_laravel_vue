{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'myForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
        <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">List Filters</h3>
		<div class="ibm-fluid">
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select field-name="last_updated" label="Last Updated:" :array-of-selectable-values="$lastUpdates" :selected-value="request()->input('last_updated')"/>
            </div>
            <div class="ibm-col-12-4">
            	<x-ibmv18form-select field-name="last_updater" label="Last Updater:" :array-of-selectable-values="$lastUpdaters" :selected-value="request()->input('last_updater')"/>
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