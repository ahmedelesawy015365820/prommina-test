<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name','status'];

    public function status()
    {
        return $this->status? 'Active' : "Inactive";
    }

    public function scopeStatus($q)
    {
        return $q->whereStatus(1);
    }

    //******************
    // start relation
    //******************

    public function firstMedia()
    {
        return $this->morphOne(Media::class,'mediable');
    }

    public function media()
    {
        return $this->morphMany(Media::class,'mediable');
    }

    //******************
    // end relation
    //******************
}
