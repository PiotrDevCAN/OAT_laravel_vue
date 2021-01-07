{{ Form::open(['route' => [Route::currentRouteName(), $record->location, $record->shore], 'id' => 'record', 'class'  => 'ibm-column-form' ]) }}
    <div class="ibm-fluid">
        <div class="ibm-col-12-12">
            <x-ibmv18form-input field-name="location" label="Location" :selectedValue="$record->location"/>
    	    
    	    <x-ibmv18form-input field-name="shore" label="On Shore" :selectedValue="$record->shore"/>    	    
        </div>
    </div>
	<div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
	
    <p><b>Click Submit to Create the Request.</b></p>
    <p class="ibm-btn-row ibm-button-link">
       <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Submit</button>
       <button type="button" class="ibm-btn-sec ibm-btn-blue-50">Reset</button>
    </p>
{{ Form::close() }}