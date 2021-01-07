@isset($record->reference)
	{{ link_to_route('api.request.approve', 'Approve Request', ['overtimeRequest' => $record->reference, 'lvl' => '1', 'status' => 'Approved', 'via' => 'online'], ['class' => 'ibm-bold ibm-inlinelink ibm-confirm-link ibm-textcolor-green-50', 'style' => 'color:#5aa700;']) }}
@endisset