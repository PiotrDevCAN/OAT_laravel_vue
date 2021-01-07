@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
        <div class="ibm-card">
            <div class="ibm-card__content">
	        	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">My Delegates list</h3>
	        	<p>List of delegates designated for: {{ $user->cn[0] }} ({{ $user->mail[0] }})</p>
	        </div>
        </div>
	</div>
</div>

@isset($records)
	<x-delegate.table name="myDelegatesTable" :records="$records" />
@endisset

@endsection