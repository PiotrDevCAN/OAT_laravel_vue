@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
		<div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">My Delegate Management</h3>
                
                <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                
                <x-delegate.record :record="$record"/>
                
			</div>
		</div>
	</div>
</div>

@endsection