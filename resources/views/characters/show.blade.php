@extends('layouts.master')

@section('page')
{{ $character->full_name }}
@stop

@section('content')
{{-- If we just created a new character and are displaying it --}}
@if(isset($character_created))
<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-success" role="alert">
			Created {{ $character->full_name }}!
		</div>
	</div>
</div>
@endif
@if(isset($character_updating))

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
	<div class="col-xs-8 show-long-description">
		<div class="well well-lg">
			{{ $character->long_description }}
		</div>
	</div>

	@if($character->relationship_count > 0)
		<div class="col-xs-2 relationships-with-others show-relationships">
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

		<div class="col-xs-2 relationships-with-self show-relationships">
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
	@endif
</div>
@endif

<div class="row">
	<div class="col-md-4">
		<a href="/characters/edit/{{ $character->id }}">
			<button class="btn btn-info btn-block form-btn">
				<i class="fa fa-trash" aria-hidden="true"></i>
				Edit
			</button>
		</a>
	</div>
	<div class="col-md-4">
		<a href="/characters/delete/{{ $character->id }}">
			<button class="btn btn-danger btn-block form-btn">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				Delete
			</button>
		</a>
	</div>
</div>

@stop