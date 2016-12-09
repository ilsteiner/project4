@extends('layouts.master')

@section('page')
Characters
@stop

@section('content')
	<div class="row text-center counts">
		<div class="col-md-6">
			<div class="count-num">
				{{$characters}}
			</div>
			<div class="count-desc">
				Characters
			</div>
		</div>
		<div class="col-md-6">
			<div class="count-num">
				{{$relationships}}
			</div>
			<div class="count-desc">
				Relationships
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<button class="btn btn-success btn-lg btn-block rand-char">
				Random Character
			</button>
		</div>
	</div>
@stop