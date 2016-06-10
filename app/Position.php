<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
      'departmentid', 'userlevel', 'name'
    ];
    protected $table = 'position';
}
