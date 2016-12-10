<?php

namespace CharDB;

use Illuminate\Database\Eloquent\Model;
use CharDB\Character;
use DB;

class Relationship extends Model
{
	public function getRelatedToNameAttribute(){
		$firstName = DB::table('characters')->where('id', '=', $this->is_related_to)->pluck('first_name')[0];
		$lastName = DB::table('characters')->where('id', '=', $this->is_related_to)->pluck('last_name')[0];
		$lastInit = substr($lastName, 0, 1) . ".";
		return $firstName . " " . $lastInit;
	}

	public function getCharacterNameAttribute(){
		$firstName = DB::table('characters')->where('id', '=', $this->character)->pluck('first_name')[0];
		$lastName = DB::table('characters')->where('id', '=', $this->character)->pluck('last_name')[0];
		$lastInit = substr($lastName, 0, 1) . ".";
		return $firstName . " " . $lastInit; 
	}

	public function getToStringAttribute(){
		$string = "Relationship between ";
		$string .= Character::find($this->character)->full_name;
		$string .= " and ";
		$string .= Character::find($this->is_related_to)->full_name;

		return $string;
	}

	public function getToStringDescAttribute(){
		$string = $this->character_name . " ";
		$string .= $this->name . " ";
		$string .= $this->related_to_name;

		return $string;
	}
}
