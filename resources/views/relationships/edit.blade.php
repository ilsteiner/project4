@extends('layouts.master')

@section('page')
Edit Relationship
@stop

@section('content')
<div class="row">
	<form name="edit-relationship" action="/relationships/edit/{{$relationships[0]->id}}" method="POST">
		{{ method_field('PUT') }}
		@include('relationships.form');

		<div class="col-md-9">
			<button 
				id="rel-btn" 
				class="btn btn-primary btn-block" 
				type="submit">
				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				Save Relationship
			</button>
		</div>
		
		<div class="col-md-2">
			<button 
				id="rel-btn"
				class="btn btn-danger btn-block"
				type="button">
				<a class="white-link" href="/relationships/delete/{{$relationships[0]->id}}">
					<i class="fa fa-trash" aria-hidden="true"></i>
					Delete Relationship
				</a>
			</button>
		</div>
		
	</form>
</div>
@stop