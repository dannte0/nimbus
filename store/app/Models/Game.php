<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
    protected $fillable = [
        'title',
        'description',
        'genre',
        'developer',
        'publisher',
        'cover_image',
        'user_id',
        'banner_image',
        'is_for_kids',
        'age_rating',
    ];

    public function setIsForKids($isforkids) {
        $this->is_for_kids = $isforkids ? 1 : 0;
    }
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
    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}