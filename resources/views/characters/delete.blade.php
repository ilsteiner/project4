@extends('layouts.master')

@section('page')
Deleting {{ $character->full_name }}
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1>You are about to delete {{ $character->full_name }}! Their ID is {{ $character->id }}.</h1>
				<h2>Are you sure you want to do this?</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<form action="/characters/{{ $character->id }}" method="POST">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<input type="text" name="id" hidden readonly value="{{ $character->id }}"/>
				<button type="submit" class="btn-danger btn btn-lg btn-block">
					<i class="fa fa-trash" aria-hidden="true"></i>
					Yes! Get rid of them!
				</button>
			</form>
		</div>
		<div class="col-md-6">
			<a href="/characters/show/{{ $character->id }}">
				<button type="button" class="btn-info btn btn-lg btn-block">
					<i class="fa fa-undo" aria-hidden="true"></i>
					No! I didn't mean to do that!
				</button>
			</a>
		</div>
	</div>
@stop