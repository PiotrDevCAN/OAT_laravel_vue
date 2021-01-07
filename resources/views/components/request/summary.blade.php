{{ Form::open(['route' => Route::currentRouteName(), 'id' => 'summaryForm', 'class'  => 'ibm-row-form' ]) }}
<div class="ibm-card">
    <div class="ibm-card__content">
		<div class="ibm-fluid">
            <div class="ibm-col-12-12">
            	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Summary</h3>
            </div>
        </div>
        <div class="ibm-fluid">
        	@isset($lists)
            	@foreach ($lists as $list)
            		<div class="ibm-col-12-6">
                    	<x-ibmv18form-input field-name="{{ $list->name }}Requests" label="{{ $list->label }} Requests:" :value="$list->total" disabled="true"/>
                    </div>
                    <div class="ibm-col-12-6">
                    	<x-ibmv18form-input field-name="{{ $list->name }}Hours" label="{{ $list->label }} Hours:" :value="$list->hours" disabled="true"/>
                    </div>            		
                @endforeach
        	@endisset
       	</div>
    </div>
</div>
{{ Form::close() }}