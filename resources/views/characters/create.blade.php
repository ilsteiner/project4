@extends('layouts.master')

@section('page')
Create Character
@stop

@section('content')
<div class="row">
	<form action="/characters/create" method="POST">
		{{ method_field('PUT') }}
		@include('characters.form');

		<button class="btn btn-primary btn-block" type="submit">Create Character</button>
	</form>
</div>
@stop