@extends('layouts.master')

@section('page')
Characters
@stop

@section('content')
	<div class="row">
		@foreach($characters as $character)
			<div class="col-md-6">
				<ul class="character-fields">
					<li>
						Name: {{ $character->full_name }}
					</li>
					<li>
						Sex: {{ $character->sex_name }}
					</li>
				</ul>
			</div>
		@endforeach
	</div>
@stop