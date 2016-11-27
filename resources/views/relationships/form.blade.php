{{ csrf_field() }}
{{-- First set of fields --}}
<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ ($errors->has('rel_1_character') ? ' has-error' : '' ) }}">
			{{-- <label class="required" for="character">Character</label> --}}
			<select required class="form-control input-lg" id="rel_1_character" name="rel_1_character" class="form-control input-lg">
				<option
					class="character-option"
					value=""
					disabled
					selected
				>
					Character 1
				</option>
			    @foreach($characters as $character)
			      <option 
			      	class="character-option" 
			      	value="{{$character->id}}"
			      	{{-- {{ (isset($character->sex) 
			      			? ($character->sex == $sex->id ? "selected" : "") 
			      			: "") }} --}}
			      >
			      	{{$character->full_name}}
			      </option>
			    @endforeach
		    </select>
		    {{-- @if($errors->has('sex'))
				<span class="help-block">{{ $errors->first('sex') }}</span>
			@endif --}}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ ($errors->has('rel_1_name') ? ' has-error' : '' ) }}">
			{{-- <label for="name">Relationship Name</label> --}}
			<input 
				type="text" 
				id="rel_1_name" 
				name="rel_1_name" 
				placeholder="Friends With" 
				class="form-control input-lg" 
				required
				value="{{ (isset($relationship[0]->name) ? $relationship[0]->name : "" )}}">
			{{-- @if($errors->has('relationship[0]'))
				<span class="help-block">{{ $errors->first('relationship[0]') }}</span>
			@endif --}}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ ($errors->has('rel_1_related_to') ? ' has-error' : '' ) }}">
			{{-- <label class="required" for="character">Character</label> --}}
			<select 
				required class="form-control input-lg" 
				id="rel_1_related_to" 
				name="rel_1_related_to" 
				class="form-control input-lg">

					<option
						class="character-option"
						value=""
						disabled
						selected
					>
						Character 2
					</option>
				    @foreach($characters as $character)
				      <option 
				      	class="character-option" 
				      	value="{{$character->id}}"
				      	{{-- {{ (isset($character->sex) 
				      			? ($character->sex == $sex->id ? "selected" : "") 
				      			: "") }} --}}
				      >
				      	{{$character->full_name}}
				      </option>
				    @endforeach
		    </select>
		    {{-- @if($errors->has('sex'))
				<span class="help-block">{{ $errors->first('sex') }}</span>
			@endif --}}
		</div>
	</div>
</div>

{{-- Text representation of first fields --}}
<div class="row">
	<div class="col-md-4 rel-text character-text">
		Character 1
	</div>
	<div class="col-md-4 rel-text rel-1-text">
		is friends with
	</div>
	<div class="col-md-4 rel-text related-to-text">
		Character 2
	</div>
</div>

<hr>

{{-- Bidirectional switch --}}
<div class="row">
	<div class="col-md-12 col-md-offset-4">
		<div class="form-group">
			<input
				class="form-control input-lg"
				type="checkbox"
				name="bidirectional"
				data-size="large"
				data-inverse="true"
				data-off-text="Unidirectional"
				data-on-text="Bidirectional"
				data-on-color="success"
				data-off-color="danger"
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
				{{-- <label class="required" for="character">Character</label> --}}
				<select 
					required 
					disabled 
					class="form-control input-lg" 
					id="rel_2_character" 
					name="rel_2_character" 
					class="form-control input-lg">
					<option
						class="character-option"
						value=""
						disabled
						selected
					>
						Character 2
					</option>
				    @foreach($characters as $character)
				      <option 
				      	class="character-option" 
				      	value="{{$character->id}}"
				      	{{-- {{ (isset($character->sex) 
				      			? ($character->sex == $sex->id ? "selected" : "") 
				      			: "") }} --}}
				      >
				      	{{$character->full_name}}
				      </option>
				    @endforeach
			    </select>
			    {{-- @if($errors->has('sex'))
					<span class="help-block">{{ $errors->first('sex') }}</span>
				@endif --}}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ ($errors->has('rel_2_name') ? ' has-error' : '' ) }}">
				{{-- <label for="name">Relationship Name</label> --}}
				<input 
					type="text" 
					id="rel_2_name" 
					name="rel_2_name" 
					placeholder="Friends With" 
					class="form-control input-lg" 
					required
					value="{{ (isset($relationship[0]->name) ? $relationship[0]->name : "" )}}">
				{{-- @if($errors->has('relationship[0]'))
					<span class="help-block">{{ $errors->first('relationship[0]') }}</span>
				@endif --}}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ ($errors->has('rel_2_related_to') ? ' has-error' : '' ) }}">
				{{-- <label class="required" for="character">Character</label> --}}
				<select 
					required class="form-control input-lg" 
					disabled 
					id="rel_2_related_to" 
					name="rel_2_related_to" 
					class="form-control input-lg">

						<option
							class="character-option"
							value=""
							disabled
							selected
						>
							Character 1
						</option>
					    @foreach($characters as $character)
					      <option 
					      	class="character-option" 
					      	value="{{$character->id}}"
					      	{{-- {{ (isset($character->sex) 
					      			? ($character->sex == $sex->id ? "selected" : "") 
					      			: "") }} --}}
					      >
					      	{{$character->full_name}}
					      </option>
					    @endforeach
			    </select>
			    <span class="related_to_char_1">Character 1</span>
			    {{-- @if($errors->has('sex'))
					<span class="help-block">{{ $errors->first('sex') }}</span>
				@endif --}}
			</div>
		</div>
	</div>

	{{-- Text representation of second fields --}}
	<div class="row">
		<div class="col-md-4 rel-text related-to-text">
			Character 2
		</div>
		<div class="col-md-4 rel-text rel-2-text">
			is friends with
		</div>
		<div class="col-md-4 rel-text character-text">
			Character 1
		</div>
	</div>
</div>