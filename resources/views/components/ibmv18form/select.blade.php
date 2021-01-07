<p class='ibm-form-elem-grp' id='{{ $fieldName }}FormGroup'>
    <label for='{{ $fieldName }}'>{{ $label }}</label>
    <span>
        <select 
        	name='{{ $fieldName }}' 
        	id='{{ $fieldName }}' 
        	class='{{ $classCSS }} ibm-fullwidth'
			required='required' 
			@isset($onChange) {{!! $onChange !!}} @endisset
            data-tags="true" 
            data-placeholder="{{ $placeHolder }}" 
            data-allow-clear="true"
    	>
            @isset($placeHolder)
            	<option value=''>{{ $placeHolder }}</option>
            @endisset
            
         	@empty($arrayOfSelectableValues)
         	@else
            	@foreach ($arrayOfSelectableValues as $key => $value)
                	<option value='{{ $getReturnValue($value) }}' {{ $isSelected($value) ? 'selected="selected"' : '' }} {{ $isDisabled($value) ? '"disabled"="disabled"' : '' }}>{{ $getDisplayValue($value) }}</option>
                @endforeach
        	@endempty
        </select>
    </span>
</p>