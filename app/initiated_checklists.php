<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class initiated_checklists extends Model
{
        protected $fillable = [
        'id_master_lists', 'id_list_templates', 'id_used_checklist', 'complete'
    ];
}
