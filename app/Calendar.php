<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
  protected $fillable = [
    'title', 'color', 'start_date'
  ];
  protected $table = "calendar";
}
