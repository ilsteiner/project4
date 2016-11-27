{{ csrf_field() }}
<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ ($errors->has('rel_1_character') ? ' has-error' : '' ) }}">
			{{-- <label class="required" for="character">Character</label> --}}
			<select required class="form-control" id="character" name="character" class="form-control">
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
				id="name" 
				name="name" 
				placeholder="Friends With" 
				class="form-control" 
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
			<select required class="form-control" id="character" name="character" class="form-control">
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

<div class="row">
	<div class="col-md-12">
		<input type="checkbox" name="test">
	</div>
</div>