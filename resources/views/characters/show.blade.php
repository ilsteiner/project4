@extends('layouts.master')

@section('page')
{{ $character->full_name }}
@stop

@section('head')

@stop

@section('content')
<div class="row">
	<div class="col-xs-1 show-name">
		{{-- Displays icon based on sex of character, looking up unicode for font-awesome --}}
		<span class="fa" aria-hidden="true">{{ '&#x' . $character->sex_icon . ';'}}</span>
	</div>
	<div class="col-xs-11 show-name">
		@if($character->prefix != null)
			<span class="show-anyfix">
				{{ $character->prefix }}
			</span>
		@endif

		{{ $character->first_name 
			. ' '
			. ($character->middle_name != null 
				? ($character->middle_name . ' ') 
				: '')
			. $character->last_name }}

		@if($character->suffix != null)
			<span class="show-anyfix">
				{{ $character->suffix }}
			</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-xs-12 show-short-description">
		{{ $character->short_description }}
	</div>
</div>

@if($character->long_description != null)
<div class="row">
	<div class="col-xs-12 show-long-description">
		<div class="well well-lg">
			{{ $character->long_description }}
		</div>
	</div>
</div>
@endif

@stop