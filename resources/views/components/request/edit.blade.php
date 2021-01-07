@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
		<div class="ibm-card">
            <div class="ibm-card__content">
                <x-request.record :record="$record" />	            
			</div>
        </div>
	</div>
</div>

@endsection