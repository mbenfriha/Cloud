<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upload extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'uploads';

    protected $fillable = [
        'user_id', 'name', 'type', 'size', 'path'
    ];


    public static function octetToMo($getSize)
    {
        return round(($getSize / pow(2, 20)), 1);
    }
}
