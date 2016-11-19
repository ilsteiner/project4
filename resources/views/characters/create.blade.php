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
	</form>

	<form action="/relationships/create" method="POST">
		{{ csrf_field() }}
		<fieldset>
			<legend>Relationships <button type="button" class="btn btn-sm btn-primary" id="btnAdd">Add</button></legend>
				<div id="relationship1" class="clonedInput">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group" {{ ($errors->has('rel_name') ? ' has-error' : '' ) }}>
								<label 
									for="rel_name_1" 
									id="rel_name_lbl_1" 
									class="rel_name_lbl">
									Relationship Name
								</label>
								<input 
									type="text" 
									name="rel_name_1" 
									id="rel_name_1"
									placeholder="is friends with" 
									class="form-control rel_name"
								>
								@if($errors->has('rel_name_1'))
									<span class="help-block">{{ $errors->first('rel_name') }}</span>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" {{ ($errors->has('rel_is_related_to') ? ' has-error' : '' ) }}>
								<label 
									for="rel_is_related_to_1" 
									id="rel_is_related_to_lbl_1" 
									class="rel_is_related_to_lbl">
									Is Related To
								</label>
								<select  
									class="form-control" 
									id="rel_is_related_to_1" 
									name="rel_is_related_to_1" 
									class="form-control rel_is_related_to"
								>
									<option class="character_related" value="" disabled selected>Ford Prefect</option>
								    @foreach($characters as $character)
								      <option class="character_related" value="{{$character->id}}">{{$character->full_name}}</option>
								    @endforeach
							    </select>
								@if($errors->has('rel_is_related_to_1'))
									<span class="help-block">{{ $errors->first('rel_name') }}</span>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group{{ ($errors->has('rel_description') ? ' has-error' : '' ) }}">
								<label 
									for="rel_description_1" 
									id="rel_description_lbl_1" 
									class="rel_description_lbl">
									Relationship Description
								</label>
								<textarea 
									id="rel_description_1" 
									name="rel_description_1" 
									placeholder="When Arthur and Ford met, Ford was posing as an out-of-work actor. He only revealed he was from a small planet somewhere in the vicinity of Betelgeuse, and not from Guildford after all, as he had usually claimed, to Arthur just before the Vogons arrived to destroy Earth."
									class="form-control rel_description">
								</textarea>
								@if($errors->has('long_description'))
									<span class="help-block">{{ $errors->first('rel_description_1') }}</span>
								@endif
							</div>
						</div>
					</div>
				</div>
		</fieldset>
	</form>
	<button class="btn btn-primary btn-block" onclick="createCharacter()">Create Character</button>
</div>
@stop