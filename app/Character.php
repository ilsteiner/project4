<?php

namespace CharDB;

use Illuminate\Database\Eloquent\Model;

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
}
