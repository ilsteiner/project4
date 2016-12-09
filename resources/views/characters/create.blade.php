@extends('layouts.master')

@section('page')
Create Character
@stop

@section('content')
<div class="row">
	<form action="/characters/create" method="POST">
		{{ method_field('PUT') }}
		@include('characters.form');

		<button class="btn btn-primary btn-block" type="submit">
			<i class="fa fa-floppy-o" aria-hidden="true"></i>
			Create Character
		</button>
	</form>
</div>
@stop