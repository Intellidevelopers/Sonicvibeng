<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function replies()
    {
        return $this->hasMany(ReplyComment::class);
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    use HasFactory;
}