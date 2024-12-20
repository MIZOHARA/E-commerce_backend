<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'description',
      'image',
      'description',
      'slug',
      'comments',
      'tags',
      'content',
      'study_time',
      'author',
    ];
}
