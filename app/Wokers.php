<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Wokers extends Model
{
  public static $rules = array(
    'name' => 'required',
    'e_status' => 'required',
    'wage' => 'integer|min:0|max:10000'
  );
}
