@extends('layouts.master')

@section('page')
Edit Relationship
@stop

@section('content')
<div class="row">
	<form name="edit-relationship" action="/relationships/edit/{{$relationships[0]->id}}" method="POST">
		{{ method_field('PUT') }}
		@include('relationships.form');

		<button 
			id="rel-btn" 
			class="btn btn-primary btn-block" 
			type="submit">Save Relationship</button>
	</form>
</div>
@stop