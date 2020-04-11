<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $table = "users";

    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'name', 'surname', 'email', 'role', 'address', 'telephone', 'active', 'password'
    ];

    protected $casts = [
         'address' => 'json',
     ];

    public function borrows()
    {
        return $this->hasMany('App\Borrow');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function hasRole($role)
    {
        return $this->role == $role ? True : False;
    }
    // TODO for fine
}
