@extends('layouts.master')

@section('page')
Create Relationship
@stop

@section('content')
<div class="row">
	<form action="/relationships/create" method="POST">
		{{ method_field('PUT') }}
		@include('relationships.form');

		<button class="btn btn-primary btn-block" type="submit">Create Relationship</button>
	</form>
</div>
@stop