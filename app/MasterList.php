<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterList extends Model
{
        protected $fillable = [
        'listname', 'active', 'description'
    ];
    
    // Connects the foreign key. (see used_checklists for recipricol.)
    // https://laravel-recipes.com/trying-to-get-property-of-non-object-laravel/
    public function used_checklists() {
		return $this->hasMany('\App\used_checklists');
	}
}
