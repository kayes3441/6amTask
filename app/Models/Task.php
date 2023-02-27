<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\user;
class Task extends Model
{
    use HasFactory;
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'assign_to');
    }
}
