<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\User;
use App\Models\Like;


class Reply extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Quection::class);
    }

    public function user()
    {
        return $this->belongsTO(User::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    protected $guarded = [];
}
