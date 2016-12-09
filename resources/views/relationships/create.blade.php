@extends('layouts.master')

@section('page')
Create Relationship
@stop

@section('content')
<div class="row">
	<form name="create-relationship" action="/relationships/create" method="POST">
		{{ method_field('PUT') }}
		@include('relationships.form');

		<button 
			id="rel-btn" 
			class="btn btn-primary btn-block" 
			type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Create Relationship
		</button>
	</form>
</div>
@stop