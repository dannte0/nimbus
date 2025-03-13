<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
   protected $fillable = [
    'title',
    'description',
    'cover_image',
    'banner_image',
    'release_date'
   ];
}
