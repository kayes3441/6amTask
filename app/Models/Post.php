<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function frontUser(){
        return $this->belongsTo(FrontUser::class,'post_by');
    }
    public function comment(){
        return $this->hasMany(Comment::class,'post_id');
    }
}
