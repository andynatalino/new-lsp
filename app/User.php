<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'number', 'username', 'name', 'email', 'password', 'gender', 'place', 'date', 'religion', 'citizenship', 'address', 'telp', 'instansi',
 ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
       if($this->role == 2) return true;
       return false;
   }

   public function isOp(){
    if($this->role == 3) return true;
    return false;
}
}
