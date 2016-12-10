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

{{-- If we just edited this character are displaying it --}}
@if(isset($character_updated))
<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-success" role="alert">
			{{ $character->full_name }} has been updated!
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

@if($character->long_description != null || $character->relationship_count > 0)
<div class="row">
	@if($character->long_description != null)
		<div class="col-xs-8 show-long-description">
			<div class="well well-lg">
				{{ $character->long_description }}
			</div>
		</div>
	@endif

	@if($character->relationship_count > 0)
		<div class="col-xs-4 relationships-with-others show-relationships">
			<div class="relationship-section-title">
				{{ $character->first_name }} and others
			</div>

			<ul id='relationships'>
				@foreach($character->relationships as $relationship)
					<li class="relationship">
						@if(Auth::check())
							<a href="{{ route('relationships.edit', ['id' => $relationship->id]) }}">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a>
						@endif

						{{ $relationship->character_name . ' ' . $relationship->name }}
						
						<a href="{{ route('characters.show', ['id' => $relationship->is_related_to]) }}">
							{{ $relationship->related_to_name }}
						</a>

						{{-- Display an icon to view the description if there is one --}}
						@if($relationship->description != null)
							<span role="button" data-toggle="modal" data-target="#modal{{$relationship->id}}">
								<i
									data-toggle="tooltip"
									class="fa fa-align-left"
									data-placement="top"
									title="View full description"
									aria-hidden="true">		
								</i>
							</span>
						@endif
					</li>

					{{-- A modal to display the relationship description if there is one --}}
					@if($relationship->description != null)
						<div class="modal fade" role="dialog" id="modal{{$relationship->id}}">
							<div class="modal-dialog wide" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="modalHeader{{$relationship->id}}">{{$relationship->to_string}}</h4>
									</div>
									<div class="modal-body">
										<div class="well well-desc well-sm text-center">
											{{$relationship->to_string_desc}}
										</div>
										{{$relationship->description}}
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</ul>
		</div>

		<div class="col-xs-4 relationships-with-self show-relationships">
			<div class="relationship-section-title">
				Others and {{ $character->first_name }}
			</div>

			<ul id='relationships-with'>
				@foreach($character->relationships_with as $relationship)
					<li class="relationship">
						@if(Auth::check())
							<a href="{{ route('relationships.edit', ['id' => $relationship->id]) }}">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a>
						@endif
					
						<a href="{{ route('characters.show', ['id' => $relationship->character]) }}">
							{{ $relationship->character_name }}
						</a>

						{{ $relationship->name . ' ' . $relationship->related_to_name }}

						{{-- Display an icon to view the description if there is one --}}
						@if($relationship->description != null)
							<span role="button" data-toggle="modal" data-target="#modal{{$relationship->id}}">
								<i
									data-toggle="tooltip"
									class="fa fa-align-left"
									data-placement="top"
									title="View full description"
									aria-hidden="true">		
								</i>
							</span>
						@endif
					</li>

					{{-- A modal to display the relationship description if there is one --}}
					@if($relationship->description != null)
						<div class="modal fade" role="dialog" id="modal{{$relationship->id}}">
							<div class="modal-dialog wide" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="modalHeader{{$relationship->id}}">{{$relationship->to_string}}</h4>
									</div>
									<div class="modal-body">
										<div class="well well-desc well-sm text-center">
											{{$relationship->to_string_desc}}
										</div>
										{{$relationship->description}}
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</ul>
		</div>
	@endif
</div>
@endif

@if(Auth::check())
	<div class="row">
		<div class="col-md-5">
			<a href="/characters/edit/{{ $character->id }}">
				<button class="btn btn-info btn-block form-btn">
					<i class="fa fa-pencil" aria-hidden="true"></i>
					Edit
				</button>
			</a>
		</div>
		<div class="col-md-3">
			<a 
				href="/characters/delete/{{ $character->id }}"
				class="btn btn-danger btn-lg btn-block form-btn"
			>
				<i class="fa fa-trash" aria-hidden="true"></i>
				Delete
			</a>
		</div>
	</div>
@endif

@stop