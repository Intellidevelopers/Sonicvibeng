<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function viewers()
    {
        return $this->hasMany(PostView::class);
    }
    use HasFactory;
}