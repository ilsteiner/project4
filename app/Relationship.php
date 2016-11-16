<?php

namespace CharDB;

use Illuminate\Database\Eloquent\Model;
use DB;

class Relationship extends Model
{
	public function getRelatedToNameAttribute(){
		return DB::table('characters')->where('id', '=', $this->is_related_to)->pluck('first_name')[0];
	}

	public function getCharacterNameAttribute(){
		return DB::table('characters')->where('id', '=', $this->character)->pluck('first_name')[0];
	}
}
