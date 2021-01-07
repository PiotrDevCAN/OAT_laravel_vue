@extends('layout')

@section('content')

<x-competency.filters/>

@isset($records)
	<x-competency.table name="serviceLinesTable" :records="$records" />
@endisset

@endsection