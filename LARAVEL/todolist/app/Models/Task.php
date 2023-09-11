<?php

namespace App\Models;
use illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'description',
        'do_date',
        'fkUser_id'
    ];
}

?>