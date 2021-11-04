<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts'; 
    public $primarykey = 'id'; 
    public $fillable=['email','naslovporuke','poruka'];
    public $timestamps = true; 
}
