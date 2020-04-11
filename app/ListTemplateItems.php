<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListTemplateItems extends Model
{
        protected $fillable = [
        'id_masterlists', 'ItemShortDesc', 'ItemLongDesc', 'OrderNum', 'Active'
    ];
}
