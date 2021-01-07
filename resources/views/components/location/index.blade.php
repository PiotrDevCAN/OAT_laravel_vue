@extends('layout')

@section('content')

<x-location.filters/>

@isset($records)
	<x-location.table name="locationTable" :records="$records" />
@endisset

@endsection