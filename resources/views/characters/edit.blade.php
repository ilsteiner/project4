@extends('layouts.master')

@section('page')
Edit {{ $character->full_name }}
@stop

@section('content')
<div class="row">
	<form action="/characters/edit/{{ $character->id }}" method="POST">
		{{ method_field('PUT') }}
		@include('characters.form');

		<button class="btn btn-primary btn-block" type="submit">Save Character</button>
	</form>
</div>
@stop