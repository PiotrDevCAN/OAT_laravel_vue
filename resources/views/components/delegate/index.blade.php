@extends('layout')

@section('content')

<x-delegate.filters/>

@isset($records)
	<x-delegate.table name="delegateTable" :records="$records" />
@endisset

@endsection