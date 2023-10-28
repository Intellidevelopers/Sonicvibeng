<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    use HasFactory;
}