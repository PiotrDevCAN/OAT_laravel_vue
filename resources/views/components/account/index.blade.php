@extends('layout')

@section('content')

<x-account.filters/>

@isset($records)
	<x-account.table name="accountsTable" :records="$records" />
@endisset
    
@endsection