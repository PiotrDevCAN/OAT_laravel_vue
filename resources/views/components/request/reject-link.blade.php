@isset($record->reference)
	{{ link_to_route('api.request.reject', 'Reject Request', ['overtimeRequest' => $record->reference, 'lvl' => '1', 'status' => 'Approved', 'via' => 'online'], ['class' => 'ibm-bold ibm-inlinelink ibm-reset-link ibm-textcolor-red-50', 'style' => 'color:#ff5050;']) }}
@endisset