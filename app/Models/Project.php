<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id','title','description','notes','slug'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class,'members')->withTimestamps();
    }

}
