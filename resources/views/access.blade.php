@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
        <div class="ibm-card">
            <div class="ibm-card__content">
	        	<h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">My Access</h3>
	        	<p>Name : {{ $user->cn[0] }}</p>
	        	<p>Userid : {{ $user->mail[0] }}</p>
	        	<p>CNUM : {{ $user->uid[0] }}</p>
	        	<p>Has access to these OAT Bluegroups : 'OAT_User', 'OAT_Admin'</p>
	        </div>
        </div>
	</div>
</div>

@endsection