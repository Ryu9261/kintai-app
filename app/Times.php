<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    protected $dates = [
        'date',
        's_time',
        'e_time',
    ];

    public static $rules = array(
        'date' => 'required',
        's_time' => 'required',
        's_time' => 'required',
        'time' => 'integer|min:0|max:24'
      );
}
