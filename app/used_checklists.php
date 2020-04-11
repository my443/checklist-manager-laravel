<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class used_checklists extends Model
{
        protected $fillable = [
        'id_master_lists', 'start_date', 'completed_date'
    ];

		// Connects the foreign key. (see Masterlist for recipricol.)
		public function masterlist() {
			$this->belongsTo('App\MasterList');
		}
}
