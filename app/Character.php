<?php

namespace CharDB;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Cache;

class Character extends Model
{
	public function getFullNameAttribute(){
		$name = '';
		$name .= ($this->prefix == null ? '' : $this->prefix . ' ');
		$name .= ($this->first_name == null ? '' : $this->first_name . ' ');
		$name .= ($this->middle_name == null ? '' : $this->middle_name . ' ');
		$name .= ($this->last_name == null ? '' : $this->last_name . ' ');
		$name .= ($this->suffix == null ? '' : $this->suffix);

		return $name;
	}

	public function getSexIconAttribute(){
		return DB::table('sexes')->where('id', '=', $this->sex)->pluck('icon')[0];
	}

	public function getSexNameAttribute(){
		return ucfirst(DB::table('sexes')->where('id', '=', $this->sex)->pluck('sex')[0]);
	}

	public function getRelationshipCountAttribute(){
		$characters = Cache::get('characters', function () {
			return DB::table('relationships')->where('character', '=', $this->id)->orWhere('is_related_to', '=', $this->id)->get();
		});
		return $characters->count();
	}

	public function getRelationshipsAttribute(){
		return \CharDB\Relationship::where('character', $this->id)->get();	
	}

	public function getRelationshipsWithAttribute(){
		return \CharDB\Relationship::where('is_related_to', $this->id)->get();
	}
}
