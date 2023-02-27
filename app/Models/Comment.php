<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function commentBy(){
        return $this->belongsTo(FrontUser::class,'comment_by');
    }
}
