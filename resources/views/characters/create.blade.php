@extends('layouts.master')

@section('page')
Create Character
@stop

@section('content')
<div class="row">
	<form action="/characters/create" method="POST">
		{{ csrf_field() }}
		<fieldset>
			<legend>Character Name</legend>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group{{ ($errors->has('prefix') ? ' has-error' : '' ) }}">
						<label for="prefix">Prefix</label>
						<input type="text" id="prefix" name="prefix" placeholder="Mr." class="form-control">
						@if($errors->has('prefix'))
							<span class="help-block">{{ $errors->first('prefix') }}</span>
						@endif
					</div>
				</div>

				<div class="col-md-5">
					<div class="form-group{{ ($errors->has('first_name') ? ' has-error' : '' ) }}"">
						<label class="required" for="first_name">First Name</label>
						<input required type="text" id="first_name" name="first_name" placeholder="Arthur" class="form-control">
						@if($errors->has('first_name'))
							<span class="help-block">{{ $errors->first('first_name') }}</span>
						@endif
					</div>
				</div>

				<div class="col-md-5">
					<div class="form-group{{ ($errors->has('middle_name') ? ' has-error' : '' ) }}"">
						<label for="middle_name">Middle Name</label>
						<input type="text" id="middle_name" name="middle_name" placeholder="Philip" class="form-control">
						@if($errors->has('middle_name'))
							<span class="help-block">{{ $errors->first('first_name') }}</span>
						@endif
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10">
					<div class="form-group{{ ($errors->has('last_name') ? ' has-error' : '' ) }}"">
						<label class="required" for="last_name">Last Name</label>
						<input required type="text" id="last_name" name="last_name" placeholder="Dent" class="form-control">
						@if($errors->has('last_name'))
							<span class="help-block">{{ $errors->first('last_name') }}</span>
						@endif
					</div>
				</div>

				<div class="col-md-2">
					<div class="form-group{{ ($errors->has('suffix') ? ' has-error' : '' ) }}"">
						<label for="suffix">Suffix</label>
						<input type="text" id="suffix" name="suffix" placeholder="I" class="form-control">
						@if($errors->has('suffix'))
							<span class="help-block">{{ $errors->first('suffix') }}</span>
						@endif
					</div>
				</div>
			</div>
		</fieldset>

		<fieldset>
			<legend>Character Description</legend>

			<div class="col-md-10">
				<div class="form-group{{ ($errors->has('short_description') ? ' has-error' : '' ) }}">
					<label class="required" for="short_description">Short Description</label>
					<input required type="text" id="short_description" name="short_description" placeholder="About thirty years old, tall, dark-haired and never quite at ease with himself. " class="form-control">
					@if($errors->has('short_description'))
						<span class="help-block">{{ $errors->first('short_description') }}</span>
					@endif
				</div>
			</div>

			<div class="col-md-2">
				<div class="form-group{{ ($errors->has('sex') ? ' has-error' : '' ) }}">
					<label class="required" for="sex">Sex</label>
					<select required class="form-control" id="sex" name="sex" class="form-control">
					    @foreach($sexes as $sex)
					      <option class="sex-option" value="{{$sex->id}}">{{$sex->sex}}</option>
					    @endforeach
				    </select>
				    @if($errors->has('sex'))
						<span class="help-block">{{ $errors->first('sex') }}</span>
					@endif
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group{{ ($errors->has('long_description') ? ' has-error' : '' ) }}">
					<label for="long_description">Full Description</label>
					<textarea id="long_description" name="long_description" 
					placeholder="Arthur Dent is about thirty years old, tall, dark-haired and never quite at ease with himself. Since he moved to London he made him nervous and irritable. The thing that he worried about, which worries him most is the fact, that people often used to ask him, why he always looks that worried."
					class="form-control"></textarea>
					@if($errors->has('long_description'))
						<span class="help-block">{{ $errors->first('long_description') }}</span>
					@endif
				</div>
			</div>
		</fieldset>

		<button class="btn btn-primary btn-block" type="submit">Create Character</button>
	</form>
</div>
@stop