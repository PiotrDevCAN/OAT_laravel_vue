{{ Form::open(['route' => [Route::currentRouteName(), $record->user_intranet, $record->delegate_intranet], 'id' => 'record', 'class'  => 'ibm-column-form' ]) }}
    <div class="ibm-fluid">
        <div class="ibm-col-12-12">
            <x-ibmv18form-input field-name="DELEGATE" label="Delegate" :selectedValue="$record->user_intranet"/>
    	    
    	    <x-ibmv18form-input field-name="DELEGATE_INTRANET" label="Email" :selectedValue="$record->delegate_intranet"/>
    	    
    	    <x-ibmv18form-input field-name="DELEGATE_NOTESID" label="Notesid" :selectedValue="$record->delegate_notesid"/>
        </div>
    </div>
	<div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
	
    <p><b>Click Submit to Create the Request.</b></p>
    <p class="ibm-btn-row ibm-button-link">
       <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Submit</button>
       <button type="button" class="ibm-btn-sec ibm-btn-blue-50">Reset</button>
    </p>
{{ Form::close() }}