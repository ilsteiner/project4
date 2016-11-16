@extends('layouts.master')

@section('page')
{{ $character->full_name }}
@stop

@section('content')
{{-- If we just created a new character and are displaying it --}}
@if($character_created)
<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-success" role="alert">
			Created {{ $character->full_name }}!
		</div>
	</div>
</div>
@endif

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

@if($character->relationship_count > 0)
	<div class="row">
		<div class="col-xs-6 relationships-with-others">
			<div class="relationship-section-title">
				{{ $character->first_name }} and others
			</div>

			<ul id='relationships'>
				@foreach($character->relationships as $relationship)
					<li class="relationship">
						{{ $character->first_name . ' ' . $relationship->name }}
						
						<a href="{{ route('characters.show', ['id' => $relationship->is_related_to]) }}">
							{{ $relationship->related_to_name }}
						</a>
					</li>
				@endforeach
			</ul>
		</div>

		<div class="col-xs-6 relationships-with-self">
			<div class="relationship-section-title">
				Others and {{ $character->first_name }}
			</div>

			<ul id='relationships-with'>
				@foreach($character->relationships_with as $relationship)
					<li class="relationship">
						<a href="{{ route('characters.show', ['id' => $relationship->character]) }}">
							{{ $relationship->character_name }}
						</a>

						{{ $relationship->name . ' ' . $character->first_name }}

						@if($relationship->description != null)
							<a href="{{ route('relationships.show', ['id' => $relationship->id]) }}"
							   title="Read more">
									<i class="fa fa-2x fa-info-circle" aria-hidden="true"></i>
							</a>
						@endif
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif

@stop