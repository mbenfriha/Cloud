<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class folder extends Model
{
    protected $table = 'folders';

    protected $fillable = [
        'user_id', 'limite', 'name', 'path'
    ];
}
