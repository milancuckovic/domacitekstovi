<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $primarykey = 'id'; 
    public $fillable=['name','image'];
    public $timestamps = true; 

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
