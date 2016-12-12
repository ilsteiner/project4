{{ csrf_field() }}
{{-- First set of fields --}}
<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ ($errors->has('rel_1_character') ? ' has-error' : '' ) }}">
			<select required class="form-control input-lg" id="rel_1_character" name="rel_1_character">
				<option
					class="character-option"
					value=""
					disabled
					{{ (old('rel_1_character') ? "" : " selected") }}
				>
					Character 1
				</option>
			    @foreach($characters as $character)
			      <option 
			      	class="character-option" 
			      	value="{{$character->id}}"
			      	{{ (old('rel_1_character') == $character->id ? "selected" : "") }}
			      	{{ (isset($relationship) && $relationship->character ==  $character->id ? "selected" : "")}}
			      >
			      	{{$character->full_name}}
			      </option>
			    @endforeach
		    </select>
		    @if($errors->has('rel_1_character'))
				<span class="help-block">{{ $errors->first('rel_1_character') }}</span>
			@endif
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ ($errors->has('rel_1_name') ? ' has-error' : '' ) }}">
			<input 
				type="text" 
				id="rel_1_name" 
				name="rel_1_name" 
				placeholder="Friends With" 
				class="form-control input-lg" 
				required
				value="{{ old('rel_1_name', (isset($relationship) ? $relationship->name : "")) }}">
			@if($errors->has('rel_1_name'))
				<span class="help-block">{{ $errors->first('rel_1_name') }}</span>
			@endif
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ ($errors->has('rel_1_related_to') ? ' has-error' : '' ) }}">
			<select 
				required 
				id="rel_1_related_to" 
				name="rel_1_related_to" 
				class="form-control input-lg">

					<option
						class="character-option"
						value=""
						disabled
						{{ (old('rel_1_related_to') ? "" : " selected") }}
					>
						Character 2
					</option>
				    @foreach($characters as $character)
				      <option 
				      	class="character-option" 
				      	value="{{$character->id}}"
				      	{{ (old('rel_1_related_to') == $character->id ? "selected" : "") }}
				      	{{ (isset($relationship) && $relationship->is_related_to ==  $character->id ? "selected" : "")}}
				      >
				      	{{$character->full_name}}
				      </option>
				    @endforeach
		    </select>
		    @if($errors->has('rel_1_related_to'))
				<span class="help-block">{{ $errors->first('rel_1_related_to') }}</span>
			@endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group{{ ($errors->has('rel_1_description') ? ' has-error' : '' ) }}">
		<textarea id="rel_1_description" class="form-control" rows="2" placeholder="A longer description of the relationship using more words." name="rel_1_description">{{old('rel_1_description',(isset($relationship->description) ? $relationship->description : ""))}}</textarea>
		</div>
	</div>
</div>

{{-- Text representation of first fields --}}
<div class="row">
	<div class="col-md-4 rel-text character-text">
		{{ 
			(old('rel_1_character') ? 
				$characters->find(old('rel_1_character'))->full_name : 
				"Character 1")
		}}
	</div>
	<div class="col-md-4 rel-text rel-1-text">
		{{ 
			(old('rel_1_name') ? 
				old('rel_1_name') : 
				"is friends with")
		}}
	</div>
	<div class="col-md-4 rel-text related-to-text">
		{{ 
			(old('rel_1_related_to') ? 
				$characters->find(old('rel_1_related_to'))->full_name : 
				"Character 2")
		}}
	</div>
</div>

<hr>

{{-- Hide on edit because we don't handle editing bidirectionals --}}
@if(\Route::current()->getName() == 'relationships.create')
	{{-- Bidirectional switch --}}
	<div class="row">
		<div class="col-md-12 col-md-offset-4">
			<div class="form-group">
				<input
					class="form-control input-lg {{ (old('bidirectional') ? "show" : "")}}"
					type="checkbox"
					name="bidirectional"
					data-size="large"
					data-inverse="true"
					data-off-text="Unidirectional"
					data-on-text="Bidirectional"
					data-on-color="success"
					data-off-color="danger"
					data-label-width="auto"
					data-handle-width="auto"
				>
			</div>
		</div>
	</div>

	<div id="bidirectional">
		<hr>

		{{-- Second set of fields --}}
		<div class="row">
			<div class="col-md-4">
				<div class="form-group{{ ($errors->has('rel_2_character') ? ' has-error' : '' ) }}">
					<select
						disabled  
						id="rel_2_character" 
						name="rel_2_character" 
						class="form-control input-lg">
						<option
							class="character-option"
							value=""
							disabled
							{{ (old('rel_2_character') ? "" : " selected") }}
						>
							Character 2
						</option>
					    @foreach($characters as $character)
					      <option 
					      	class="character-option" 
					      	value="{{$character->id}}"
					      	{{ (old('rel_2_character') == $character->id ? "selected" : "") }}
					      >
					      	{{$character->full_name}}
					      </option>
					    @endforeach
				    </select>
				    @if($errors->has('rel_2_character'))
						<span class="help-block">{{ $errors->first('rel_2_character') }}</span>
					@endif
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group{{ ($errors->has('rel_2_name') ? ' has-error' : '' ) }}">
					<input 
						type="text" 
						id="rel_2_name" 
						name="rel_2_name" 
						placeholder="Friends With" 
						class="form-control input-lg" 
						value="{{ old('rel_2_name') }}">
					@if($errors->has('rel_2_name'))
						<span class="help-block">{{ $errors->first('rel_2_name') }}</span>
					@endif
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group{{ ($errors->has('rel_2_related_to') ? ' has-error' : '' ) }}">
					<select 
						disabled 
						id="rel_2_related_to" 
						name="rel_2_related_to" 
						class="form-control input-lg">

							<option
								class="character-option"
								value=""
								disabled
								{{ (old('rel_2_related_to') ? "selected" : "") }}
							>
								Character 1
							</option>
						    @foreach($characters as $character)
						      <option 
						      	class="character-option" 
						      	value="{{$character->id}}"
						      	{{ (old('rel_2_related_to') == $character->id ? "selected" : "") }}
						      >
						      	{{$character->full_name}}
						      </option>
						    @endforeach
				    </select>
				    <span class="related_to_char_1">Character 1</span>
				    @if($errors->has('rel_2_related_to'))
						<span class="help-block">{{ $errors->first('rel_2_related_to') }}</span>
					@endif
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group{{ ($errors->has('rel_2_description') ? ' has-error' : '' ) }}">
				<textarea id="rel_2_description" class="form-control" rows="2" placeholder="A longer description of the relationship using more words." name="rel_2_description">{{old('rel_2_description')}}</textarea>
				</div>
			</div>
		</div>

		{{-- Text representation of second fields --}}
		<div class="row">
			<div class="col-md-4 rel-text character-text">
				{{ 
					(old('rel_2_character') ? 
						$characters->find(old('rel_2_character'))->full_name : 
						"Character 1")
				}}
			</div>
			<div class="col-md-4 rel-text rel-2-text">
				{{ 
					(old('rel_2_name') ? 
						old('rel_2_name') : 
						"is friends with")
				}}
			</div>
			<div class="col-md-4 rel-text related-to-text">
				{{ 
					(old('rel_2_related_to') ? 
						$characters->find(old('rel_2_related_to'))->full_name : 
						"Character 2")
				}}
			</div>
		</div>
	</div>
@endif