<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $table = "users";
    public $timestamps = false;

    protected $fillable = [
        'name', 'surname', 'email', 'role', 'adress', 'telephone', 'active', 'password'
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

    // TODO for fine
}
