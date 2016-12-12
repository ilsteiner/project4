@extends('layouts.master')

@section('page')
Deleting {{ $relationship->to_string }}
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1>You are about to delete a {{ $relationship->to_string }}! The ID is {{ $relationship->id }}.</h1>
				<h2>Are you sure you want to do this?</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<form action="/relationships/{{ $relationship->id }}" method="POST">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<input type="text" name="id" hidden readonly value="{{ $relationship->id }}"/>
				<button type="submit" class="btn-danger btn btn-lg btn-block">
					<i class="fa fa-trash" aria-hidden="true"></i>
					Yes! Destroy their connection!
				</button>
			</form>
		</div>
		<div class="col-md-6">
			<a class="btn-info btn btn-lg btn-block" href="/relationships/show/{{ $relationship->id }}">
				<i class="fa fa-undo" aria-hidden="true"></i>
				No! I didn't mean to do that!
			</a>
		</div>
	</div>
@stop