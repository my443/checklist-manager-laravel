<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterList extends Model
{
        protected $fillable = [
        'listname', 'active', 'description'
    ];
    
    // Connects the foreign key. (see used_checklists for recipricol.)
    public function used_checklists() {
		$this->hasMany('\App\used_checklists');
	}
}
