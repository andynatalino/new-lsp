<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    protected $table = 'galeris';
    protected $fillable = [
    	'photo',
    	'judul'
    ];

}
