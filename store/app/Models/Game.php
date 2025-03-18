<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
    protected $fillable = [
        'title',
        'genre',
        'publisher',
        'developer',
        'description',
        'cover_image',
        'banner_image',
        'is_for_kids',
        'age_rating',
    ];

    public function setPublisherAndDeveloper()
    {
        $this->publisher = Auth::user()->name;
        $this->developer = Auth::user()->name;
    }

    public function setAgeRating($isForKids, $ageRating)
    {
        if ($isForKids == 1) {
            $this->age_rating = 'everyone';
        } else {
            $this->age_rating = $ageRating;
        }
    }
}