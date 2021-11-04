<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $primarykey = 'id'; 
    public $fillable=['name','text'];
    public $timestamps = true; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }
}
