<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'name', 'slug'
  ];

  protected $rules = [
    'slug' => 'sometimes|required|slug|unique:events',
  ];
}
