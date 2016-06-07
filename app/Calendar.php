<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
  protected $fillable = [
    'empid','title', 'color', 'description', 'start_date'
  ];
  protected $table = "calendar";
}
