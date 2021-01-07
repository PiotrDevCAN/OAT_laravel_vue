@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
		<div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Define/Modify Approver for Account</h3>
                
                <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                
                {{ Form::open(['route' => [Route::currentRouteName(), $record->account, $record->location], 'id' => 'record', 'class'  => 'ibm-column-form' ]) }}
                    <div class="ibm-fluid">
                        <div class="ibm-col-12-12">
                            <x-ibmv18form-input field-name="LOCATION" label="Location" :selectedValue="$record->location"/>
                    	    
                    	    <x-ibmv18form-input field-name="ACCOUNT" label="Account Name" :selectedValue="$record->account"/>
                    	    
                    	    <x-ibmv18form-input field-name="VARIFIED" label="Verified" :selectedValue="$record->verified"/>
                    	    
                    	    <x-ibmv18form-input field-name="APPROVER" label="Account Approver" :selectedValue="$record->approver"/>
                        </div>
                    </div>
            		<div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                	
                    <p><b>Click Submit to Create the Request.</b></p>
                    <p class="ibm-btn-row ibm-button-link">
                       <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Submit</button>
                       <button type="button" class="ibm-btn-sec ibm-btn-blue-50">Reset</button>
                    </p>
                {{ Form::close() }}
			</div>
		</div>
	</div>
</div>

@endsection