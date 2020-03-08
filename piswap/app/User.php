<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = "User";

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
