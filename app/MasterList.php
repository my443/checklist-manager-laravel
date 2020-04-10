<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterList extends Model
{
        protected $fillable = [
        'listname', 'active', 'description'
    ];
}
