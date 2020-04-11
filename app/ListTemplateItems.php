<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListTemplateItems extends Model
{
        protected $fillable = [
        'id_master_lists', 'item_short_desc', 'item_long_desc', 'order_num', 'active'
    ];
}
