<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
      'keyenc' , 'departmentname'
    ];
    protected $table = 'department';
}
