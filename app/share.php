<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class share extends Model
{
    protected $table = 'shares';

    protected $fillable = [
        'user_id', 'folder_id'
    ];
}
