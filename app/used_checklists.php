<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class used_checklists extends Model
{
        protected $fillable = [
        'id_master_lists', 'start_date', 'completed_date'
    ];

		// Connects the foreign key. (see Masterlist for recipricol.)
		// https://laravel-recipes.com/trying-to-get-property-of-non-object-laravel/
		public function masterlist() {
			return $this->belongsTo('App\MasterList', 'id_masterlists');
		}
}
