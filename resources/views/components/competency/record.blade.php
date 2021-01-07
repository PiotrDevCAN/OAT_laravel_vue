@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
		<div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Define Modify Approver for Service Line</h3>
                
                <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                
                {{ Form::open(['route' => [Route::currentRouteName(), $record->competency, $record->approver], 'id' => 'record', 'class'  => 'ibm-column-form' ]) }}
                    <div class="ibm-fluid">
                        <div class="ibm-col-12-12">
                            <x-ibmv18form-input field-name="COMPETENCY" label="Service Line" :selectedValue="$record->competency"/>
                    	    
                    	    <x-ibmv18form-input field-name="APPROVER" label="Approver" :selectedValue="$record->approver"/>
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